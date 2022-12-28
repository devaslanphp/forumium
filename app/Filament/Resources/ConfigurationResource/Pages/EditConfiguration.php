<?php

namespace App\Filament\Resources\ConfigurationResource\Pages;

use App\Filament\Resources\ConfigurationResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConfiguration extends EditRecord
{
    protected static string $resource = ConfigurationResource::class;

    protected function getActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
        ];
    }
}
