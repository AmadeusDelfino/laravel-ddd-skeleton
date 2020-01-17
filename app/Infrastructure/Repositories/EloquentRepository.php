<?php


namespace app\Infrastructure\Repositories;

use app\Infrastructure\Contracts\DatabaseRepository;

class EloquentRepository implements DatabaseRepository
{
    protected $model;

    public function first($id)
    {
        // TODO: Implement first() method.
    }

    public function where(...$where)
    {
        // TODO: Implement where() method.
    }

    public function with(...$with)
    {
        // TODO: Implement with() method.
    }

    public function groupBy($attr)
    {
        // TODO: Implement groupBy() method.
    }

    public function orderBy($attr, $order = 'ASC')
    {
        // TODO: Implement orderBy() method.
    }

    public function get($columns = '*')
    {
        // TODO: Implement get() method.
    }

    public function all()
    {
        // TODO: Implement all() method.
    }

    public function select($columns)
    {
        // TODO: Implement select() method.
    }

    public function selectRaw($select)
    {
        // TODO: Implement selectRaw() method.
    }

    public function toSql()
    {
        // TODO: Implement toSql() method.
    }
}
