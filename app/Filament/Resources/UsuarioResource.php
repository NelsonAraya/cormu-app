<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UsuarioResource\Pages;
use App\Filament\Resources\UsuarioResource\RelationManagers;
use App\Models\Usuario;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Section;

class UsuarioResource extends Resource
{
    protected static ?string $model = Usuario::class;
    
    protected static ?string $navigationLabel = 'Funcionarios';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {       
        return $form
            ->schema([

                Section::make('Personal Info')
                ->description('Informacion para el ingreso de Usuario')
                ->columns(3)
                ->schema([
                    Forms\Components\TextInput::make('id')
                        ->required()
                        ->reactive()
                        ->disabled(fn ($context) => $context === 'edit') // Bloquear solo en edición
                        ->afterStateUpdated(function ($state, callable $set) {
                            // Verificar si el formato contiene un guion y un DV válido
                            if (strpos($state, '-') !== false) {
                                $parts = explode('-', $state);
                    
                                // Validar que hay exactamente dos partes y que el DV no está vacío
                                if (count($parts) === 2 && !empty($parts[1])) {
                                    $rutSinDv = $parts[0];
                                    $dv = $parts[1];
                    
                                    // Actualizar los campos solo si hay un DV válido
                                    $set('id', $rutSinDv);
                                    $set('dv', $dv);
                                }
                            } else {
                                // Si no tiene guion o DV, limpiar el campo 'dv'
                                $set('dv', null);
                            }
                        }),
                    Forms\Components\TextInput::make('dv')
                        ->disabled(),
                    Forms\Components\TextInput::make('nombres')
                        ->required(),
                    Forms\Components\TextInput::make('apellidop')
                        ->required(),
                    Forms\Components\TextInput::make('apellidom')
                        ->required(),
                    Forms\Components\DatePicker::make('fecha_nacimiento')
                        ->required(),
                    Forms\Components\TextInput::make('telefono')
                        ->tel()
                        ->required()
                        ->numeric(),
                    Forms\Components\TextInput::make('direccion')
                        ->required(),
                    Forms\Components\TextInput::make('email')
                        ->email(),
                    Forms\Components\Select::make('prevision_id')
                        ->relationship(name: 'prevision', titleAttribute:'nombre')
                        ->searchable()
                        ->preload()
                        ->live()
                        ->required(),
                    Forms\Components\Select::make('afp_id')
                        ->relationship(name: 'afp', titleAttribute:'nombre')
                        ->searchable()
                        ->preload()
                        ->live()
                        ->required(),
                    Forms\Components\Select::make('sexo_id')
                        ->relationship(name: 'sexo', titleAttribute:'nombre')
                        ->searchable()
                        ->preload()
                        ->live()
                        ->required(),
                    Forms\Components\Select::make('profesion_id')
                        ->relationship(name: 'profesion', titleAttribute:'nombre')
                        ->searchable()
                        ->preload()
                        ->live()
                        ->required(),
                    Forms\Components\Select::make('e_civil_id')
                        ->relationship(name: 'ecivil', titleAttribute:'nombre')
                        ->searchable()
                        ->preload()
                        ->live()
                        ->required(),
                    Forms\Components\Select::make('estado_id')
                        ->relationship(name: 'estado', titleAttribute:'nombre')
                        ->searchable()
                        ->preload()
                        ->live()
                        ->required(),
                ])

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('dv')
                    ->searchable(),
                Tables\Columns\TextColumn::make('nombres')
                    ->searchable(),
                Tables\Columns\TextColumn::make('apellidop')
                    ->searchable(),
                Tables\Columns\TextColumn::make('apellidom')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fecha_nacimiento')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('telefono')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('direccion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('prevision_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('afp_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('sexo_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('profesion_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('e_civil_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('estado_id')
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
            'index' => Pages\ListUsuarios::route('/'),
            'create' => Pages\CreateUsuario::route('/create'),
            'edit' => Pages\EditUsuario::route('/{record}/edit'),
        ];
    }
}
