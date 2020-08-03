<?php


namespace App\Domain\Story\Services\Core;


use App\Domain\Story\Services\Core\StoryServiceHandlers\CreateHandler;
use App\Domain\Story\Services\Core\StoryServiceHandlers\DeleteHandler;
use App\Infrastructure\Services\Service;

class StoryService extends Service
{
    protected $handlers = [
        'create' => CreateHandler::class,
        'delete' => DeleteHandler::class,
    ];
}
