<?php


class BookControllerTest extends \TestCase {

	/**
	 * test search when limit is invalid
	 *
	 * @return void
	 */
	public function testShow()
	{
		$this->json('GET', '/books/2', ['id' => '2'])
			->seeJson([ 'id' => '2' ]);

	}

}
