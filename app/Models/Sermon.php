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
        'title',
        'slug',
        'description',
        'price',
        'downloads',
        'audio',
        'photo',
        'video',
        'pdf',
        'event_id',
        'user_id',
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
