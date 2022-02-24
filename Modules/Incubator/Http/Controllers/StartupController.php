<?php

namespace Modules\Incubator\Http\Controllers;

use App\Models\User;
use File;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File as FacadesFile;
use Modules\Incubator\Entities\Startup;
use Modules\Incubator\Entities\StartupUser;
use Modules\Incubator\Entities\Task;

class StartupController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $startups = Startup::all();
        return view('incubator::pages.startups.startups', compact('startups'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('incubator::pages.startups.createStartups');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50|unique:startups,name',
            'description' => 'required|max:500',
        ]);

        $store = new Startup;
        $store->name = $request->name;
        $store->description = $request->description;

        //On remplace les espaces présents dans le nom de la startup par des _
        $replace = str_replace(' ', '_', $request->name);

        //Créer le dossier seulement s'il n'existe pas déja
        if (!FacadesFile::isDirectory('modules/incubator/' . $replace)) {


            //Création du dossier avec le nom de la startup
            FacadesFile::makeDirectory('modules/incubator/' . $replace);
        }
        $store->save();


        $startups = Startup::all();

        return view('incubator::pages.startups.startups', compact('startups'));
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        // $show=Startup::find($id);
        $molengeekUsers = User::all();
        $users = StartupUser::where('startup_id', $id)->get();
        // dd($users);
        $tasks = Task::where('startup_id', $id)->get();
        $startup = Startup::find($id);
        return view('incubator::pages.startups.showStartups', compact('users', 'tasks', 'startup', 'molengeekUsers'));
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $edit = Startup::find($id);
        return view('incubator::pages.startups.editStartups', compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|max:50|unique:startups,name',
            'description' => 'required|max:500',
        ]);

        $update = Startup::find($id);
        $update->name = $request->name;
        $update->description = $request->description;
        $update->save();

        $startups = Startup::all();

        return view('incubator::pages.startups.startups', compact('startups'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //Supression de la Startup et des Users liés à celle-ci
        $destroy = Startup::find($id);
        $users = $destroy->startupUsers;
        StartupUser::destroy($users);
        $destroy->delete();
        return redirect()->back();
    }
}
