<?php

namespace App\Filament\Resources\Surats\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Illuminate\Support\Facades\Storage;


class SuratsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nomor_surat')
                    ->searchable(),

                TextColumn::make('tanggal_surat')
                    ->date()
                    ->sortable(),

                TextColumn::make('tanggal_masuk')
                    ->date()
                    ->sortable(),

                TextColumn::make('pengirim')
                    ->searchable(),

                TextColumn::make('perihal')
                    ->searchable(),

                TextColumn::make('sifat')
                    ->badge(),

                TextColumn::make('file_surat')
                    ->label('File Surat')
                    ->formatStateUsing(fn ($state) => $state ? 'Lihat File' : '-')
                    ->url(fn ($record) => $record->file_surat
                        ? asset('storage/' . $record->file_surat)
                        : null
                    )
                    ->openUrlInNewTab(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                    ])

            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),

                Action::make('download')
                    ->label('Download')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->action(function ($record) {
                        return response()->download(
                            storage_path('app/public/' . $record->file_surat)
                        );
                    })
            ->visible(fn ($record) => $record->file_surat),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
