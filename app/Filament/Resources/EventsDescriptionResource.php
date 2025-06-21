<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EventsDescriptionResource\Pages;
use App\Models\EventsDescription;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class EventsDescriptionResource extends Resource
{
    protected static ?string $model = EventsDescription::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Events';

    protected static ?string $modelLabel = 'Event';

    protected static ?string $pluralModelLabel = 'Events';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Basic Information')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(1),
                            
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->directory('events-descriptions')
                            ->columnSpanFull(),
                            
                        Forms\Components\TextInput::make('category')
                            ->required()
                            ->maxLength(255)
                            ->columnSpan(1),
                    ])->columns(2),

                Forms\Components\Section::make('Event Details')
                    ->schema([
                        Forms\Components\Textarea::make('overview')
                            ->required()
                            ->rows(4)
                            ->columnSpanFull(),
                            
                        Forms\Components\Repeater::make('what_youll_learn')
                            ->schema([
                                Forms\Components\TextInput::make('item')
                                    ->required()
                                    ->placeholder('Enter learning point')
                            ])
                            ->label('What You Will Learn')
                            ->addActionLabel('Add Learning Point')
                            ->columnSpanFull(),
                            
                        Forms\Components\Repeater::make('terms_conditions')
                            ->schema([
                                Forms\Components\TextInput::make('term')
                                    ->required()
                                    ->placeholder('Enter term or condition')
                            ])
                            ->label('Terms & Conditions')
                            ->addActionLabel('Add Term')
                            ->columnSpanFull(),
                    ]),

                
                Forms\Components\Section::make('Pricing')
                    ->schema([
                        Forms\Components\TextInput::make('price_original')
                            ->label('Original Price')
                            ->numeric()
                            ->prefix('Rp')
                            ->placeholder('100000'),
                            
                        Forms\Components\TextInput::make('price_discounted')
                            ->label('Discounted Price')
                            ->numeric()
                            ->prefix('Rp')
                            ->placeholder('75000'),
                    ])->columns(2),

                Forms\Components\Section::make('Speaker Information')
                    ->schema([
                        Forms\Components\TextInput::make('speaker_name')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('John Doe'),
                            
                        Forms\Components\TextInput::make('speaker_title')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Senior Developer at Company'),
                    ])->columns(2),

                Forms\Components\Section::make('Schedule & Location')
                    ->schema([
                        Forms\Components\Repeater::make('dates')
                            ->schema([
                                Forms\Components\DatePicker::make('date')
                                    ->required()
                                    ->label('Event Date')
                            ])
                            ->label('Event Dates')
                            ->addActionLabel('Add Date')
                            ->columnSpanFull(),
                            
                        Forms\Components\TextInput::make('time')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('09:00 - 17:00')
                            ->columnSpan(1),
                            
                        Forms\Components\TextInput::make('location')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Online / Offline Location')
                            ->columnSpan(1),
                    ])->columns(2),

                Forms\Components\Section::make('Event Includes')
                    ->schema([
                        Forms\Components\Repeater::make('includes')
                            ->schema([
                                Forms\Components\TextInput::make('item')
                                    ->required()
                                    ->placeholder('Certificate, Materials, etc.')
                            ])
                            ->label('What This Event Includes')
                            ->addActionLabel('Add Item')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->circular()
                    ->size(50),
                    
                Tables\Columns\TextColumn::make('title')
                    ->label('Event Title')
                    ->searchable()
                    ->sortable()
                    ->wrap(),
                    
                Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'web-programming' => 'info',
                        'ui-ux' => 'success', 
                        'data-science' => 'warning',
                        'mobile-dev' => 'danger',
                        'fullstack' => 'primary',
                        'backend' => 'gray',
                        default => 'secondary',
                    }),
                
                Tables\Columns\TextColumn::make('speaker_name')
                    ->label('Speaker')
                    ->searchable(),
                
                Tables\Columns\TextColumn::make('dates')
                    ->label('Event Dates')
                    ->formatStateUsing(function ($state, EventsDescription $record) {
                        if (empty($state)) return '-';
                        
                        // Gunakan method display untuk menampilkan tanggal
                        $dates = $record->getDisplayDates();
                        return collect($dates)->implode(', ');
                    })
                    ->wrap(),

                Tables\Columns\TextColumn::make('price_discounted')
                    ->label('Price')
                    ->formatStateUsing(fn ($state) => $state ? 'Rp ' . number_format($state) : 'Free')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                    
                Tables\Columns\IconColumn::make('event_created')
                    ->label('Event Created')
                    ->boolean()
                    ->trueIcon('heroicon-o-check-circle')
                    ->falseIcon('heroicon-o-x-circle')
                    ->getStateUsing(fn (EventsDescription $record): bool => $record->event()->exists()),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'web-programming' => 'Web Programming',
                        'ui-ux' => 'UI/UX Design',
                        'data-science' => 'Data Science',
                        'mobile-dev' => 'Mobile Development',
                        'fullstack' => 'Fullstack Development',  
                        'backend' => 'Backend Development',
                        'other' => 'Other',
                    ]),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\Action::make('create_event')
                    ->label('Create Event')
                    ->icon('heroicon-o-plus')
                    ->color('success')
                    ->visible(fn (EventsDescription $record): bool => !$record->event()->exists())
                    ->action(function (EventsDescription $record) {
                        // Gunakan method display untuk mendapatkan tanggal pertama
                        $dates = $record->getDisplayDates();
                        $firstDate = !empty($dates) ? $dates[0] : now()->format('Y-m-d');
                        
                        Event::create([
                            'events_description_id' => $record->id,
                            'title' => $record->title,
                            'location' => $record->location,
                            'date' => $firstDate,
                            'category' => $record->category,
                            'price' => $record->price_discounted ?? $record->price_original ?? '0',
                            'image' => $record->image ?? '',
                        ]);
                        
                        $record->notify('Event created successfully!');
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEventsDescriptions::route('/'),
            'create' => Pages\CreateEventsDescription::route('/create'),
            'edit' => Pages\EditEventsDescription::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['title', 'category', 'speaker_name'];
    }
}