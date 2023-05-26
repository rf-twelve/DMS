<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;
    const ACTIONS = ['access','create','read','update','delete'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fullname',
        'username',
        'office_id',
        'avatar',
        'email',
        'password',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function office()
    {
        return $this->belongsTo(Office::class);
    }

    public function docs()
    {
        return $this->hasMany(Office::class, 'author_id');
    }

    public function imageUrl()
    {
        return $this->avatar
            ? Storage::disk('images')->url($this->avatar)
            : asset('img/users/avatar.png');
    }
    public function officeName()
    {
        return $this->office_id
            ? (Office::find($this->office_id))->name
            : 'Unknown';
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
