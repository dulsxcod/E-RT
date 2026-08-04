<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class UserAccount extends Authenticatable
{
    protected $table = 'user';

    protected $primaryKey = 'UserID';

    public $incrementing = true;

    public $timestamps = false;

    protected $fillable = [
        'Username',
        'Password',
        'Token',
        'Role',
    ];

    protected $hidden = [
        'Password',
        'Token',
    ];

    public const ROLE_SLUGS = [
        'Super Admin' => 'super_admin',
        'RT' => 'rt',
        'Bendahara' => 'bendahara',
        'Ketua Pemuda' => 'ketua_pemuda',
        'Warga' => 'warga',
    ];

    public function roleSlug(): string
    {
        return self::ROLE_SLUGS[$this->Role] ?? 'warga';
    }

    public function hasRole(string $role): bool
    {
        if ($this->roleSlug() === 'super_admin') {
            return true;
        }

        return $this->roleSlug() === $role;
    }
}