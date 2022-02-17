<?php

namespace Modules\Incubator\Http\Controllers;
use File;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File as FacadesFile;
use Modules\Incubator\Entities\Startup;

class StartupController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $startups=Startup::all();
        return view('incubator::pages.startups',compact('startups'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('incubator::pages.createStartups');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:500',
        ]);

        $store= new Startup;
        $store->name=$request->name;
        $store->description=$request->description;

        //Créer le dossier seulement s'il n'existe pas déja
        if(!FacadesFile::isDirectory('modules/incubator/'.$request->name)){
        
        //Création du dossier avec le nom de la startup
        FacadesFile::makeDirectory('modules/incubator/'.$request->name);
        }
        $store->save();


        $startups=Startup::all();

        return view('incubator::pages.startups',compact('startups'));
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
        $edit=Startup::find($id);
        return view('incubator::pages.editStartups',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update($id,Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'description' => 'required|max:500',
        ]);

        $update= Startup::find($id);
        $update->name=$request->name;
        $update->description=$request->description;
        $update->save();

        $startups=Startup::all();

        return view('incubator::pages.startups',compact('startups'));
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $destroy= Startup::find($id);
        $destroy->delete();
        
        return redirect()->back();
    }
}
