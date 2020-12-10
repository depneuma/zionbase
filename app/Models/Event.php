<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title',
        'description',
        'time',
        'venue',
        'rsvp_one_id',
        'rsvp_two_id',
        'rsvp_three_id',
        'cover',
        'schedule',
    ];

    protected $searchableFields = ['*'];

    public function sermons()
    {
        return $this->hasMany(Sermon::class);
    }

    public function thridRsvp()
    {
        return $this->belongsTo(User::class, 'rsvp_three_id');
    }

    public function secondRsvp()
    {
        return $this->belongsTo(User::class, 'rsvp_two_id');
    }

    public function firstRsvp()
    {
        return $this->belongsTo(User::class, 'rsvp_one_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
