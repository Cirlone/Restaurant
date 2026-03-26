<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Cashier\Billable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, Billable;

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'role',
        'profile_photo_path',
        'two_factor_secret',
        'two_factor_recovery_codes',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected $appends = [];

    public function getProfilePhotoUrlAttribute()
    {
        if ($this->profile_photo_path) {
            return Storage::url($this->profile_photo_path);
        }
        
        $name = urlencode($this->name);
        return "https://ui-avatars.com/api/?name={$name}&color=7F9CF5&background=EBF4FF&size=200&bold=true";
    }

    public function twoFactorQrCodeSvg()
    {
        if (!$this->two_factor_secret) {
            return null;
        }

        if (!class_exists('\BaconQrCode\Writer')) {
            return null;
        }

        try {
            $otpUri = sprintf(
                'otpauth://totp/%s:%s?secret=%s&issuer=%s',
                preg_replace('/[^a-zA-Z0-9]/', '', config('app.name')),
                $this->email,
                decrypt($this->two_factor_secret),
                config('app.name')
            );

            $renderer = new \BaconQrCode\Renderer\ImageRenderer(
                new \BaconQrCode\Renderer\RendererStyle\RendererStyle(200),
                new \BaconQrCode\Renderer\Image\SvgImageBackEnd()
            );

            $writer = new \BaconQrCode\Writer($renderer);

            return $writer->writeString($otpUri);
        } catch (\Exception $e) {
            return null;
        }
    }

    public function recoveryCodes()
    {
        return json_decode(decrypt($this->two_factor_recovery_codes), true) ?? [];
    }

    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }

    public function hasAnyRole(array $roles): bool
    {
        return in_array($this->role, $roles, true);
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isManager(): bool
    {
        return $this->role === 'manager';
    }

    public function isClient(): bool
    {
        return $this->role === 'client';
    }

    public function isOperator(): bool
    {
        return $this->role === 'operator';
    }

    public function canManageUsers(): bool
    {
        return $this->hasAnyRole(['admin', 'manager']);
    }

    public function canAccessEcommerce(): bool
    {
        return $this->hasAnyRole(['admin', 'manager', 'operator', 'client']);
    }

    public function canSeeAdminProfileFeatures(): bool
    {
        return $this->isAdmin();
    }

    public function canSeeClientProfileFeatures(): bool
    {
        return $this->isClient();
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}