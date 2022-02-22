<?php

namespace Modules\Incubator\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Modules\Incubator\Entities\AskingDocs;
use Modules\Incubator\Entities\Document;
use Modules\Incubator\Entities\Startup;

class DocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Renderable
     */

    public function index($id)
    {
        $startup=Startup::find($id);

        $askedStartupDocs=AskingDocs::where('startup_id',$id)->get();

        $documents=Document::where('startup_id',$id)->get();
        // dd($documents);
        return view('incubator::pages.docs.docs',compact('startup','askedStartupDocs','documents'));
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
    public function store($id,Request $request)
    {
        $request->validate([
            'filepath'=>'required',
        ]);

        $startup=Startup::where('id',$id)->get();
        $startupName=$startup[0]->name;
        $folderName=str_replace(' ', '_', $startupName);

        // $this->dosName=$folderName;

        $store= new Document;
        $store->name= $request->name;
        // $request->file('filepath')->storePublicly('img/','public/modules/incubator/'.$folderName);

        $store->filepath=$request->file('filepath')->hashName();
        $store->startup_id=$id;


        Storage::disk('public')->put('modules/incubator/' . $folderName, $request->file('filepath'));
        $store->save();
        
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
        //
    }

    public function download($startupId,$docId){
        // dd($docId);
        $startup=Startup::where('id',$startupId)->get();
        $startupName=$startup[0]->name;
        $folderName=str_replace(' ', '_', $startupName);

        $download= Document::find($docId);
        return Storage::disk('public')->download('modules/incubator/'.$folderName.'/'.$download->filepath);
    }

    // protected function getFolderName () 
}
