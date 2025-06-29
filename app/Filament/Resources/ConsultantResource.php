<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConsultantResource\Pages;
use App\Filament\Resources\ConsultantResource\RelationManagers;
use App\Models\Consultant;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ConsultantResource extends Resource
{
    protected static ?string $model = Consultant::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    protected static ?string $modelLabel = 'Mentor';

    protected static ?string $navigationLabel = 'Kelola Mentor';

    protected static ?string $navigationGroup = 'Manajemen';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Dasar')
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->required()
                            ->maxLength(255)
                            ->label('Nama Lengkap'),
                        Forms\Components\TextInput::make('email')
                            ->email()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone')
                            ->tel()
                            ->maxLength(20),
                    ])->columns(2),
                
                Forms\Components\Section::make('Profil Profesional')
                    ->schema([
                        Forms\Components\TextInput::make('position')
                            ->maxLength(255)
                            ->label('Posisi'),
                        Forms\Components\TextInput::make('company')
                            ->maxLength(255)
                            ->label('Perusahaan'),
                        Forms\Components\Select::make('specialty')
                            ->required()
                            ->options([
                                'Product Management' => 'Product Management',
                                'Mobile Development' => 'Mobile Development',
                                'Backend Development' => 'Backend Development',
                                'Frontend Development' => 'Frontend Development',
                                'UI/UX Design' => 'UI/UX Design',
                                'Full Stack' => 'Full Stack',
                                'Data Science' => 'Data Science',
                                'DevOps' => 'DevOps',
                            ])
                            ->label('Spesialisasi'),
                        Forms\Components\TextInput::make('hourly_rate')
                            ->numeric()
                            ->prefix('Rp')
                            ->label('Tarif per Jam'),
                    ])->columns(2),
                
                Forms\Components\Section::make('Detail Profil')
                    ->schema([
                        Forms\Components\Textarea::make('bio')
                            ->columnSpanFull()
                            ->label('Bio'),
                        Forms\Components\TextInput::make('location')
                            ->maxLength(255)
                            ->label('Lokasi'),
                        Forms\Components\FileUpload::make('profile_image')
                            ->image()
                            ->directory('consultants')
                            ->label('Foto Profil'),
                        Forms\Components\TextInput::make('rating')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(5)
                            ->step(0.1)
                            ->label('Rating (0-5)'),
                        Forms\Components\TextInput::make('total_reviews')
                            ->numeric()
                            ->minValue(0)
                            ->label('Total Ulasan'),
                        Forms\Components\TextInput::make('instagram_url')
                            ->url()
                            ->maxLength(255)
                            ->label('URL Instagram'),
                        Forms\Components\TextInput::make('linkedin_url')
                            ->url()
                            ->maxLength(255)
                            ->label('URL LinkedIn'),
                        Forms\Components\Toggle::make('is_active')
                            ->required()
                            ->label('Aktif'),
                    ])->columns(2),
                
                Forms\Components\Section::make('Pengalaman & Pendidikan')
                    ->schema([
                        Forms\Components\Repeater::make('experiences')
                            ->schema([
                                Forms\Components\TextInput::make('position')
                                    ->required()
                                    ->label('Posisi'),
                                Forms\Components\TextInput::make('company')
                                    ->required()
                                    ->label('Perusahaan'),
                                Forms\Components\TextInput::make('start_date')
                                    ->label('Tanggal Mulai'),
                                Forms\Components\TextInput::make('end_date')
                                    ->label('Tanggal Selesai'),
                            ])
                            ->columnSpanFull()
                            ->label('Pengalaman Kerja'),
                            
                        Forms\Components\Repeater::make('educations')
                            ->schema([
                                Forms\Components\TextInput::make('institution')
                                    ->required()
                                    ->label('Institusi'),
                                Forms\Components\TextInput::make('degree')
                                    ->required()
                                    ->label('Gelar'),
                                Forms\Components\TextInput::make('field_of_study')
                                    ->label('Bidang Studi'),
                                Forms\Components\TextInput::make('start_year')
                                    ->label('Tahun Mulai'),
                                Forms\Components\TextInput::make('end_year')
                                    ->label('Tahun Selesai'),
                            ])
                            ->columnSpanFull()
                            ->label('Pendidikan'),
                            
                        Forms\Components\TagsInput::make('skills')
                            ->columnSpanFull()
                            ->label('Keahlian'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('profile_image')
                    ->label('Foto')
                    ->circular(),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->label('Nama'),
                Tables\Columns\TextColumn::make('specialty')
                    ->searchable()
                    ->label('Spesialisasi'),
                Tables\Columns\TextColumn::make('location')
                    ->searchable()
                    ->label('Lokasi'),
                Tables\Columns\TextColumn::make('rating')
                    ->numeric(decimalPlaces: 1)
                    ->sortable()
                    ->label('Rating'),
                Tables\Columns\TextColumn::make('total_reviews')
                    ->numeric()
                    ->sortable()
                    ->label('Ulasan'),
                Tables\Columns\IconColumn::make('is_active')
                    ->boolean()
                    ->label('Aktif'),
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
                Tables\Filters\SelectFilter::make('specialty')
                    ->options([
                        'Product Management' => 'Product Management',
                        'Mobile Development' => 'Mobile Development',
                        'Backend Development' => 'Backend Development',
                        'Frontend Development' => 'Frontend Development',
                        'UI/UX Design' => 'UI/UX Design',
                        'Full Stack' => 'Full Stack',
                        'Data Science' => 'Data Science',
                        'DevOps' => 'DevOps',
                    ])
                    ->label('Spesialisasi'),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status Aktif'),
                Tables\Filters\Filter::make('high_rating')
                    ->label('Rating Tinggi')
                    ->query(fn (Builder $query): Builder => $query->where('rating', '>=', 4)),
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
            // Add relation managers if needed
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListConsultants::route('/'),
            'create' => Pages\CreateConsultant::route('/create'),
            'edit' => Pages\EditConsultant::route('/{record}/edit'),
        ];
    }
}