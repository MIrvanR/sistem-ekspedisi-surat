<?php

namespace App\Filament\Resources\Users\Schemas;

use Filament\Forms;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Forms\Components\TextInput::make('name')
                    ->label('Nama')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('email')
                    ->label('Email')
                    ->email()
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),

                Forms\Components\Select::make('role')
                    ->label('Role')
                    ->options([
                        'admin' => 'Admin',
                        'user' => 'User',
                    ])
                    ->required(),

                Forms\Components\Select::make('bagian_id')
                    ->label('Asal Bagian')
                    ->relationship('bagian', 'nama_bagian')
                    ->searchable()
                    ->preload()
                    ->required(fn (Get $get): bool => $get('role') === 'user')
                    ->hidden(fn (Get $get): bool => $get('role') === 'admin')
                    ->helperText('Wajib dipilih jika mendaftarkan akun untuk bagian penerima surat.'),

                Forms\Components\TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn (?string $state): bool => filled($state))
                    ->required(fn ($operation): bool => $operation === 'create')
                    ->minLength(8),

                Forms\Components\TextInput::make('password_confirmation')
                    ->label('Konfirmasi Password')
                    ->password()
                    ->same('password')
                    ->dehydrated(false)
                    ->required(fn ($operation): bool => $operation === 'create')
                    ->minLength(8),
            ]);
    }
}
