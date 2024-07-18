<?php

namespace App\Filament\Resources\ProdFillingResource\Pages;

use App\Filament\Resources\ProdFillingResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProdFilling extends CreateRecord
{
    protected static string $resource = ProdFillingResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
