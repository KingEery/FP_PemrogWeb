<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CourseDescriptionResource\Pages;
use App\Filament\Resources\CourseDescriptionResource\RelationManagers;
use App\Models\CourseDescription;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CourseDescriptionResource extends Resource
{
    protected static ?string $model = CourseDescription::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('course_id')
                    ->label('Course')
                    ->relationship('course', 'title')
                    ->required()
                    ->hidden(),

                TextInput::make('title')->required(),
                TextInput::make('tag')->required(),
                Textarea::make('overview')->required(),
                TextInput::make('price')->numeric()->required(),
                TextInput::make('price_discount')->numeric(),
                TextInput::make('instructor_name'),
                TextInput::make('instructor_position'),
                TextInput::make('video_count')->numeric(),
                TextInput::make('duration')->numeric(),
                Textarea::make('features')->label('Features (JSON format, contoh: ["PDF","Video"])'),
                FileUpload::make('image_url')
                    ->label('Course Image') // bisa diganti sesuai kebutuhan
                    ->image() // ini wajib untuk validasi image/*
                    ->directory('courses') // folder penyimpanan di storage/app/public/courses
                    ->preserveFilenames()
                    ->imagePreviewHeight('200')
                    ->openable()
                    ->downloadable()
                    ->required(),

                    FileUpload::make('instructor_image_url')
                    ->label('Instructor Photo')
                    ->image()
                    ->directory('instructors')
                    ->preserveFilenames()
                    ->imagePreviewHeight('150')
                    ->required(),                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
        ->columns([
            Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
            Tables\Columns\TextColumn::make('tag')->searchable(),
            Tables\Columns\TextColumn::make('price')->money('IDR', true)->sortable(),
            Tables\Columns\TextColumn::make('price_discount')->money('IDR', true),
            Tables\Columns\TextColumn::make('instructor_name'),
            Tables\Columns\TextColumn::make('duration')->label('Durasi (menit)'),
            Tables\Columns\TextColumn::make('created_at')->dateTime()->label('Dibuat'),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
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
            'index' => Pages\ListCourseDescriptions::route('/'),
            'create' => Pages\CreateCourseDescription::route('/create'),
            'edit' => Pages\EditCourseDescription::route('/{record}/edit'),
        ];
    }
}
