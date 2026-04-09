<?php

namespace App\Filament\Resources\Surats;

use App\Filament\Resources\Surats\Pages\CreateSurat;
use App\Filament\Resources\Surats\Pages\EditSurat;
use App\Filament\Resources\Surats\Pages\ListSurats;
use App\Filament\Resources\Surats\Schemas\SuratForm;
use App\Filament\Resources\Surats\Tables\SuratsTable;
use App\Models\Surat;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SuratResource extends Resource
{
    protected static ?string $model = Surat::class;

    protected static ?string $navigationLabel = 'Surat';
    protected static ?string $pluralModelLabel = 'Surat';
    protected static ?string $modelLabel = 'Surat';

    protected static ?string $recordTitleAttribute = 'perihal';
    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-envelope-open';
    protected static string | \UnitEnum | null $navigationGroup = 'Manajemen Dokumen';
    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    
    public static function getNavigationBadgeColor(): string | array | null
    {
        return 'primary';
    }

    public static function form(Schema $schema): Schema
    {
        return SuratForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return SuratsTable::configure($table);
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
            'index' => ListSurats::route('/'),
            'create' => CreateSurat::route('/create'),
            'edit' => EditSurat::route('/{record}/edit'),
        ];
    }
}
