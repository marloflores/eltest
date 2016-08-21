<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\BookRepository;

use Illuminate\Http\Request;


class BookController extends Controller {

	public function __construct(BookRepository $book)
	{
		$this->repository = $book;
	}


	public function search($keyword, $offset = 0, $limit = 100)
	{
		if(intval($limit) <= 0) {
            return \Response::json([]);
		}

        $items = $this->repository->search($keyword, $offset, $limit);
		return \Response::json([
                'books'     => $items,
                'offset'    => intval($offset),
                'limit'     => intval($limit),
                'total'     => count($items)
        ]);
	}

}
