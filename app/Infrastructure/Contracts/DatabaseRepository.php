<?php


namespace app\Infrastructure\Contracts;

interface DatabaseRepository
{
    public function first($id);

    public function where(...$where);

    public function with(...$with);

    public function groupBy($attr);

    public function orderBy($attr, $order = 'ASC');

    public function get($columns = '*');

    public function all();

    public function select($columns);

    public function selectRaw($select);

    public function toSql();
}
