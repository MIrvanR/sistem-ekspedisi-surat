<?php

namespace App\Filament\UserWidgets;

use App\Models\Surat;
use Filament\Actions\Action;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class SuratListWidget extends TableWidget
{
    protected static ?string $heading = 'Daftar Surat Anda';

    protected function getTableQuery(): Builder
    {
        $user = auth()->user();

        return Surat::query()
            ->when(
                $user && $user->bagian_id,
                fn (Builder $query) => $query->whereHas('bagians', fn ($query) => $query->where('bagian.id', $user->bagian_id)),
            )
            ->orderByDesc('tanggal_surat');
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('nomor_surat')
                ->label('Nomor Surat')
                ->searchable()
                ->sortable(),

            TextColumn::make('tanggal_surat')
                ->label('Tanggal Surat')
                ->date()
                ->sortable(),

            TextColumn::make('perihal')
                ->label('Perihal')
                ->limit(40)
                ->wrap(),

            TextColumn::make('pengirim')
                ->label('Pengirim')
                ->limit(30)
                ->wrap(),

            TextColumn::make('sifat')
                ->label('Sifat')
                ->badge()
                ->colors([
                    'primary' => 'Biasa',
                    'warning' => 'Penting',
                    'danger' => 'Segera',
                ]),

            TextColumn::make('file_surat')
                ->label('File Surat')
                ->formatStateUsing(fn ($state) => $state ? 'Tersedia' : 'Tidak tersedia')
                ->color(fn ($state) => $state ? 'success' : 'danger'),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('download')
                ->label('Download')
                ->icon('heroicon-o-arrow-down-tray')
                ->action(fn ($record) => response()->download(storage_path('app/public/' . $record->file_surat)))
                ->visible(fn ($record) => filled($record->file_surat)),
        ];
    }
}
