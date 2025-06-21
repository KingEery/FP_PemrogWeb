<?php

namespace App\Filament\Resources\MentoringDescriptionResource\Pages;

use App\Filament\Resources\MentoringDescriptionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMentoringDescription extends EditRecord
{
    protected static string $resource = MentoringDescriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
