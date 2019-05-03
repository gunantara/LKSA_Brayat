<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Children_Other_Family;

class Other_Family__Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $children_fam = Children_Other_Family::all();
        return response()->json([
            'children_family' => $children_fam
        ], 200);
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

        $children_fam = new Children_Other_Family();
        $children_fam->id_children = $request->input("id_children");
        $children_fam->Nama = $request->input("Nama");
        $children_fam->Tempat_lahir = $request->input("Tempat_lahir");
        $children_fam->Tgl_lahir = $request->input("Tgl_lahir");
        $children_fam->Sekolah = $request->input("Sekolah");
        $children_fam->Kelas = $request->input("Kelas");
        $children_fam->Keterangan = $request->input("Keterangan");
        $children_fam->save();
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
        //
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
        $children_fam = Children_Other_Family::FindOrFail($id);
        $children_fam->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $children_fam = Children_Other_Family::FindOrFail($id);
        $children_fam->forceDelete();
    }
}
