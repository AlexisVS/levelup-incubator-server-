<?php

namespace Modules\Incubator\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Incubator\Entities\StartupNotifications;
use Modules\Incubator\Entities\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('incubator::pages.tasks.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('incubator::pages.tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @param $id id de la startup
     * @return Renderable
     */
    public function store($id, Request $request)
    {
        $store = new Task;
        $store->title = $request->title;
        $store->description = $request->description;
        $store->status = "undone";
        $store->startup_id = $id;

        $store->save();

        // add to notifications and save it
        $notification = new StartupNotifications([
            'viewed' => false,
            'startup_id' => $id,
        ]);
        $store->StartupNotifications()->save($notification);

        return redirect()->back();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('incubator::pages.tasks.show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $edit = Task::find($id);
        return view('incubator::pages.tasks.editTasks', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update($id, Request $request)
    {
        $update = Task::find($id);
        $update->title = $request->title;
        $update->description = $request->description;
        $update->save();

        return redirect('/incubator/startups/show/' . $update->startup_id);
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $destroy = Task::find($id);
        $destroy->delete();
        return redirect()->back();
    }
}
