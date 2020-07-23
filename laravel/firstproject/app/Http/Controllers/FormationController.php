<?php

namespace App\Http\Controllers;
use App\Formation;
use Illuminate\Http\Request;


use Illuminate\Http\UploadedFile;


use Illuminate\Support\Facades\Auth;

class FormationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->is_admin) {
            $listformation = Formation::all();
        }else{
            $listformation = Auth::user()->formations;
        }


        return view('admin.formation.index', ['formations'=> $listformation]);

    }
    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formation = new Formation();

        $formation->name = $request->get('title');
        $formation->price = $request->get('price');
        $formation->numberlessons = $request->get('numberlessons');
        $formation->description = $request->get('description');

        $formation->date_start = $request->get('date_start');
        $formation->date_end = $request->get('date_end');



        $formation->user_id = Auth::user()->id;
        $formation->photo = $request->photo->store('image');


        // $formation->image = $request->get('image');

        $formation->save();

        // session()-> flash('success', 'The formation was well registred !!');

        return Response()->json(['success' => true] );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.formation.show', ['id' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $formation = Formation::find($id);

        $this->authorize('update', $formation);

        return view('admin.formation.edit', compact('formation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $formation = Formation::find($id);

        $formation->name = $request->get('name');
        $formation->price = $request->get('price');
        $formation->numberlessons = $request->get('numberlessons');
        $formation->description = $request->get('description');


        $formation->date_start = date('Y/m/d', strtotime($request->get('date_start')));
        $formation->date_end = date('Y/m/d', strtotime($request->get('date_end')));

        if($request->photo){
            $formation->photo = $request->photo->store('photo');

        }


        $formation->save();

        return response()->json(array('success' => 'true'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function destroy(Request $request, $id)
    {
        $formation = Formation::find($id);
        $formation->delete();
        return response()->json(array('success' => 'true'));
    }
    // public function getExperiences(){

    //     $experiences = Experience::all();
    //     return $experiences;

    //     }




}
