<?php

namespace App\Filament\Resources\ConfigurationResource\Pages;

use App\Filament\Resources\ConfigurationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewConfiguration extends ViewRecord
{
    protected static string $resource = ConfigurationResource::class;

    protected function getActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
