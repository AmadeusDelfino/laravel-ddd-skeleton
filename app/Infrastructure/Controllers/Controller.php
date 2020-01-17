<?php


namespace App\Infrastructure\Controllers;

use App\Application\Exceptions\ServiceControllerNotExists;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $service;

    public function __construct()
    {
        if (!interface_exists($this->service)) {
            throw new ServiceControllerNotExists($this->service);
        }

        $this->service = app($this->service);
    }
}
