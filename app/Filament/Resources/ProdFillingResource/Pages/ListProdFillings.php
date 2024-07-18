<?php

namespace App\Filament\Resources\ProdFillingResource\Pages;

use App\Filament\Resources\ProdFillingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProdFillings extends ListRecords
{
    protected static string $resource = ProdFillingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
