<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdFillingResource\Pages;
use App\Filament\Resources\ProdFillingResource\RelationManagers;
use App\Models\ProdFilling;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\DateTimePicker;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use App\Exports\ProdFillingsExport;

class ProdFillingResource extends Resource
{
    protected static ?string $model = ProdFilling::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                DatePicker::make('tanggal')
                    ->label('Tanggal')
                    ->required(),

                TextInput::make('nama_produk')
                    ->label('Nama Produk')
                    ->required(),

                TextInput::make('ka_group')
                    ->label('Ka Group')
                    ->required(),

                Select::make('ukuran')
                    ->label('Ukuran')
                    ->options([
                        'small' => 'Small',
                        'medium' => 'Medium',
                        'large' => 'Large',
                    ])
                    ->required(),

                TextInput::make('no_lot')
                    ->label('No. Lot')
                    ->required(),

                Select::make('bagian')
                    ->label('Bagian')
                    ->options([
                        'bagian_1' => 'Bagian 1',
                        'bagian_2' => 'Bagian 2',
                        'bagian_3' => 'Bagian 3',
                    ])
                    ->required(),

                    // ImageColumn::make('foto_standar')
                    // ->defaultImageUrl(url('/media/12982910_5124556.png')), // Path atau URL gambar statis
                    FileUpload::make('foto_standar')
                    ->label('Foto Standar')
                    ->required(),

                FileUpload::make('foto_real')
                    ->label('Foto Real')
                    ->nullable()
                    ->required(),

                Select::make('penanggung_jawab')
                    ->label('Penanggung Jawab')
                    ->options([
                        'person_1' => 'Person 1',
                        'person_2' => 'Person 2',
                        'person_3' => 'Person 3',
                    ])
                    ->required(),

                DateTimePicker::make('waktu_awal')
                    ->label('Waktu Awal')
                    ->required(),

                TextInput::make('downtime')
                    ->label('Downtime (minutes)')
                    ->nullable()
                    ->numeric(),

                FileUpload::make('foto_awal_dt')
                    ->nullable()
                    ->label('Foto Awal Downtime'),

                FileUpload::make('foto_akhir_dt')
                    ->nullable()
                    ->label('Foto Akhir Downtime'),

                DateTimePicker::make('waktu_akhir')
                    ->label('Waktu Akhir')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('tanggal')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('nama_produk')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('ka_group')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('ukuran')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('no_lot')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('bagian')
                    ->searchable()
                    ->sortable(),

                ImageColumn::make('foto_standar')
                    ->searchable()
                    ->sortable(),

                ImageColumn::make('foto_real')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('penanggung_jawab')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('waktu_awal')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('downtime')
                    ->searchable()
                    ->sortable(),

                ImageColumn::make('foto_awal_dt')
                    ->searchable()
                    ->sortable(),

                ImageColumn::make('foto_akhir_dt')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('waktu_akhir')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
                ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ExportBulkAction::make()->exporter(ProdFillingsExport::class),
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
            'index' => Pages\ListProdFillings::route('/'),
            'create' => Pages\CreateProdFilling::route('/create'),
            'edit' => Pages\EditProdFilling::route('/{record}/edit'),
        ];
    }
}
