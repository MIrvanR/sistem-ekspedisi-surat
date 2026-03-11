<?php

namespace App\Filament\Resources\Bagians;

use App\Filament\Resources\Bagians\Pages\CreateBagian;
use App\Filament\Resources\Bagians\Pages\EditBagian;
use App\Filament\Resources\Bagians\Pages\ListBagians;
use App\Filament\Resources\Bagians\Schemas\BagianForm;
use App\Filament\Resources\Bagians\Tables\BagiansTable;
use App\Models\Bagian;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class BagianResource extends Resource
{
    protected static ?string $model = Bagian::class;

    protected static ?string $navigationLabel = 'Bagian';
    protected static ?string $pluralModelLabel = 'Bagian';
    protected static ?string $modelLabel = 'Bagian';

    protected static ?string $recordTitleAttribute = 'nama_bagian';

    public static function form(Schema $schema): Schema
    {
        return BagianForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return BagiansTable::configure($table);
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
            'index' => ListBagians::route('/'),
            'create' => CreateBagian::route('/create'),
            'edit' => EditBagian::route('/{record}/edit'),
        ];
    }
}
