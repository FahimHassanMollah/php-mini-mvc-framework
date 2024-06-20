<?php

namespace App\Models;

use App\Base\Model;

class Portfolio extends Model
{
    protected string $tableName = 'test';

    public function get()
    {
        return $this->fetchAll("SELECT * FROM {$this->tableName} ");
    }

    public function find($id)
    {
        return $this->fetchObj("SELECT * FROM test WHERE id = $id");
    }
}