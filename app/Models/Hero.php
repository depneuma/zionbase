<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hero extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = ['line_one', 'line_two', 'line_three', 'button_route', 'button_name', 'image'];

    protected $searchableFields = ['*'];
}
