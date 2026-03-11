<?php

namespace App\Filament\Resources\Ekspedisis\Tables;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;

class EkspedisisTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('tanggal_kirim')
                    ->label('Tanggal')
                    ->date(),

               Tables\Columns\TextColumn::make('surat.nomor_surat')
                    ->label('No Agenda'),

                Tables\Columns\TextColumn::make('surat.pengirim')
                    ->label('Pengirim'),    

                Tables\Columns\TextColumn::make('surat.perihal')
                    ->label('Perihal'),

                Tables\Columns\TextColumn::make('disposisi')
                    ->label('Disposisi'),

                Tables\Columns\TextColumn::make('bagian.nama_bagian')
                    ->label('Bagian Tujuan'),

                ImageColumn::make('bukti_foto')
                    ->label('Foto Penerimaan')
                    ->disk('public')
                    ->visibility('public')
                    ->height(60)
                    ->square(),

            ])
            ->defaultSort('tanggal_kirim', 'desc');
    }
}