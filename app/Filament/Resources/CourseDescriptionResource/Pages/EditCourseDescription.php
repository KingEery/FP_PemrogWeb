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
    protected function beforeSave(): void
    {
        $materiCount = $this->record->materis()->count();

        if ($materiCount === 0) {
            $this->notify('danger', 'Silakan tambahkan materi terlebih dahulu sebelum menyimpan.');
            $this->halt(); // menghentikan proses simpan
        }
    }
}
