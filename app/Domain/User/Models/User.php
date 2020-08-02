<?php


namespace App\Domain\User\Models;


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
}
