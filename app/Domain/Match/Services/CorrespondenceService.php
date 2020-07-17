<?php


namespace App\Domain\Match\Services;


use App\Domain\User\Models\User;

class CorrespondenceService
{
    public function getApproximateMachs(User $user, $limit = 10)
    {
        $skills = $user->skills;
        $maths = $this->checkInDatabase($skills);
    }

    protected function checkInDatabase($skills)
    {
        #TODO implement alg
    }
}
