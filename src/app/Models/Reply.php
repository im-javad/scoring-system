<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    const XP = 20;
    
    use HasFactory;

    protected $fillable = ['text' , 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getCreatedAtAttribute($value)
    {
        $time = date_diff(date_create($value) , now());
        if($time->d) return $time->d . ' days ago';
        if($time->h) return $time->h . ' hours ago';
        return $time->i . ' minutes ago';
    }
}
