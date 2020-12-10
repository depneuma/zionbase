<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;    
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;
    use Searchable;

    protected $fillable = ['title', 'name', 'email', 'avatar', 'password'];

    protected $searchableFields = ['*'];

    protected $hidden = ['password', 'remember_token', 'two_factor_recovery_codes',
    'two_factor_secret',];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
//     protected $appends = [
//         'profile_photo_url',
//     ];

    public function sermons()
    {
        return $this->hasMany(Sermon::class);
    }

    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }

    public function rsvpOneEvents()
    {
        return $this->hasMany(Event::class, 'rsvp_one_id');
    }

    public function rsvpTwoEvents()
    {
        return $this->hasMany(Event::class, 'rsvp_two_id');
    }

    public function rsvpThreeEvents()
    {
        return $this->hasMany(Event::class, 'rsvp_three_id');
    }

    public function events()
    {
        return $this->belongsToMany(Event::class);
    }

    public function isSuperAdmin()
    {
        return $this->hasRole('super-admin');
    }
}
