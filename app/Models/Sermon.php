<?php

namespace App\Models;

use Illuminate\Support\Str;
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

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function event()
    {
        return $this->belongsTo(Event::class, 'event_id');
    }

    public function minister()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
