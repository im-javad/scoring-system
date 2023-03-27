<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    use HasFactory;

    protected $fillable = ['title' , 'text'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function getCreatedAtAttribute($value)
    {
        $time = date_diff(date_create($value) , now());
        if($time->d) return $time->d . ' days ago';
        if($time->h) return $this->h . ' hours ago';
        return $time->i . ' minutes ago';
    }
}
