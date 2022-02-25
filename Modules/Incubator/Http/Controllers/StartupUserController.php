<?php

namespace Modules\Incubator\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Modules\Incubator\Entities\Startup;
use Modules\Incubator\Entities\StartupUser;

class StartupUserController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data = [
            'startup_users' => StartupUser::all(),
        ];

        return view('incubator::pages.startup_user.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data = [
            'startups' => Startup::all(),
        ];

        return view('incubator::pages.startup_user.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'startup_id' => 'required',
        ]);

        StartupUser::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'startup_id' => $request->startup_id,
        ]);

        return redirect('/incubator/startups')->with('success', 'The user' . $request->email . ' has been successfully created.');
    }

    // /**
    //  * Show the specified resource.
    //  * @param int $id
    //  * @return Renderable
    //  */
    // public function show($id)
    // {
    //     $data = [
    //         'startup_user' => StartupUser::find($id),
    //     ];

    //     return view('incubator::pages.startup_user.show', $data);
    // }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $data = [
            'startup_user' => StartupUser::find($id),
        ];

        return view('incubator::pages.startup_user.edit', $data);
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
            'email' => 'required',
            'password' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
        ]);

        $update = StartupUser::find($id);
        $update->email = $request->email;
        $update->password = Hash::make($request->password);
        $update->first_name = $request->first_name;
        $update->last_name = $request->last_name;
        $update->save();

        return redirect('/incubator/startups/show/' . $update->id )->with('success', 'Your account' . $request->email . ' has been successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        StartupUser::destroy($id);

        return redirect()->back()->with('success', 'The startup user has been successfully destroyed.');
    }
}
