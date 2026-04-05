<?php

namespace App\Filament\Resources\Ekspedisis\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Forms\Components\ViewField;

class EkspedisiForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Forms\Components\Select::make('surat_id')
                    ->label('Pengirim (No Agenda)')
                    ->relationship(
                        name: 'surat',
                        titleAttribute: 'nomor_surat'
                    )
                    ->searchable()
                    ->preload()
                    ->required(),

                Forms\Components\Placeholder::make('perihal')
                    ->label('Perihal')
                    ->content(fn ($get) =>
                        optional(
                            \App\Models\Surat::find($get('surat_id')))
                            ->perihal ?? '-'
                    ),

                Forms\Components\Textarea::make('disposisi')
                    ->label('Disposisi')
                    ->rows(3)
                    ->required(),

                Forms\Components\Select::make('bagian_id')
                    ->label('Bagian Tujuan')
                    ->relationship('bagian', 'nama_bagian')
                    ->searchable()
                    ->required(),

                Forms\Components\DatePicker::make('tanggal_kirim')
                    ->label('Tanggal Kirim')
                    ->required(),
            ]);
    }
}