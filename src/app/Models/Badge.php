<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Badge extends Model
{
    use HasFactory;

    protected $fillable = ['title' , 'description' , 'type' , 'required_points' , 'icon_url'];

    public function scopeXp($query)
    {
        return $query->where('type' , 0);
    }
}
