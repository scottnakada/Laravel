<?php

namespace App\Repositories;

use App\Models\Tasks;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TasksRepository
 * @package App\Repositories
 * @version April 12, 2018, 5:30 am UTC
 *
 * @method Tasks findWithoutFail($id, $columns = ['*'])
 * @method Tasks find($id, $columns = ['*'])
 * @method Tasks first($columns = ['*'])
*/
class TasksRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'task',
        'priority',
        'due'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Tasks::class;
    }
}
