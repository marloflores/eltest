<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model {

    /**
     * The table associated with Author
     *
     * @var string
     */
    protected $table = 'books';

    /**
     * The fields that are not shown in the response
     * @var array
     */
    protected $hidden = ['publisher_id', 'author_id'];

    /**
     * Relation with Publisher
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function publisher()
    {
        return $this->hasOne('App\Models\Publisher', 'id', 'publisher_id');
    }

    /**
     * Relation with Author
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function author()
    {
        return $this->hasOne('App\Models\Author', 'id', 'author_id');
    }

}
