<?php

namespace Modules\Incubator\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Incubator\Entities\AskHelp;
use Modules\Incubator\Entities\StartupNotifications;

class AskHelpController extends Controller
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
    public function create()
    {
        return view('incubator::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        // // add to notifications and save it
        // $notification = new StartupNotifications([
        //     'viewed' => false,
        // 'startup_id' => $startupId
        // ]);
        // $store->StartupNotifications()->save($notification);
        //
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
    public function update(Request $request, $startupId, $askHelpId)
    {
        $request->validate([
            'helper_user_id' => 'required'
        ]);

        $update = AskHelp::find($askHelpId);
        $update->helper_user_id = $request->helper_user_id;
        $update->save();

        return redirect('/incubator/startups/show/' . $startupId)->with('success', 'Help has been successfully updated.');
    }

    /**
     * Delete the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function helpDone(Request $request, $startupId, $askHelpId)
    {
        AskHelp::destroy($askHelpId);

        return redirect('/incubator/startups/show/' . $startupId)->with('success', 'Helping has been successfully done.');
    }
}
