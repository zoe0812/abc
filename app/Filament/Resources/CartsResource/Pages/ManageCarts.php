<?php

namespace App\Filament\Resources\CartsResource\Pages;

use App\Filament\Resources\CartsResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageCarts extends ManageRecords
{
    protected static string $resource = CartsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
