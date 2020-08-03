<?php


namespace App\Domain\Story\Services\Core\StoryServiceHandlers;


use App\Domain\Story\Models\Story;

class CreateHandler extends \App\Infrastructure\Services\Handlers\CreateHandler
{
    protected $model = Story::class;
    protected $rules = [
        'title' => 'required',
        'story' => 'required',
        'user_id' => 'required|exists:users,id',
    ];
}
