<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\DateTimePicker;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Support\Facades\Auth;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;
    protected static ?int $navigationSort = 1;
    //protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationIcon = 'heroicon-o-document-duplicate';
    protected static ?string $navigationGroup = 'Manajemen Konten';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Konten Artikel')
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul Artikel')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true)
                            ->afterStateUpdated(function (string $operation, $state, Forms\Set $set) {
                                // Otomatis mengisi hidden field 'slug' saat judul diketik
                                if ($operation === 'create') {
                                    $set('slug', Str::slug($state));
                                }
                            }),

                        // MENGUBAH TextInput MENJADI Hidden
                        Hidden::make('slug')
                            ->required()
                            ->unique(Post::class, 'slug', ignoreRecord: true),

                        Select::make('category_id')
                            ->label('Kategori')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->createOptionForm([
                                TextInput::make('name')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn ($state, $set) => $set('slug', Str::slug($state))),
                                
                                // Gunakan Hidden juga di modal tambah kategori agar konsisten
                                Hidden::make('slug')
                                    ->required()
                                    ->unique('categories', 'slug'),
                            ]),

                        FileUpload::make('image')
                            ->label('Gambar Utama')
                            ->image()
                            ->directory('berita')
                            ->columnSpanFull(),

                        RichEditor::make('content')
                            ->label('Isi Berita')
                            ->required()
                            ->columnSpanFull(),

                        Select::make('status')
                            ->options([
                                'draft' => 'Draft',
                                'published' => 'Published',
                            ])
                            ->default('draft')
                            ->required()
                            ->native(false),

                        DateTimePicker::make('published_at')
                            ->label('Published at')
                            ->required()
                            ->native(false)
                            ->displayFormat('d/m/Y H:i:s')
                            ->placeholder('Pilih tanggal dan waktu')
                            ->suffixAction(
                                Forms\Components\Actions\Action::make('setToday')
                                    ->icon('heroicon-m-clock')
                                    ->tooltip('Set ke Waktu Sekarang')
                                    ->color('info')
                                    ->action(fn ($set) => $set('published_at', now()->format('Y-m-d H:i:s')))
                            )
                            ->prefixAction(
                                Forms\Components\Actions\Action::make('clear')
                                    ->icon('heroicon-m-x-mark')
                                    ->tooltip('Hapus Tanggal')
                                    ->color('danger')
                                    ->action(fn ($set) => $set('published_at', null))
                            )
                            ->closeOnDateSelection()
                            ->nullable(),

                        Hidden::make('user_id')
                            ->default(fn () => Auth::id()), 
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Foto')
                    ->circular(),

                TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->limit(50),

                TextColumn::make('category.name')
                    ->label('Kategori')
                    ->sortable(),

                TextColumn::make('user.name')
                    ->label('Penulis'),

                TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'draft' => 'warning',
                        'published' => 'success',
                        default => 'gray',
                    }),
                
                TextColumn::make('published_at')
                    ->label('Jadwal Terbit')
                    ->dateTime('d/m/Y H:i')
                    ->sortable()
                    ->color(fn ($state) => $state > now() ? 'info' : 'gray')
                    ->description(fn ($state) => $state > now() ? 'Menunggu jadwal...' : ''),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'draft' => 'Draft',
                        'published' => 'Published',
                    ]),

                SelectFilter::make('category')
                    ->label('Kategori')
                    ->relationship('category', 'name'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}