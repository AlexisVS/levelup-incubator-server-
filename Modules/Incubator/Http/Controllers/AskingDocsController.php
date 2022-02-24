<?php

namespace Modules\Incubator\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Incubator\Entities\AskingDocs;
use Modules\Incubator\Entities\Startup;
use Modules\Incubator\Entities\StartupNotifications;

class AskingDocsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('incubator::index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create($id)
    {
        $users = User::all();
        $startup = Startup::find($id);
        return view('incubator::pages.docs.asking_docs.askingDocs', compact('users', 'startup'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @param $id id de la startup
     * @return Renderable
     */
    public function store($id, Request $request)
    {
        $store = new AskingDocs;
        $store->startup_id = $id;
        $store->by_startup = false;
        $store->helper_user_id = $request->helper_user_id;
        $store->document_title = $request->document_title;
        $store->document_description = $request->document_description;
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
        return view('incubator::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('incubator::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $destroy=AskingDocs::find($id);
        $destroy->delete();
        return redirect()->back();
    }
}
