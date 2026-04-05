<?php

namespace App\Filament\Resources\UserResource\Schemas;

use Filament\Forms;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Hash;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
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

                Forms\Components\TextInput::make('password')
                    ->label('Password')
                    ->password()
                    ->dehydrateStateUsing(fn ($state) => Hash::make($state))
                    ->dehydrated(fn ($state) => filled($state))
                    ->required(fn (string $context): bool => $context === 'create')
                    ->minLength(8),

                Forms\Components\TextInput::make('password_confirmation')
                    ->label('Konfirmasi Password')
                    ->password()
                    ->same('password')
                    ->required(fn (string $context): bool => $context === 'create')
                    ->minLength(8),
            ]);
    }
}