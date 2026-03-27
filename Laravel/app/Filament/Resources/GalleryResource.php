<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GalleryResource\Pages;
use App\Models\Gallery;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;

class GalleryResource extends Resource
{
    protected static ?string $model = Gallery::class;

    protected static ?string $navigationIcon = 'heroicon-o-camera';
    
    protected static ?string $navigationGroup = 'Konten Visual';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Dokumentasi')
                    ->description('Lengkapi detail untuk album foto ini.')
                    ->schema([
                        TextInput::make('title')
                            ->label('Judul Album/Kegiatan')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Milad Muhammadiyah 2026'),

                        Select::make('category')
                            ->label('Kategori')
                            ->options([
                                'persyarikatan' => 'Persyarikatan',
                                'aum' => 'Amal Usaha Muhammadiyah',
                                'prestasi' => 'Prestasi',
                                'umum' => 'Umum',
                            ])
                            ->required()
                            ->native(false),
                    ])->columnSpan(1),

                Section::make('Koleksi Foto')
                    ->description('Anda bisa mengunggah hingga 20 foto sekaligus.')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Unggah Foto')
                            ->image()
                            ->multiple()
                            ->reorderable()
                            ->appendFiles()
                            ->imageEditor()
                            ->directory('gallery')
                            ->required()
                            ->maxFiles(20)
                            ->maxSize(2048)
                            ->columnSpanFull()
                            ->hint('Klik dan geser foto untuk mengatur urutan tampilan.'),
                    ])->columnSpan(1),
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Foto')
                    ->stacked()
                    ->limit(3)
                    ->limitedRemainingText()
                    ->extraImgAttributes([
                        'class' => 'rounded-xl', 
                    ])
                    ->disk('public'),

                TextColumn::make('title')
                    ->label('Judul Album')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('category')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'persyarikatan' => 'success', // Hijau
                        'aum' => 'info',      // Biru
                        'prestasi' => 'warning',   // Kuning/Emas
                        'umum' => 'gray',     // Abu-abu
                        default => 'gray',
                    })
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d M Y')
                    ->sortable(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->label('Kategori')
                    ->options([
                        'persyarikatan' => 'Persyarikatan',
                        'aum' => 'Amal Usaha Muhammadiyah',
                        'prestasi' => 'Prestasi',
                        'umum' => 'Umum',
                    ]),
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
            'index' => Pages\ListGalleries::route('/'),
            'create' => Pages\CreateGallery::route('/create'),
            'edit' => Pages\EditGallery::route('/{record}/edit'),
        ];
    }
}