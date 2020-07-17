<?php


namespace App\Domain\User\Models;


use App\Domain\Match\Models\Skill;
use App\Infrastructure\Models\Model;

class User extends Model
{
    public function skills()
    {
        return $this->hasManyThrough(Skill::class, 'skill_user');
    }

    public function personalInformation()
    {
        return $this->hasOne(PersonalInformation::class);
    }
}
