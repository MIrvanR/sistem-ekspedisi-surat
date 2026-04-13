<?php

namespace App\Filament\Resources\Surats\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class SuratForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('nomor_surat')
                    ->required(),

                DatePicker::make('tanggal_surat'),

                DatePicker::make('tanggal_masuk')
                    ->required(),

                TextInput::make('pengirim')
                    ->required(),

                TextInput::make('perihal')
                    ->required(),

                Select::make('sifat')
                    ->options([
                        'Biasa' => 'Biasa',
                        'Penting' => 'Penting',
                        'Rahasia' => 'Rahasia',
                    ])
                    ->required(),

                FileUpload::make('file_surat')
                    ->directory('surat')
                    ->disk('public')
                    ->acceptedFileTypes(['application/pdf'])
                    ->openable()
                    ->downloadable(),

            ]);
    }
}
