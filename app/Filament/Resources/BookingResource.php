<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('consultant_id')
                    ->relationship('consultant', 'name')
                    ->required(),
                Forms\Components\Select::make('free_trial_id')
                    ->relationship('freeTrial', 'title')
                    ->default(null),
                Forms\Components\TextInput::make('full_name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('phone')
                    ->tel()
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\DatePicker::make('booking_date')
                    ->required(),
                Forms\Components\TextInput::make('booking_time')
                    ->required(),
                Forms\Components\TextInput::make('duration')
                    ->required()
                    ->numeric()
                    ->default(60),
                Forms\Components\TextInput::make('type')
                    ->required(),
                Forms\Components\TextInput::make('status')
                    ->required(),
                Forms\Components\TextInput::make('topic')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\Textarea::make('notes')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('amount')
                    ->required()
                    ->numeric()
                    ->default(0.00),
                Forms\Components\TextInput::make('meeting_link')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('rating')
                    ->numeric()
                    ->default(null),
                Forms\Components\Textarea::make('feedback')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('consultant.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('freeTrial.title')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('full_name')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('booking_date')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('booking_time'),
                Tables\Columns\TextColumn::make('duration')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('type'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('topic')
                    ->searchable(),
                Tables\Columns\TextColumn::make('amount')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('meeting_link')
                    ->searchable(),
                Tables\Columns\TextColumn::make('rating')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
