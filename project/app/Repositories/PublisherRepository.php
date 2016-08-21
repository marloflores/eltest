<?php namespace App\Repositories;

use App\Models\Publisher;


class PublisherRepository extends BaseRepository
{
    public function __construct(Publisher $publisher)
    {
        $this->object = $publisher;
    }
}