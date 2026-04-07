<?php

namespace App\Models;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'bagian_id', // Ini wajib ada agar bisa disimpan
        'role',      // Ini wajib ada agar bisa disimpan
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function bagian()
    {
        return $this->belongsTo(Bagian::class);
    }

    // --- GEMBOK PANEL ---
    public function canAccessPanel(Panel $panel): bool
    {
        if ($panel->getId() === 'admin') {
            return $this->role === 'admin';
        }
        // Pastikan ID panel di UserPanelProvider.php milikmu namanya 'user'
        if ($panel->getId() === 'user') {
            return $this->role === 'user';
        }
        return false;
    }
}