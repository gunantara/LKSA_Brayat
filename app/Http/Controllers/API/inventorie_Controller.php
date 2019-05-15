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
        $inventorie = Inventory::paginate(5);
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
        $this->validate($request, [
            'Nama_Fasilitas' => 'required|string|max:191',
            'Jumlah' => 'required|string|max:191',
            'Bantuan' => 'required|string|max:191',
            'Manfaat' => 'required|string|max:191',
            'Kepemilikan' => 'required|string|max:191',
            'Kondisi' => 'required|string|max:191',
        ]);

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
        $this->validate($request, [
            'Nama_Fasilitas' => 'required|string|max:191',
            'Jumlah' => 'required|numeric|max:191',
            'Bantuan' => 'required|string|max:191',
            'Manfaat' => 'required|string|max:191',
            'Kepemilikan' => 'required|string|max:191',
            'Kondisi' => 'required|numeric|max:191',
        ]);

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
