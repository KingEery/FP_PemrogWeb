<?php

namespace App\Filament\Resources\CourseDescriptionResource\Pages;

use App\Filament\Resources\CourseDescriptionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCourseDescription extends CreateRecord
{
    protected static string $resource = CourseDescriptionResource::class;
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['course_id'] = 1; // Ganti 1 dengan ID course yang kamu mau
        return $data;
    }
}
