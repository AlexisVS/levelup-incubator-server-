<?php

namespace Modules\Incubator\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Incubator\Entities\Goal;
use Modules\Incubator\Entities\GoalTask;
use Modules\Incubator\Entities\Startup;

class GoalController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data = [
            'goals' => Goal::all(),
        ];

        return view('incubator::pages.goals.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($startupId)
    {
        $data = [
            'startup' => Startup::find($startupId),
            'goal_tasks' => GoalTask::all(),
        ];

        return view('incubator::pages.goals.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request, $startupId)
    {
        $request->validate([
            'name' => 'required|unique:goals,name',
            'description' => 'required',
        ]);

        $store = Goal::create([
            'name' => $request->name,
            'description' => trim($request->description),
            'startup_id' => $startupId,
        ]);


        return redirect('/incubator/startups/show/' . $startupId)->with('success', 'Goal has been successfully created.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($startupId, $goalId)
    {
        $data = [
            'goal' => Goal::find($goalId),
        ];

        return view('incubator::pages.goals.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($startupId, $goalId)
    {
        $data = [
            'startup' => Startup::find($startupId),
            'goal' => Goal::find($goalId),
            'goal_tasks' => GoalTask::all(),
        ];

        return view('incubator::pages.goals.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $startupdId, $goalId)
    {
        $request->validate([
            'name' => 'required|unique:goals,name',
            'description' => 'required',
        ]);

        $update = Goal::find($goalId);
        $update->name = $request->name;
        $update->description = trim($request->description);
        $update->save();



        

        return redirect('/incubator/startups/show/' . $startupdId)->with('success', 'The goal ' . $update->name . ' has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($startupId, $goalId)
    {
        $destroy = Goal::find($goalId);
        $destroy->goalTasks()->detach();
        $destroy->delete();

        return redirect('/incubator/startups/show/' . $startupId)->with('success', 'The goal template has been successfully deleted.');
    }
}
