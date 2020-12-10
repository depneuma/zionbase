<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blog extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['image', 'title', 'body', 'user_id'];

    protected $searchableFields = ['*'];

    public function author()
    {
        return $this->belongsTo(User::class);
    }
}