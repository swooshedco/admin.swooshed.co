<?php

namespace App\Http\Controllers;

use App\BrandGroup;
use Illuminate\Http\Request;

class BrandGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brandgroups = BrandGroup::all();
        return view('brandgroups.index', ['title' => 'Brand Groups'])->with('brandgroups', $brandgroups);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brandgroups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $brandgroup = new BrandGroup;
        $brandgroup->id_brand = $request->bgIdbrand;
        $brandgroup->name = $request->bgName;
        $brandgroup->save();

        return redirect('/brandgroups');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BrandGroup  $brandGroup
     * @return \Illuminate\Http\Response
     */
    public function show(BrandGroup $brandGroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BrandGroup  $brandGroup
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brandgroup = BrandGroup::find($id);
        return view('brandgroups.edit', ['title' => 'Brand Group Edit'])->with('brandgroup', $brandgroup);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BrandGroup  $brandGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $brandgroup = BrandGroup::find($id);
        $brandgroup->id_brand = $request->bgIdbrand;
        $brandgroup->name = $request->bgName;

        $brandgroup->update();
        return redirect('/brandgroups');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BrandGroup  $brandGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brandgroup = BrandGroup::find($id);
        $brandgroup->delete();

        return redirect('/brandgroups');
    }
}
