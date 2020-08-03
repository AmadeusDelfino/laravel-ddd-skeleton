<?php


namespace App\Domain\User\Models;


use App\Domain\Story\Models\Story;
use App\Infrastructure\Models\Model;

class User extends Model
{
    protected $fillable = [
        'name',
        'email',
        'password',
        'birth_date',
    ];

    public function tokens()
    {
        return $this->hasMany(UserToken::class);
    }

    public function stories()
    {
        return $this->hasMany(Story::class);
    }
}
