<?php

namespace App\Filament\Resources;

use App\Filament\Resources\VariantResource\Pages;
use App\Filament\Resources\VariantResource\RelationManagers;
use App\Models\Variant;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VariantResource extends Resource
{
    protected static ?string $model = Variant::class;

    protected static ?string $navigationIcon = 'fas-tag';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('sku')
                    ->label('sku')
                    ->options(\App\Models\Product::all()->pluck('product_sku', 'sku'))
                    ->required(),
                Forms\Components\Select::make('variant_group_id')
                    ->label('type')
                    ->required()
                    ->options(\App\Models\VariantGroup::all()->pluck('name', 'id')),
                Forms\Components\TextInput::make('value')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('stock')
                    ->required()
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product.name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('group.name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('value')
                    ->searchable(),
                Tables\Columns\TextColumn::make('stock')
                    ->numeric()
                    ->sortable()
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
            'index' => Pages\ListVariants::route('/'),
            'create' => Pages\CreateVariant::route('/create'),
            'edit' => Pages\EditVariant::route('/{record}/edit'),
        ];
    }
}
