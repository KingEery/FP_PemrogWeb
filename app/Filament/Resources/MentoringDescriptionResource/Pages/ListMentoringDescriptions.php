<?php

namespace App\Filament\Resources\MentoringDescriptionResource\Pages;

use App\Filament\Resources\MentoringDescriptionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMentoringDescriptions extends ListRecords
{
    protected static string $resource = MentoringDescriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
