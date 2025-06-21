<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([
            TextInput::make('title')->required(),
            TextInput::make('tag'),
            Textarea::make('overview'),
            TextInput::make('price')->numeric()->required(),
            TextInput::make('price_discount')->numeric(),
            TextInput::make('instructor_name'),
            TextInput::make('instructor_position'),
            TextInput::make('video_count')->numeric(),
            TextInput::make('duration')->numeric(),
            Textarea::make('features')
                ->label('Features (JSON array seperti [\"PDF\", \"Certificate\"])'),
            TextInput::make('image_url')->label('Course Image URL'),
            TextInput::make('instructor_image_url')->label('Instructor Image URL'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            TextColumn::make('title')->searchable(),
            TextColumn::make('tag'),
            TextColumn::make('price')->money('IDR', true),
            TextColumn::make('instructor_name'),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
