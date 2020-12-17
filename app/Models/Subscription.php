<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subscription extends Model
{
    use Notifiable;
    use HasFactory;
    use Searchable;

    protected $fillable = ['email'];

    protected $searchableFields = ['*']; 
}
