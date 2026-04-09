<?php

namespace App\Filament\UserWidgets;

use App\Models\Surat;
use Filament\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;

class SuratListWidget extends BaseWidget
{
    protected static ?string $heading = 'Arsip Dokumen Masuk';
    
    // INI YANG MEMBUAT TABEL TETAP LEBAR FULL SCREEN
    protected int | string | array $columnSpan = 'full';

    protected function getTableDescription(): ?string
    {
        return 'Daftar keseluruhan surat resmi yang telah didisposisikan kepada bagian Anda.';
    }

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
                ->icon('heroicon-m-hashtag')
                ->weight('bold')
                ->searchable()
                ->sortable()
                ->copyable()
                ->copyMessage('Nomor surat berhasil disalin!'),

            TextColumn::make('tanggal_surat')
                ->label('Tanggal')
                ->icon('heroicon-m-calendar-days')
                ->date('d M Y')
                ->sortable(),

            TextColumn::make('perihal')
                ->label('Perihal Dokumen')
                ->weight('medium')
                ->limit(45)
                ->wrap()
                ->searchable(),

            TextColumn::make('pengirim')
                ->label('Instansi Pengirim')
                ->icon('heroicon-m-building-office-2')
                ->limit(30)
                ->wrap()
                ->searchable(),

            TextColumn::make('sifat')
                ->label('Sifat')
                ->badge()
                ->color(fn (string $state): string => match ($state) {
                    'Biasa' => 'gray',
                    'Penting' => 'warning',
                    'Segera' => 'danger',
                    default => 'primary',
                })
                ->icon(fn (string $state): string => match ($state) {
                    'Biasa' => 'heroicon-m-envelope',
                    'Penting' => 'heroicon-m-exclamation-circle',
                    'Segera' => 'heroicon-m-bolt',
                    default => 'heroicon-m-document',
                }),

            TextColumn::make('file_surat')
                ->label('Status File')
                ->badge()
                ->formatStateUsing(fn ($state) => $state ? 'Tersedia' : 'Menunggu File')
                ->color(fn ($state) => $state ? 'success' : 'danger')
                ->icon(fn ($state) => $state ? 'heroicon-m-document-check' : 'heroicon-m-document-minus'),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('download')
                ->label('Unduh')
                ->icon('heroicon-m-arrow-down-tray')
                ->button() 
                ->color('success') // Tombol unduh tetap hijau standar Filament
                ->action(fn ($record) => response()->download(storage_path('app/public/' . $record->file_surat)))
                ->visible(fn ($record) => filled($record->file_surat)),
        ];
    }

    protected function getTableEmptyStateIcon(): ?string
    {
        return 'heroicon-o-inbox';
    }

    protected function getTableEmptyStateHeading(): ?string
    {
        return 'Belum Ada Dokumen Masuk';
    }

    protected function getTableEmptyStateDescription(): ?string
    {
        return 'Divisi Anda belum menerima disposisi surat dari pimpinan untuk saat ini.';
    }
}