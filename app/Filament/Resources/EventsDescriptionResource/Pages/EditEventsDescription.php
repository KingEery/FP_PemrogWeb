<?php

namespace App\Filament\Resources\EventsDescriptionResource\Pages;

use App\Filament\Resources\EventsDescriptionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditEventsDescription extends EditRecord
{
    protected static string $resource = EventsDescriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
