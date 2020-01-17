<?php


namespace App\Domain\Foo\Http\Controllers;

use App\Domain\Foo\Contracts\FooService;
use App\Domain\Foo\Requests\FooRequest;
use App\Infrastructure\Controllers\Controller;

class FooController extends Controller
{
    /**
     * @var FooService
     */
    protected $service = FooService::class;

    public function foo(FooRequest $request)
    {
        return response(
            $this
                ->service
                ->fooMethod($request->get('number'))
        );
    }
}
