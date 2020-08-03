<?php


namespace App\Domain\Story\Models;


use App\Domain\User\Models\User;
use App\Infrastructure\Models\Model;

class Story extends Model
{
    protected $fillable = [
        'title',
        'story',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
