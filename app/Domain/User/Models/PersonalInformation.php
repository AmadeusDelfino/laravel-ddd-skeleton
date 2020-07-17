<?php


namespace App\Domain\User\Models;


use App\Infrastructure\Models\Model;

class PersonalInformation extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
