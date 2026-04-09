<?php

namespace App\Filament\Resources\Ekspedisis\Tables;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Forms\Components\ViewField;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString; // <-- WAJIB DITAMBAHKAN UNTUK POP-UP NATIVE

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

                Tables\Columns\TextColumn::make('bukti_foto')
                    ->label('Foto Penerimaan')
                    ->badge() // Bikin jadi bentuk lencana biar rapi
                    ->formatStateUsing(fn ($state) => $state ? 'Ada Foto' : 'Belum Ada')
                    ->color(fn ($state) => $state ? 'success' : 'danger')
                    ->icon(fn ($state) => $state ? 'heroicon-m-check-circle' : 'heroicon-m-x-circle'),

            ]) // <-- INI ADALAH PENUTUP DARI columns([])
            
            // --- TAMBAHKAN BLOK ACTIONS INI ---
            ->actions([
                
                // POP-UP NATIVE FILAMENT (TANPA FILE BLADE EXTERNAL)
                Action::make('lihat_foto')
                    ->label('Lihat Foto')
                    ->icon('heroicon-o-eye')
                    ->color('info')
                    ->modalHeading('Preview Foto Penerimaan')
                    ->modalSubmitAction(false) // Hilangkan tombol submit
                    ->modalCancelActionLabel('Tutup') // Tombol cancel jadi "Tutup"
                    ->modalContent(function ($record) {
                        // Jika foto ada, langsung tembak tag HTML img
                        $imageUrl = asset('storage/' . $record->bukti_foto);
                        
                        return new HtmlString('
                            <div style="display: flex; justify-content: center; padding: 1rem;">
                                <img src="' . $imageUrl . '" alt="Bukti Penerimaan" style="max-width: 100%; border-radius: 0.5rem; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
                            </div>
                        ');
                    })
                    ->visible(fn ($record) => $record->bukti_foto !== null), // Hanya muncul kalau ada fotonya

                Action::make('ambil_foto')
                    ->label('Kamera')
                    ->icon('heroicon-o-camera')
                    ->color('success') // Bikin tombolnya warna hijau
                    ->form([
                        ViewField::make('bukti_foto')
                            ->view('components.camera')
                    ])
                    ->modalHeading('Ambil Bukti Foto Penerimaan')
                    ->modalSubmitActionLabel('Simpan Foto')
                    ->action(function ($record, array $data) {
                        // Logika penyimpanan foto
                        if (!empty($data['bukti_foto']) && str_starts_with($data['bukti_foto'], 'data:image')) {
                            $image = $data['bukti_foto'];
                            $image = preg_replace('/^data:image\/\w+;base64,/', '', $image);
                            $image = str_replace(' ', '+', $image);
                            
                            $imageName = 'bukti-ekspedisi/' . uniqid() . '.png';
                            Storage::disk('public')->put($imageName, base64_decode($image));
                            
                            // Update database
                            $record->update([
                                'bukti_foto' => $imageName,
                                'status' => 'Diterima'
                            ]);
                        }
                    })
                    // Trik UX Keren: Tombol kamera akan HILANG jika surat sudah difoto!
                    ->hidden(fn ($record) => $record->bukti_foto !== null),

                EditAction::make(),
                DeleteAction::make(),
            ])
            // --- AKHIR DARI BLOK ACTIONS ---

            ->defaultSort('tanggal_kirim', 'desc');
    }
}