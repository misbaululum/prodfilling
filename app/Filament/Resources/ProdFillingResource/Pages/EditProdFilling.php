<?php

namespace App\Filament\Resources\ProdFillingResource\Pages;

use App\Filament\Resources\ProdFillingResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProdFilling extends EditRecord
{
    protected static string $resource = ProdFillingResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
