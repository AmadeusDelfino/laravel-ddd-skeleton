<?php


namespace App\Infrastructure\Services;

use App\Domain\User\Exceptions\UserLoginNotFoundException;
use App\Infrastructure\Responses\HttpResponse;
use Illuminate\Validation\ValidationException;

class ServiceHttpLayer
{
    protected $service;

    public function __construct(string $service)
    {
        $this->service = new $service();
    }

    public function __call(string $name, array $arguments): HttpResponse
    {
        try {
            return $this
                ->process(
                    $this->service->{$name}($arguments[0]->getArguments()),
                    $arguments[0]->getExpectedHttpCode()
                );
        } catch (ValidationException $e) {
            return $this->process(['errors' => $e->errors()], 404);
        } catch (UserLoginNotFoundException $e) {
            return $this->process(['errors' => $e->getMessage()], 404);
        } catch (\Exception $e) {
            return $this->process(['errors' => [$e->getMessage()]], 500);
        }
    }

    protected function process($data, $code = 200): HttpResponse
    {
        return new HttpResponse($data, $code);
    }
}
