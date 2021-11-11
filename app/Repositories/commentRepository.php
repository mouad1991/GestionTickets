<?php

namespace App\Repositories;

use App\Models\Comment;
use App\Repositories\BaseRepository;

/**
 * Class commentRepository
 * @package App\Repositories
 * @version November 11, 2021, 12:26 pm UTC
*/

class commentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'content'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Comment::class;
    }

    public function create($input)
    {
        $model = $this->model->newInstance($input);
        $model->user_id = auth()->user()->id;
        $model->save();
        return $model;
    }
}
