<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Detail_galeries;

class Detail_Gallery extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Photos = DB::table('detail_galeries')
            ->select('detail_galeries.*')
            ->get();
        return response()->json([
            'detail_galeri' => $Photos
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail_galery($id)
    {
        $getPhotos = DB::table('detail_galeries')
            ->select('detail_galeries.*')
            ->where('detail_galeries.id_galeries', '=', $id)
            ->get();
        $countPhotos = DB::table('detail_galeries')
            ->select('detail_galeries.*')
            ->where('detail_galeries.id_galeries', '=', $id)
            ->count();
        return response()->json([
            'list_photos' => $getPhotos,
            'jumlah_photos' => $countPhotos
        ], 200);
    }
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

        $detail_galeri = new Detail_galeries();
        $detail_galeri->id_galeries = $request->input("id_galeries");
        $currentPhoto = $detail_galeri->Photo;
        if ($request->Photo != $currentPhoto) {
            $name = time() . '.' . explode('/', explode(':', substr($request->Photo, 0, strpos($request->Photo, ';')))[1])[1];
            \Image::make($request->Photo)->save(public_path('img/galeri/') . $name);
            $request->merge(['Photo' => $name]);
            $PhotoGaleri = public_path('img/galeri/') . $currentPhoto;
            if (file_exists($PhotoGaleri)) {
                @unlink($PhotoGaleri);
            }
        }
        $detail_galeri->Photo = $request->input("Photo");
        $detail_galeri->save();

        return ['message' => 'photos created'];
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detail_galeri = Detail_galeries::FindOrFail($id);
        //delete the user
        $detail_galeri->forceDelete();
        return ['message' => 'photo deleted'];
    }
}
