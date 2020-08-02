<?php


namespace App\Domain\User\Models;


use App\Infrastructure\Models\Model;

class UserToken extends Model
{
    protected $fillable = [
        'token',
        'user_id',
        'invalided_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
