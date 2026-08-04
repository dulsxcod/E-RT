<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    public const ROLE_SUPER_ADMIN = 'super_admin';

    public const ROLE_RT = 'rt';

    public const ROLE_BENDAHARA = 'bendahara';

    public const ROLE_KETUA_PEMUDA = 'ketua_pemuda';

    public const ROLE_WARGA = 'warga';

    public const ROLES = [
        self::ROLE_SUPER_ADMIN => 'Super Admin',
        self::ROLE_RT => 'RT',
        self::ROLE_BENDAHARA => 'Bendahara',
        self::ROLE_KETUA_PEMUDA => 'Ketua Pemuda',
        self::ROLE_WARGA => 'Warga',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function hasRole(string $role): bool
    {
        if ($this->role === self::ROLE_SUPER_ADMIN) {
            return true;
        }

        return $this->role === $role;
    }
}
