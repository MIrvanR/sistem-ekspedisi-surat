<?php

namespace App\Filament\UserResources;

use App\Filament\UserResources\UserDashboardResource\Pages;
use App\Models\Ekspedisi;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Forms\Components\ViewField;
use Illuminate\Support\Facades\Storage;

class UserDashboardResource extends Resource
{
    protected static ?string $model = Ekspedisi::class;

    protected static ?string $navigationLabel = 'Dashboard Ekspedisi';

    protected static ?string $modelLabel = 'Ekspedisi';

    protected static ?string $pluralModelLabel = 'Ekspedisi';

    public static function form(Schema $schema): Schema
    {
        return $schema;
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                \Filament\Tables\Columns\TextColumn::make('tanggal_kirim')
                    ->label('Tanggal Kirim')
                    ->date(),

                \Filament\Tables\Columns\TextColumn::make('surat.nomor_surat')
                    ->label('No Agenda'),

                \Filament\Tables\Columns\TextColumn::make('surat.pengirim')
                    ->label('Pengirim'),

                \Filament\Tables\Columns\TextColumn::make('surat.perihal')
                    ->label('Perihal'),

                \Filament\Tables\Columns\TextColumn::make('disposisi')
                    ->label('Disposisi'),

                \Filament\Tables\Columns\TextColumn::make('bagian.nama_bagian')
                    ->label('Bagian Tujuan'),

                \Filament\Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Dikirim' => 'warning',
                        'Diterima' => 'success',
                        default => 'gray',
                    }),

                \Filament\Tables\Columns\ImageColumn::make('bukti_foto')
                    ->label('Foto Penerimaan')
                    ->disk('public')
                    ->visibility('public')
                    ->url(fn ($record) => $record->bukti_foto ? '/storage/' . ltrim($record->bukti_foto, '/') : null)
                    ->openUrlInNewTab()
                    ->height(40)
                    ->square(),
            ])
            ->actions([
                Action::make('ambil_foto')
                    ->label('📷 Ambil Foto')
                    ->icon('heroicon-o-camera')
                    ->color('success')
                    ->form([
                        ViewField::make('bukti_foto')
                            ->view('components.camera')
                    ])
                    ->modalHeading('Ambil Bukti Foto Penerimaan')
                    ->modalSubmitActionLabel('Simpan Foto')
                    ->action(function ($record, array $data) {
                        if (!empty($data['bukti_foto']) && str_starts_with($data['bukti_foto'], 'data:image')) {
                            $image = $data['bukti_foto'];
                            $image = preg_replace('/^data:image\/\w+;base64,/', '', $image);
                            $image = str_replace(' ', '+', $image);

                            $imageName = 'bukti-ekspedisi/' . uniqid() . '.png';
                            Storage::disk('public')->put($imageName, base64_decode($image));

                            $record->update([
                                'bukti_foto' => $imageName,
                                'status' => 'Diterima'
                            ]);
                        }
                    })
                    ->hidden(fn ($record) => $record->bukti_foto !== null),
            ])
            ->defaultSort('tanggal_kirim', 'desc');
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
            'index' => Pages\ListUserDashboards::route('/'),
        ];
    }
}