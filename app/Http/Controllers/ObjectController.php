<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObjectModel;
use App\Models\User;
use App\Http\Requests\ObjectRequest;
use Illuminate\Support\Facades\Auth;
use DB;

class ObjectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;

        $userObject = User::join('object_models', 'object_models.user_id', '=', 'users.id')->
        join('attributes', 'attributes.object_id', '=', 'object_models.id')->
        where('isAdmin', 'normal')->
        get();

        $adminObjects = User::join('object_models', 'object_models.user_id', '=', 'users.id')->
        join('attributes', 'attributes.object_id', '=', 'object_models.id')->
        get();
      
        return view('object.index', compact('userObject', 'adminObjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('object.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:6',
        ]);
        $object = new ObjectModel();
        $object->user_id = Auth::id();
        $object->name = $request->name;
        $object->save();

        return redirect()->route('attribute.create')->with('success', 'Object saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('object.edit', ['obj' =>ObjectModel::findOrFail($id)]);
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
        $request->validate([
            'name' => 'required|min:6',
        ]);
        $object = ObjectModel::find($id);
        $object->user_id = Auth::id();
        $object->name = $request->name;
        $object->update();

        return redirect()->route('object.index')->with('success', 'Object updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}