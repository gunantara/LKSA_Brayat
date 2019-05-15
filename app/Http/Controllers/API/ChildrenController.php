<?php

namespace App\Http\Controllers\API;

use App\Children;
use App\Children_Detail;
use App\Children_detail_health;
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
        if (\Gate::allows('isAdmin') || \Gate::allows('isUser') || \Gate::allows('isKepala')) {

            /** untuk data anak di dalam panti */
            $children = DB::table('childrens')
                ->join('children__details', 'childrens.id', '=', 'children__details.id_children')
                ->join('children_detail_healths', 'childrens.id', '=', 'children_detail_healths.id_children')
                ->select('childrens.*', 'children__details.*', 'children_detail_healths.*')
                ->where('childrens.Keterangan_anak', '=', 'Panti')
                ->where('childrens.deleted_at', null)
                ->where('children__details.deleted_at', null)
                ->where('children_detail_healths.deleted_at', null)
                ->orderBy('childrens.No_induk')
                ->paginate(5);
            $countChildren = DB::table('childrens')
                ->join('children__details', 'childrens.id', '=', 'children__details.id_children')
                ->join('children_detail_healths', 'childrens.id', '=', 'children_detail_healths.id_children')
                ->select('childrens.*', 'children__details.*', 'children_detail_healths.*')
                ->where('childrens.Keterangan_anak', '=', 'Panti')
                ->where('childrens.deleted_at', null)
                ->where('children__details.deleted_at', null)
                ->where('children_detail_healths.deleted_at', null)
                ->orderBy('childrens.No_induk')
                ->count();

            /** untuk data anak diluar panti */
            $childrennon = DB::table('childrens')
                ->join('children__details', 'childrens.id', '=', 'children__details.id_children')
                ->join('children_detail_healths', 'childrens.id', '=', 'children_detail_healths.id_children')
                ->select('childrens.*', 'children__details.*', 'children_detail_healths.*')
                ->where('childrens.Keterangan_anak', '=', 'Non-Panti')
                ->where('childrens.deleted_at', null)
                ->where('children__details.deleted_at', null)
                ->where('children_detail_healths.deleted_at', null)
                ->orderBy('childrens.No_induk')
                ->paginate(5);
            $countChildrennon = DB::table('childrens')
                ->join('children__details', 'childrens.id', '=', 'children__details.id_children')
                ->join('children_detail_healths', 'childrens.id', '=', 'children_detail_healths.id_children')
                ->select('childrens.*', 'children__details.*', 'children_detail_healths.*')
                ->where('childrens.Keterangan_anak', '=', 'Non-Panti')
                ->where('childrens.deleted_at', null)
                ->where('children__details.deleted_at', null)
                ->where('children_detail_healths.deleted_at', null)
                ->orderBy('childrens.No_induk')
                ->count();

            /** Untuk data anak yang sudah keluar panti atau data arsip anak */
            $childrenOut = DB::table('childrens')
                ->rightJoin('children__details', 'childrens.id', '=', 'children__details.id_children')
                ->select('childrens.*', 'children__details.*')
                ->whereNotNull('childrens.deleted_at')
                ->whereNotNull('children__details.deleted_at')
                ->orderBy('childrens.No_induk')
                ->get();
            $countchildrenOut = DB::table('childrens')
                ->rightJoin('children__details', 'childrens.id', '=', 'children__details.id_children')
                ->select('childrens.*', 'children__details.*')
                ->whereNotNull('childrens.deleted_at')
                ->whereNotNull('children__details.deleted_at')
                ->orderBy('childrens.No_induk')
                ->count();

            return response()->json([
                'childrens' => $children,
                'countChildren' => $countChildren,
                'childrennon' => $childrennon,
                'countChildrennon' => $countChildrennon,
                'childrenOut' => $childrenOut,
                'countChildrenOut' => $countchildrenOut,
            ], 200);
        }
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
        if (\Gate::allows('isAdmin') || \Gate::allows('isUser') || \Gate::allows('isKepala')) {

            $children = DB::table('childrens')
                ->join('children__details', 'childrens.id', '=', 'children__details.id_children')
                ->join('children_detail_healths', 'childrens.id', '=', 'children_detail_healths.id_children')
                ->select('childrens.*', 'children__details.*', 'children_detail_healths.*')
                ->where('childrens.deleted_at', null)
                ->where('children__details.deleted_at', null)
                ->where('children_detail_healths.deleted_at', null)
                ->where('childrens.id', '=', $id)
                ->orderBy('childrens.No_induk')
                ->get();

            $children_detail_educations = DB::table('children_detail_educations')
                ->select('children_detail_educations.*')
                ->where('children_detail_educations.id_children', '=', $id)
                ->get();

            $children_detail_document = DB::table('children_detail_documents')
                ->select('children_detail_documents.*')
                ->where('children_detail_documents.id_children', '=', $id)
                ->get();

            $children_detail_other_families = DB::table('children__other__families')
                ->select('children__other__families.*')
                ->where('children__other__families.id_children', '=', $id)
                ->get();

            $childrenOut = DB::table('childrens')
                ->join('children__details', 'childrens.id', '=', 'children__details.id_children')
                ->join('children_detail_healths', 'childrens.id', '=', 'children_detail_healths.id_children')
                ->select('childrens.*', 'children__details.*', 'children_detail_healths.*')
                ->whereNotNull('childrens.deleted_at')
                ->where('childrens.id', '=', $id)
                ->orderBy('childrens.No_induk')
                ->get();

            return response()->json([
                'children' => $children,
                'children_education' => $children_detail_educations,
                'children_detail_other_families' => $children_detail_other_families,
                'children_detail_document' => $children_detail_document,
                'childrenOut' => $childrenOut,
            ], 200);
        }
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
            'No_induk' => 'required|numeric|unique:childrens,No_induk',
            'Nama_Lengkap' => 'required|string|max:191',
            'Agama' => 'required|string|max:191',
            'Tempat_lahir' => 'required|string|max:191',
            'Tgl_lahir' => 'required|string|max:191',
            'Surat_Kelahiran_Akta' => 'required|string|max:191',
            'Alamat' => 'required|string|max:191',
            'Mulai_masuk_sekolah' => 'required|string|max:191',
            'Nama_sekolah' => 'required|string|max:191',
            'Kelas' => 'required|string|max:191',
            'Tgl_masuk_PA' => 'required|string|max:191',
            'Sebab_masuk_PA' => 'required|string|max:191',
            'Keterangan_anak' => 'required|string|max:191',
            'Nama_Wali' => 'required|string|max:191',
            'Nomor_telp_wali' => 'required|string|max:191',
            'Photo_anak' => 'required',
            'Alamat_yg_menitipkan' => 'required',
            'Alasan_yg_menitipkan' => 'required',
        ]);

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

        $children_biodata = new Children_detail_health();
        $children_biodata->id_children = $children->id;
        $children_biodata->Tinggi_Badan = $request->input("Tinggi_Badan");
        $children_biodata->Berat_Badan = $request->input("Berat_Badan");
        $children_biodata->Golongan_Darah = $request->input("Golongan_Darah");
        $children_biodata->Alergi_Makanan = $request->input("Alergi_Makanan");
        $children_biodata->Alergi_Minuman = $request->input("Alergi_Minuman");
        $children_biodata->Alergi_Obat = $request->input("Alergi_Obat");
        $children_biodata->save();

        return ['message' => 'children created'];
    }

    public function update(Request $request, $id)
    {
        $children = Children::FindOrFail($id);

        $this->validate($request, [
            'No_induk' => 'required|numeric|unique:childrens,No_induk,' . $children->id,
            'Nama_Lengkap' => 'required|string|max:191',
            'Agama' => 'required|string|max:191',
            'Tempat_lahir' => 'required|string|max:191',
            'Tgl_lahir' => 'required|string|max:191',
            'Surat_Kelahiran_Akta' => 'required|string|max:191',
            'Alamat' => 'required|string|max:191',
            'Mulai_masuk_sekolah' => 'required|string|max:191',
            'Nama_sekolah' => 'required|string|max:191',
            'Kelas' => 'required|string|max:191',
            'Tgl_masuk_PA' => 'required|string|max:191',
            'Keterangan_anak' => 'required|string|max:191',
            'Nama_Wali' => 'required|string|max:191',
            'Nomor_telp_wali' => 'required|string|max:191',
            'Photo_anak' => 'required',
            'Alamat_yg_menitipkan' => 'required',
            'Alasan_yg_menitipkan' => 'required',
        ]);

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

        $children_biodata = Children_detail_health::FindOrFail($id);
        $children_biodata->update($request->all());
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

        $children_biodata = Children_detail_health::FindOrFail($id);
        //delete the children
        $children_biodata->delete();

        return ['message' => 'children has been deleted'];
    }

    public function search()
    {
        if ($search = \Request::get('q')) {
            $children = Children::where(function ($query) use ($search) {
                $query->where('Keterangan_anak', 'Panti')
                    ->where('Nama_Lengkap', 'LIKE', "%$search%");
            })->paginate(5);
        } else {
            $children = DB::table('childrens')
                ->select('childrens.*')
                ->where('Keterangan_anak', '=', 'Panti')
                ->where('deleted_at', null)
                ->orderBy('No_induk')
                ->paginate(5);
        }
        return $children;
    }

    public function searchNon()
    {
        if ($search = \Request::get('q')) {
            $children = Children::where(function ($query) use ($search) {
                $query->where('Keterangan_anak', 'Non-Panti')
                    ->where('Nama_Lengkap', 'LIKE', "%$search%");
            })->paginate(5);
        } else {
            $children = DB::table('childrens')
                ->select('childrens.*')
                ->where('Keterangan_anak', '=', 'Non-Panti')
                ->where('deleted_at', null)
                ->orderBy('No_induk')
                ->paginate(5);
        }
        return $children;
    }
}
