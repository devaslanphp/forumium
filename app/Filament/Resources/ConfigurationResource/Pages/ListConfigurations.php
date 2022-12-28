<?php

namespace App\Filament\Resources\ConfigurationResource\Pages;

use App\Filament\Resources\ConfigurationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConfigurations extends ListRecords
{
    protected static string $resource = ConfigurationResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
