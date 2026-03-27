<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OfficerResource\Pages;
use App\Models\Officer;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Components\Section; // Mengganti Card
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class OfficerResource extends Resource
{
    protected static ?string $model = Officer::class;

    // Mengganti ikon agar lebih sesuai dengan data pengurus (User Group)
    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    
    protected static ?string $navigationLabel = 'Struktur Pengurus';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Informasi Pengurus')
                    ->description('Kelola data nama, jabatan, dan foto profil pengurus.')
                    ->icon('heroicon-m-identification')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->label('Nama Lengkap'),

                        Forms\Components\TextInput::make('position')
                            ->required()
                            ->maxLength(255)
                            ->label('Jabatan'),

                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->imageEditor() // Memungkinkan crop foto agar rasio pas (4:5)
                            ->directory('officers')
                            ->label('Foto Profil')
                            ->helperText('Gunakan rasio portrait (4:5) untuk hasil terbaik.'),

                        Forms\Components\TextInput::make('sort_order')
                            ->numeric()
                            ->default(0)
                            ->label('Urutan Tampil')
                            ->helperText('Angka lebih kecil akan muncul lebih awal.'),
                    ])
                    ->columns(2), // Membuat input nama & jabatan sejajar
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Foto')
                    ->circular(),

                Tables\Columns\TextColumn::make('name')
                    ->label('Nama')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('position')
                    ->label('Jabatan')
                    ->searchable(),

                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->sortable()
                    ->badge(), // Menampilkan angka urutan dalam bentuk badge agar lebih rapi
            ])
            ->defaultSort('sort_order', 'asc') // Urutan otomatis dari yang terkecil
            ->filters([
                //
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
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOfficers::route('/'),
            'create' => Pages\CreateOfficer::route('/create'),
            'edit' => Pages\EditOfficer::route('/{record}/edit'),
        ];
    }
}