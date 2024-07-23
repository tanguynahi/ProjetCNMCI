<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Agent;
use App\Models\Artisan;
use App\Models\Apprenti;
use App\Models\Compagnon;
use App\Models\Administrateur;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'contact',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function administrateur()
    {
        return $this->hasOne(Administrateur::class);
    }

    public function artisan()
    {
        return $this->hasOne(Artisan::class);
    }

    public function compagnon()
    {
        return $this->hasOne(Compagnon::class);
    }

    public function apprenti()
    {
        return $this->hasOne(Apprenti::class);
    }

    public function agent()
    {
        return $this->hasOne(Agent::class);
    }
}
