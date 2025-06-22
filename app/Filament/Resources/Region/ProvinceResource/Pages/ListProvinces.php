<?php

namespace App\Filament\Resources\Region\ProvinceResource\Pages;

use App\Filament\Resources\Region\ProvinceResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProvinces extends ListRecords
{
    protected static string $resource = ProvinceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
