<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    /**
     * @var Model
     */
    protected $object;

    /**
     * BaseRepository constructor.
     * @param Model $object
     */
    public function __construct(Model $object)
    {
        $this->object = $object;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function all()
    {
        return $this->object->all();
    }

    /**
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     */
    public function find($id)
    {
        return $this->object->findOrFail($id);
    }
}