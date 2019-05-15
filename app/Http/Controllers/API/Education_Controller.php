<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Children_detail_education;


class Education_Controller extends Controller
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
        $children_education = Children_detail_education::all();
        return response()->json([
            'children_education' => $children_education
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

        $this->validate($request, [
            'Tahun_Ajaran' => 'required|date',
            'Nama_Sekolah' => 'required|string|max:191',
            'Alamat_Sekolah' => 'required|string|max:191',
        ]);

        $children_education = new Children_detail_education();
        $children_education->id_children = $request->input("id_children");
        $children_education->Tahun_Ajaran = $request->input("Tahun_Ajaran");
        $children_education->Nama_Sekolah = $request->input("Nama_Sekolah");
        $children_education->Alamat_Sekolah = $request->input("Alamat_Sekolah");
        $children_education->save();
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
        $this->validate($request, [
            'Tahun_Ajaran' => 'required|date',
            'Nama_Sekolah' => 'required|string|max:191',
            'Alamat_Sekolah' => 'required|string|max:191',
        ]);
        $children_education = Children_detail_education::FindOrFail($id);
        $children_education->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $children_education = Children_detail_education::FindOrFail($id);
        $children_education->forceDelete();
    }
}
