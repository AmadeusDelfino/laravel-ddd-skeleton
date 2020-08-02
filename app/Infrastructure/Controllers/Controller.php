<?php


namespace App\Infrastructure\Controllers;

use App\Application\Exceptions\ServiceControllerNotExists;
use App\Infrastructure\Responses\HttpResponse;
use App\Infrastructure\Services\ServiceHttpLayer;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $service;

    /**
     * Controller constructor.
     * @throws ServiceControllerNotExists
     */
    public function __construct()
    {
        if (!class_exists($this->service)) {
            throw new ServiceControllerNotExists($this->service);
        }

        $this->service = new ServiceHttpLayer($this->service);
    }

    public function response(HttpResponse $response)
    {
        return response()
            ->json($response->getData(), $response->getHttpCode());
    }

    protected function getLoggedUserId(): int
    {
        return Auth::user()->id;
    }
}
