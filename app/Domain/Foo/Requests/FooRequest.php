<?php


namespace app\Domain\Foo\Requests;

use App\Infrastructure\Requests\Request;

class FooRequest extends Request
{
    public function rules(): array
    {
        return [
            'number' => 'required|integer'
        ];
    }
}
