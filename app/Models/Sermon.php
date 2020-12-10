<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sermon extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'cover',
        'title',
        'slug',
        'description',
        'price',
        'downloads',
        'user_id',
        'event_id',
        'audio',
        'video',
        'pdf',
    ];

    protected $searchableFields = ['*'];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function minister()
    {
        return $this->belongsTo(User::class);
    }
}
