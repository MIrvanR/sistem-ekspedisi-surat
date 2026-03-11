<?php

namespace App\Filament\Resources\Ekspedisis;

use App\Filament\Resources\Ekspedisis\Pages\CreateEkspedisi;
use App\Filament\Resources\Ekspedisis\Pages\EditEkspedisi;
use App\Filament\Resources\Ekspedisis\Pages\ListEkspedisis;
use App\Filament\Resources\Ekspedisis\Schemas\EkspedisiForm;
use App\Filament\Resources\Ekspedisis\Tables\EkspedisisTable;
use App\Models\Ekspedisi;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;

class EkspedisiResource extends Resource
{
    protected static ?string $model = Ekspedisi::class;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Ekspedisi';

    protected static ?string $modelLabel = 'Ekspedisi';

    protected static ?string $pluralModelLabel = 'Ekspedisi';

    public static function form(Schema $schema): Schema
    {
        return EkspedisiForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return EkspedisisTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListEkspedisis::route('/'),
            'create' => CreateEkspedisi::route('/create'),
            'edit' => EditEkspedisi::route('/{record}/edit'),
        ];
    }
}