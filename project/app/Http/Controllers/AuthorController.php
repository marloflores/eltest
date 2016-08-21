<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\AuthorRepository;

use Illuminate\Http\Request;

class AuthorController extends Controller {

    /**
     * AuthorController constructor.
     * @param AuthorRepository $author
     */
    public function __construct(AuthorRepository $author)
	{
		$this->repository = $author;
	}

    /**
     * List all
     * @return mixed
     */
    public function index()
    {
        return \Response::json([
            'authors' => $this->repository->all()
        ]);
    }

}
