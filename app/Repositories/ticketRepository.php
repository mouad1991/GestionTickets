<?php

namespace App\Repositories;

use App\Models\Ticket;
use App\Repositories\BaseRepository;

/**
 * Class ticketRepository
 * @package App\Repositories
 * @version November 11, 2021, 12:25 pm UTC
*/

class ticketRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'description'
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
        return Ticket::class;
    }

    public function create($input)
    {
        $model = $this->model->newInstance($input);
        $model->user_id = auth()->user()->id;
        $model->save();
        return $model;
    }
}
