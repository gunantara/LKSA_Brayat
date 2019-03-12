<?php

namespace App\Http\Controllers\API;

use App\Children;
use App\Children_Detail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class ChildrenController extends Controller
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
        $this->authorize('isAdmin');
        $children = DB::table('childrens')
            ->rightJoin('children__details', 'childrens.id', '=', 'children__details.id_children')
            ->select('childrens.*', 'children__details.*')
            ->where('childrens.deleted_at', null)
            ->where('children__details.deleted_at', null)
            ->orderBy('childrens.No_induk')
            ->get();
        return response()->json([
            'childrens' => $children
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

    public function edit_anak($id)
    {

        $children = DB::table('childrens')
            ->rightJoin('children__details', 'childrens.id', '=', 'children__details.id_children')
            ->select('childrens.*', 'children__details.*')
            ->where('childrens.deleted_at', null)
            ->where('children__details.deleted_at', null)
            ->where('childrens.id', '=', $id)
            ->orderBy('childrens.No_induk')
            ->get();

        return response()->json([
            'children' => $children
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $children = new Children();
        $children->id_user = $request->input("id_user");
        $children->No_induk = $request->input("No_induk");
        $children->Nama_Lengkap = $request->input("Nama_Lengkap");
        $children->Agama = $request->input("Agama");
        $children->Tempat_lahir = $request->input("Tempat_lahir");
        $children->Tgl_lahir = $request->input("Tgl_lahir");
        $children->Surat_Kelahiran_Akta = $request->input("Surat_Kelahiran_Akta");
        $children->Alamat = $request->input("Alamat");
        $children->Mulai_masuk_sekolah = $request->input("Mulai_masuk_sekolah");
        $children->Nama_sekolah = $request->input("Nama_sekolah");
        $children->Kelas = $request->input("Kelas");
        $children->Tgl_masuk_PA = $request->input("Tgl_masuk_PA");
        $children->Sebab_masuk_PA = $request->input("Sebab_masuk_PA");
        $children->Keterangan_anak = $request->input("Keterangan_anak");
        $children->Nama_Wali = $request->input("Nama_Wali");
        $children->Nomor_telp_wali = $request->input("Nomor_telp_wali");
        $currentPhoto = $children->Photo_anak;
        if ($request->Photo_anak != $currentPhoto) {
            $name = time() . '.' . explode('/', explode(':', substr($request->Photo_anak, 0, strpos($request->Photo_anak, ';')))[1])[1];
            \Image::make($request->Photo_anak)->save(public_path('img/photo_anak/') . $name);
            $request->merge(['Photo_anak' => $name]);
            $PhotoAnak = public_path('img/photo_anak/') . $currentPhoto;
            if (file_exists($PhotoAnak)) {
                @unlink($PhotoAnak);
            }
        }
        $children->Photo_anak = $request->input("Photo_anak");
        $children->save();

        $children_detail = new Children_Detail();
        $children_detail->id_children = $children->id;
        $children_detail->Nama_Ayah = $request->input("Nama_Ayah");
        $children_detail->Alamat_Ayah = $request->input("Alamat_Ayah");
        $children_detail->Agama_Ayah = $request->input("Agama_Ayah");
        $children_detail->Status_Ayah   = $request->input("Status_Ayah");
        $children_detail->Pendidikan_Ayah = $request->input("Pendidikan_Ayah");
        $children_detail->Pekerjaan_Ayah = $request->input("Pekerjaan_Ayah");
        $children_detail->Penghasilan_Ayah = $request->input("Penghasilan_Ayah");
        $children_detail->Nama_Ibu = $request->input("Nama_Ibu");
        $children_detail->Alamat_Ibu = $request->input("Alamat_Ibu");
        $children_detail->Agama_Ibu = $request->input("Agama_Ibu");
        $children_detail->Status_Ibu = $request->input("Status_Ibu");
        $children_detail->Pendidikan_Ibu = $request->input("Pendidikan_Ibu");
        $children_detail->Pekerjaan_Ibu = $request->input("Pekerjaan_Ibu");
        $children_detail->Penghasilan_Ibu = $request->input("Penghasilan_Ibu");
        $children_detail->Tanggungan = $request->input("Tanggungan");
        $children_detail->Perumahan = $request->input("Perumahan");
        $children_detail->Latar_Belakang_Permasalahan = $request->input("Latar_Belakang_Permasalahan");
        $children_detail->Alamat_yg_menitipkan = $request->input("Alamat_yg_menitipkan");
        $children_detail->Alasan_yg_menitipkan = $request->input("Alasan_yg_menitipkan");
        $children_detail->save();

        return ['message' => 'children created'];
    }

    public function update(Request $request, $id)
    {

        $children = Children::FindOrFail($id);
        $currentPhoto = $children->Photo_anak;
        if ($request->Photo_anak != $currentPhoto) {
            $name = time() . '.' . explode('/', explode(':', substr($request->Photo_anak, 0, strpos($request->Photo_anak, ';')))[1])[1];
            \Image::make($request->Photo_anak)->save(public_path('img/photo_anak/') . $name);

            $request->merge(['Photo_anak' => $name]);

            $PhotoAnak = public_path('img/photo_anak/') . $currentPhoto;
            if (file_exists($PhotoAnak)) {
                @unlink($PhotoAnak);
            }
        }
        $children->update($request->all());

        $children_detail = Children_Detail::FindOrFail($id);
        $children_detail->update($request->all());
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


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $children = Children::FindOrFail($id);
        //delete the children
        $children->delete();

        $children_detail = Children_Detail::FindOrFail($id);
        //delete the children
        $children_detail->delete();

        return ['message' => 'children has been deleted'];
    }
}
