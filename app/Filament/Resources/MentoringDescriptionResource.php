<?php
namespace App\Filament\Resources;

use App\Filament\Resources\MentoringDescriptionResource\Pages;
use App\Filament\Resources\MentoringDescriptionResource\RelationManagers;
use App\Models\MentoringDescription;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class MentoringDescriptionResource extends Resource
{
    protected static ?string $model = MentoringDescription::class;
    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationLabel = 'Mentoring';
    protected static ?string $modelLabel = 'Mentoring Program';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Tabs::make('Mentoring Management')
                    ->tabs([
                        Forms\Components\Tabs\Tab::make('Program Details')
                            ->schema([
                                Forms\Components\Section::make('Basic Information')
                                    ->schema([
                                        Forms\Components\TextInput::make('title')
                                            ->required()
                                            ->maxLength(255),
                                        Forms\Components\TextInput::make('slug')
                                            ->required()
                                            ->maxLength(255)
                                            ->unique(ignoreRecord: true),
                                        Forms\Components\FileUpload::make('image_path')
                                            ->label('Program Image')
                                            ->image()
                                            ->directory('mentoring-descriptions')
                                            ->required(),
                                    ])->columns(2),

                                Forms\Components\Section::make('Descriptions')
                                    ->schema([
                                        Forms\Components\Textarea::make('short_description')
                                            ->required()
                                            ->maxLength(500)
                                            ->columnSpanFull(),
                                        Forms\Components\RichEditor::make('long_description')
                                            ->required()
                                            ->columnSpanFull(),
                                        Forms\Components\RichEditor::make('about_program')
                                            ->required()
                                            ->columnSpanFull(),
                                    ]),
                            ]),

                        Forms\Components\Tabs\Tab::make('Pricing & Materials')
                            ->schema([
                                Forms\Components\Section::make('Pricing')
                                    ->schema([
                                        Forms\Components\TextInput::make('original_price')
                                            ->numeric()
                                            ->required()
                                            ->prefix('Rp'),
                                        Forms\Components\TextInput::make('discounted_price')
                                            ->numeric()
                                            ->prefix('Rp'),
                                    ])->columns(2),

                                Forms\Components\Section::make('Materials')
                                    ->schema([
                                        Forms\Components\Repeater::make('basic_materials')
                                            ->schema([
                                                Forms\Components\TextInput::make('item')
                                                    ->required()
                                            ])
                                            ->label('Basic Materials'),
                                        Forms\Components\Repeater::make('intermediate_materials')
                                            ->schema([
                                                Forms\Components\TextInput::make('item')
                                                    ->required()
                                            ])
                                            ->label('Intermediate Materials'),
                                        Forms\Components\Repeater::make('advanced_materials')
                                            ->schema([
                                                Forms\Components\TextInput::make('item')
                                                    ->required()
                                            ])
                                            ->label('Advanced Materials'),
                                    ]),
                            ]),

                        Forms\Components\Tabs\Tab::make('Settings')
                            ->schema([
                                Forms\Components\Section::make('Program Settings')
                                    ->schema([
                                        Forms\Components\Toggle::make('is_active')
                                            ->default(true)
                                            ->label('Active Program'),
                                        Forms\Components\TextInput::make('max_participants')
                                            ->numeric()
                                            ->default(10),
                                        Forms\Components\TextInput::make('duration_months')
                                            ->numeric()
                                            ->default(3),
                                        Forms\Components\Repeater::make('target_audience')
                                            ->schema([
                                                Forms\Components\TextInput::make('item')
                                                    ->required()
                                            ])
                                            ->label('Target Audience'),
                                        Forms\Components\Repeater::make('benefits')
                                            ->schema([
                                                Forms\Components\TextInput::make('item')
                                                    ->required()
                                            ])
                                            ->label('Program Benefits'),
                                    ])->columns(2),
                            ]),
                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image_path')
                    ->label('Image')
                    ->circular(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('original_price')
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\Filter::make('active')
                    ->query(fn ($query) => $query->where('is_active', true)),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListMentoringDescriptions::route('/'),
            'create' => Pages\CreateMentoringDescription::route('/create'),
            'edit' => Pages\EditMentoringDescription::route('/{record}/edit'),
        ];
    }
}