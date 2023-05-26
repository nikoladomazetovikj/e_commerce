<?php

namespace App\Filament\Resources\SeedResource\Pages;

use App\Filament\Resources\SeedResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditSeed extends EditRecord
{
    protected static string $resource = SeedResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
