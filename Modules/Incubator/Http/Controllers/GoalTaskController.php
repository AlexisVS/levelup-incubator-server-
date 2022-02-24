<?php

namespace Modules\Incubator\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Incubator\Entities\Goal;
use Modules\Incubator\Entities\GoalTask;
use Modules\Incubator\Entities\Startup;

class GoalTaskController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index($startupId, $goalId)
    {
        $data = [
            'goal' => Goal::find($goalId)
        ];
        return view('incubator::pages.goal_tasks.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($startupId, $goalId)
    {
        $data = [
            'goal' => Goal::find($goalId)
        ];

        return view('incubator::pages.goal_tasks.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, $startupId, $goalId)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $goalTask = GoalTask::create([
            'name' => $request->name,
            'status' => 'undone'
        ]);

        $goal = Goal::find($goalId);
        $goal->goalTasks()->attach($goalTask);

        return redirect('/incubator/startups/' . $startupId . '/goals/' . $goalId)->with('success', 'Goal Task has been successfully created.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($startupId, $goalId, $goalTaskId)
    {
        return view('incubator::pages.goals.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($startupId, $goalId, $goalTaskId)
    {
        $data = [
            'goal' => Goal::find($goalId),
            'startup' => Startup::find($startupId),
            'goal_task' => GoalTask::find($goalTaskId),
        ];
        return view('incubator::pages.goals.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $startupId, $goalId, $goalTaskId)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($startupId, $goalId, $goalTaskId)
    {
        //
    }
}
