<?php

namespace App\Filament\Resources\CourseDescriptionResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\Layout\Panel;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;

class MaterisRelationManager extends RelationManager
{
    protected static string $relationship = 'materis'; // Nama relasi dari model CourseDescription

    public function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('judul')->required(),
            Forms\Components\TextInput::make('slug')->required()->unique(),
            Forms\Components\RichEditor::make('konten')->required()->columnSpanFull(),
        ]);
    }

    public function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('slug')
                    ->label('Slug')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false),
                TextColumn::make('judul')
                    ->label('Judul')
                    ->toggleable(),
            ])
            ->expandable(
                fn($record) => Panel::make()
                    ->schema([
                        Forms\Components\RichEditor::make('konten')
                            ->label('Isi Materi')
                            ->disableToolbarButtons(['bulletList', 'orderedList', 'redo', 'undo'])
                            ->disabled()
                            ->default(fn($record) => $record->konten),
                    ])
            )
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ]);
    }
}
