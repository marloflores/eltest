<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\PublisherRepository;

use Illuminate\Http\Request;

class PublisherController extends Controller {

	/**
	 * PublisherController constructor.
	 * @param PublisherRepository $publisher	 */

	public function __construct(PublisherRepository $repository)
	{
		$this->repository = $repository;
	}

	/**
	 * List all
	 * @return mixed
	 */
	public function index()
	{
		return \Response::json([
			'publishers' => $this->repository->all()
		]);
	}

}
