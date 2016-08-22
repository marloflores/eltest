<?php namespace App\Repositories;

use App\Models\Book;


class BookRepository extends BaseRepository
{
    public function __construct(Book $book)
    {
        $this->object = $book;
    }

    public function all()
    {
        return $this->object->with('author', 'publisher')->get();
    }

    public function find($id)
    {
        return $this->object->with('author', 'publisher')->findOrFail($id);
    }

    /**
     * The search keyword function
     * @param $keyword search term
     * @param int $offset skip number of items
     * @param int $limit maximum number
     * @return mixed
     */
    public function search($keyword, $offset = 0, $limit = 100)
    {
        $results = $this->object->with(['author', 'publisher'])
            ->where('title', 'like', "%{$keyword}%")
            ->orWhere('description', 'like', "%{$keyword}%")
            ->orWhereHas('author', function ($query) use ($keyword)
            {
                $query->where('first_name', 'like', "%{$keyword}%");

            })
            ->orWhereHas('author', function ($query) use ($keyword)
            {
                $query->where('last_name', 'like', "%{$keyword}%");

            })
            ->orWhereHas('publisher', function ($query) use ($keyword)
            {
                $query->where('name', 'like', "%{$keyword}%");

            })
            ->offset($offset)
            ->limit($limit)
            ->get();

        return $results;

    }
}