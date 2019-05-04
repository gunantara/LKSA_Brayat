<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Inventory;

class inventorie_Controller extends Controller
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
        $inventorie = Inventory::all();
        return response()->json([
            'inventorie' => $inventorie
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
        $inven = new Inventory();
        $inven->id_user = $request->input("id_user");
        $inven->Nama_Fasilitas = $request->input("Nama_Fasilitas");
        $inven->Jumlah = $request->input("Jumlah");
        $inven->Bantuan = $request->input("Bantuan");
        $inven->Manfaat = $request->input("Manfaat");
        $inven->Kepemilikan = $request->input("Kepemilikan");
        $inven->Kondisi = $request->input("Kondisi");
        $inven->save();
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
        $inven = Inventory::FindOrFail($id);
        $inven->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inven = Inventory::FindOrFail($id);
        $inven->forceDelete();
    }
}
