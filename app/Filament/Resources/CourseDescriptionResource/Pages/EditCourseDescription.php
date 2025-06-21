<?php

namespace App\Filament\Resources\CourseDescriptionResource\Pages;

use App\Filament\Resources\CourseDescriptionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCourseDescription extends EditRecord
{
    protected static string $resource = CourseDescriptionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
