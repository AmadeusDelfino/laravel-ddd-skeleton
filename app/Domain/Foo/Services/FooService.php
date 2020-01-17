<?php


namespace App\Domain\Foo\Services;

use App\Domain\Foo\Contracts\FooService as FooServiceContract;

class FooService implements FooServiceContract
{
    public function fooMethod(int $fooParam): int
    {
        return $fooParam + 1;
    }
}
