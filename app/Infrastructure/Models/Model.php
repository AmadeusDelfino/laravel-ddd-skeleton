<?php


namespace App\Infrastructure\Models;


use Illuminate\Database\Eloquent\SoftDeletes;

abstract class Model extends \Illuminate\Database\Eloquent\Model
{
    use SoftDeletes;
}
