<?php


namespace App\Domain\Story\Services\Core\StoryServiceHandlers;


use App\Domain\Story\Models\Story;

class DeleteHandler extends \App\Infrastructure\Services\Handlers\DeleteHandler
{
    protected $model = Story::class;
    protected $ownerColumn = 'user_id';
}
