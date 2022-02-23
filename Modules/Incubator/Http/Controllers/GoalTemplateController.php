<?php

namespace Modules\Incubator\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Incubator\Entities\GoalTemplate;
use Modules\Incubator\Entities\GoalTaskTemplate;

class GoalTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data = [
            'goal_templates' => GoalTemplate::all(),
        ];

        return view('incubator::pages.goal_templates.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data = [
            'goal_task_templates' => GoalTaskTemplate::all(),
        ];
        return view('incubator::pages.goal_templates.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:goal_templates,name',
            'description' => 'required',
        ]);

        $store = GoalTemplate::create([
            'name' => $request->name,
            'description' => trim($request->description),
        ]);

        if ($request->goal_task_templates) {
            $store->goalTaskTemplates()->sync($request->goal_task_templates);
        }

        return redirect('/incubator/goal-templates')->with('success', 'Goal template has been successfully created.');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        $data = [
            'goal_template' => GoalTemplate::find($id),
            'goal_task_templates' => GoalTemplate::find($id)->goalTaskTemplates,
        ];

        return view('incubator::pages.goal_templates.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data = [
            'goal_template' => GoalTemplate::find($id),
            'goal_task_templates' => GoalTaskTemplate::all(),

        ];

        return view('incubator::pages.goal_templates.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|Renderable|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:goalTemplates,name',
            'description' => 'required',
        ]);

        $update = GoalTemplate::find($id);
        $update->name = $request->name;
        $update->description = trim($request->description);
        $update->save();


        if ($request->goal_task_templates) {
            $update->goalTaskTemplates()->sync($request->goal_task_templates);
        }

        return redirect('/incubator/goal-templates')->with('success', 'The goal template' . $update->name . ' has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $destroy = GoalTemplate::find($id);
        $destroy->goalTaskTemplates()->detach();
        $destroy->delete();

        return redirect('/incubator/goal-templates')->with('success', 'The goal template has been successfully deleted.');
    }
}
