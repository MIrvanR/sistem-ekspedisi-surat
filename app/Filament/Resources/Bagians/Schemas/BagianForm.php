<?php

namespace App\Filament\Resources\Bagians\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class BagianForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nama_bagian')
                    ->label('Nama Bagian')
                    ->required()
                    ->maxLength(255),

                TextInput::make('keterangan')
                    ->label('Keterangan')
                    ->maxLength(255),
            ]);
    }
}
