<?php


namespace App\Domain\Story\Http\Controllers;


use App\Domain\Story\Services\Core\StoryService;
use App\Infrastructure\Controllers\Controller;
use App\Infrastructure\Services\ServiceArgument;
use Illuminate\Http\Request;

class StoryController extends Controller
{
    protected $service = StoryService::class;

    public function create(Request $request)
    {
        return $this
            ->response(
                $this
                    ->service
                    ->create(
                        new ServiceArgument(array_merge(['user_id' => $this->getLoggedUserId()], $request->all()))
                    )
            );
    }

    public function delete($id)
    {
        return $this
            ->response(
                $this
                    ->service
                    ->delete(new ServiceArgument(['owner_id' => $this->getLoggedUserId(), 'reference_id' => $id]))
            );
    }
}
