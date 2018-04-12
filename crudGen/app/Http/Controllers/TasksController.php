<?php

namespace App\Http\Controllers;

use App\DataTables\TasksDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTasksRequest;
use App\Http\Requests\UpdateTasksRequest;
use App\Repositories\TasksRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TasksController extends AppBaseController
{
    /** @var  TasksRepository */
    private $tasksRepository;

    public function __construct(TasksRepository $tasksRepo)
    {
        $this->tasksRepository = $tasksRepo;
    }

    /**
     * Display a listing of the Tasks.
     *
     * @param TasksDataTable $tasksDataTable
     * @return Response
     */
    public function index(TasksDataTable $tasksDataTable)
    {
        return $tasksDataTable->render('tasks.index');
    }

    /**
     * Show the form for creating a new Tasks.
     *
     * @return Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created Tasks in storage.
     *
     * @param CreateTasksRequest $request
     *
     * @return Response
     */
    public function store(CreateTasksRequest $request)
    {
        $input = $request->all();

        $tasks = $this->tasksRepository->create($input);

        Flash::success('Tasks saved successfully.');

        return redirect(route('tasks.index'));
    }

    /**
     * Display the specified Tasks.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $tasks = $this->tasksRepository->findWithoutFail($id);

        if (empty($tasks)) {
            Flash::error('Tasks not found');

            return redirect(route('tasks.index'));
        }

        return view('tasks.show')->with('tasks', $tasks);
    }

    /**
     * Show the form for editing the specified Tasks.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $tasks = $this->tasksRepository->findWithoutFail($id);

        if (empty($tasks)) {
            Flash::error('Tasks not found');

            return redirect(route('tasks.index'));
        }

        return view('tasks.edit')->with('tasks', $tasks);
    }

    /**
     * Update the specified Tasks in storage.
     *
     * @param  int              $id
     * @param UpdateTasksRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTasksRequest $request)
    {
        $tasks = $this->tasksRepository->findWithoutFail($id);

        if (empty($tasks)) {
            Flash::error('Tasks not found');

            return redirect(route('tasks.index'));
        }

        $tasks = $this->tasksRepository->update($request->all(), $id);

        Flash::success('Tasks updated successfully.');

        return redirect(route('tasks.index'));
    }

    /**
     * Remove the specified Tasks from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $tasks = $this->tasksRepository->findWithoutFail($id);

        if (empty($tasks)) {
            Flash::error('Tasks not found');

            return redirect(route('tasks.index'));
        }

        $this->tasksRepository->delete($id);

        Flash::success('Tasks deleted successfully.');

        return redirect(route('tasks.index'));
    }
}
