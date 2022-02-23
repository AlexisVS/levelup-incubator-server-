<?php

namespace Modules\Incubator\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Incubator\Entities\GoalTaskTemplate;
use Modules\Incubator\Entities\GoalTemplate;

class GoalTaskTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data = [
            'goal_task_templates' => GoalTaskTemplate::all(),
        ];

        return view('incubator::pages.goal_task_templates.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('incubator::pages.goal_task_templates.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:goal_task_templates,name',
        ]);

        GoalTaskTemplate::create([
            'name' => $request->name,
            'status' => 'undone'
        ]);

        return redirect('/incubator/goal-task-templates')->with('success', 'Goal Task Template has been successfully created.');
    }

    // /**
    //  * Show the specified resource.
    //  * @param int $id
    //  * @return Renderable
    //  */
    // public function show($id)
    // {
    //     return view('incubator::pages.goal_task_templates.show');
    // }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data = [
            'goal_task_template' => GoalTaskTemplate::find($id)
        ];
        return view('incubator::pages.goal_task_templates.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:goal_task_templates,name',
        ]);

        $update = GoalTaskTemplate::find($id);
        $update->name = $request->name;
        $update->save();

        return redirect('incubator/goal-task-templates')->with('success', 'The goal Task Template has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        // GoalTaskTemplate::destroy($id);
        $destroy = GoalTaskTemplate::find($id);
        $goalTemplates = GoalTemplate::all();
        foreach ($goalTemplates as $goalTemplate) {
            $goalTemplate->goalTaskTemplates()->detach($id);
        }
        $destroy->delete();
        // dd($destroy->goalTemplates);


        return redirect('incubator/goal-task-templates')->with('success', 'The goal Task Template has been successfully destroyed.');
    }
}
