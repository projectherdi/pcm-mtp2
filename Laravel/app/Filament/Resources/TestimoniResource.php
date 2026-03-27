<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimoniResource\Pages;
use App\Models\Testimoni;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TestimoniResource extends Resource
{
    protected static ?string $model = Testimoni::class;

    // Ikon navigasi diubah menjadi grup user yang lebih relevan
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    
    // Label pada Sidebar Admin
    protected static ?string $navigationLabel = 'Testimoni Tokoh';
    protected static ?string $slug = 'tokoh-muhammadiyah';

    // Judul halaman (Plural & Singular)
    protected static ?string $breadcrumb = 'Testimoni Tokoh';
    protected static ?string $pluralModelLabel = 'Testimoni Tokoh';
    protected static ?string $modelLabel = 'Testimoni Tokoh';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Profil Tokoh')
                ->description('Masukkan identitas dan foto tokoh Muhammadiyah.')
                ->schema([
                    Forms\Components\FileUpload::make('avatar')
                        ->label('Foto Tokoh')
                        ->image()
                        ->avatar() // Pengganti circleAppearance() di Filament v3
                        ->directory('tokoh-muhammadiyah')
                        ->imageEditor() 
                        ->columnSpanFull(),
                    
                    Forms\Components\Grid::make(2)->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('Nama Lengkap Tokoh')
                            ->placeholder('Contoh: Dr. H. Haedar Nashir, M.Si.')
                            ->required()
                            ->maxLength(255),
                        
                        Forms\Components\TextInput::make('position')
                            ->label('Jabatan / Instansi')
                            ->placeholder('Contoh: Ketua Umum PP Muhammadiyah')
                            ->required(),
                    ]),
                ]),

            Forms\Components\Section::make('Pesan & Amanat')
                ->description('Kata-kata hikmah atau pesan dari tokoh tersebut.')
                ->schema([
                    Forms\Components\Select::make('rating')
                        ->label('Prioritas / Rating')
                        ->options([
                            5 => 'Sangat Penting (5 Bintang)',
                            4 => 'Penting (4 Bintang)',
                            3 => 'Normal (3 Bintang)',
                        ])
                        ->default(5)
                        ->required(),

                    Forms\Components\Textarea::make('content')
                        ->label('Isi Pesan / Kutipan')
                        ->placeholder('Tuliskan kutipan atau amanat tokoh di sini...')
                        ->rows(5)
                        ->required()
                        ->columnSpanFull(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('avatar')
                    ->label('Foto')
                    ->circular(),
                
                Tables\Columns\TextColumn::make('name')
                    ->label('Nama Tokoh')
                    ->searchable()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('position')
                    ->label('Jabatan')
                    ->badge()
                    ->color('success'),

                Tables\Columns\TextColumn::make('rating')
                    ->label('Rating')
                    ->alignCenter()
                    ->formatStateUsing(fn ($state): string => str_repeat('⭐', (int)$state)),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Input')
                    ->dateTime('d M Y')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([])
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTestimonis::route('/'),
            'create' => Pages\CreateTestimoni::route('/create'),
            'edit' => Pages\EditTestimoni::route('/{record}/edit'),
        ];
    }
}