<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Employee;
use App\Children;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function banyak_User()
    {
        if (\Gate::allows('isAdmin') || \Gate::allows('isUser')) {
            $banyak_user = DB::table('users')
                ->where('users.deleted_at', null)
                ->where('id', '>', 0)
                ->count();
            return response()->json([
                'jumlah_users' => $banyak_user
            ], 200);
        }
    }

    public function banyak_karyawan()
    {
        if (\Gate::allows('isAdmin') || \Gate::allows('isUser')) {

            $banyak_karyawan = DB::table('employees')
                ->where('employees.deleted_at', null)
                ->count();
            return response()->json([
                'jumlah_employees' => $banyak_karyawan
            ], 200);
        }
    }

    public function banyak_anak()
    {
        if (\Gate::allows('isAdmin') || \Gate::allows('isUser')) {

            $banyak_anak = DB::table('childrens')
                ->where('deleted_at', null)
                ->count();
            return response()->json([
                'jumlah_childrens' => $banyak_anak
            ], 200);
        }
    }

    public function banyak_inventaris()
    {
        if (\Gate::allows('isAdmin') || \Gate::allows('isUser')) {

            $banyak_inventaris = DB::table('inventories')
                ->where('inventories.deleted_at', null)
                ->count();
            return response()->json([
                'jumlah_inventories' => $banyak_inventaris
            ], 200);
        }
    }

    public function tampil_umur()
    {
        if (\Gate::allows('isAdmin') || \Gate::allows('isUser') || \Gate::allows('isKepala')) {

            $tampil_umur = DB::table('childrens')
                ->select(
                    DB::raw('(CASE 
                    WHEN floor(DATEDIFF(CURDATE(),Tgl_lahir) /365) <= 5 THEN "< 5 Tahun" 
                    WHEN floor(DATEDIFF(CURDATE(),Tgl_lahir) /365) BETWEEN 5 AND 11 THEN "6-10 Tahun" 
                    WHEN floor(DATEDIFF(CURDATE(),Tgl_lahir) /365) BETWEEN 10 AND 16 THEN "11-15 Tahun"
                    WHEN floor(DATEDIFF(CURDATE(),Tgl_lahir) /365) BETWEEN 15 AND 21 THEN "16-20 Tahun"
                    WHEN floor(DATEDIFF(CURDATE(),Tgl_lahir) /365) BETWEEN 20 AND 26 THEN "21-25 tahun"
                    END) as umur'),
                    DB::raw('count(*) as jumlah')
                )
                ->where('deleted_at', '=', null)
                ->orderBy('Tgl_lahir', 'DESC')
                ->groupBy('umur')
                ->get();

            return response()->json([
                'tampil_umur' => $tampil_umur
            ], 200);
        }
    }

    public function tampil_inventaris()
    {
        if (\Gate::allows('isAdmin') || \Gate::allows('isUser') || \Gate::allows('isKepala')) {

            $tampil_inventaris = DB::table('inventories')
                ->select(
                    DB::raw('(CASE 
                    WHEN Kondisi <= 25 THEN "<= 25%" 
                    WHEN Kondisi BETWEEN 25 AND 55 THEN "26% - 54%" 
                    WHEN Kondisi BETWEEN 54 AND 75 THEN "55 - 74%"
                    WHEN Kondisi BETWEEN 74 AND 100 THEN "75 - 100%"
                    END) as Kondisi'),
                    DB::raw('count(*) as jumlah')
                )
                ->where('deleted_at', '=', null)
                ->orderBy('id', 'ASC')
                ->groupBy('Kondisi')
                ->get();

            return response()->json([
                'kondisi_inventaris' => $tampil_inventaris
            ], 200);
        }
    }

    public function tampil_anak()
    {
        if (\Gate::allows('isAdmin') || \Gate::allows('isUser') || \Gate::allows('isKepala')) {

            $anak_panti_pertahun = Children::select(DB::raw('year(Tgl_masuk_PA) as year'), DB::raw('COUNT(id) as count'))
                ->where('deleted_at', '=', null)
                ->orderBy('Tgl_masuk_PA', 'ASC')
                ->groupBy(DB::raw('year(Tgl_masuk_PA)'))
                ->get()->toArray();
            return response()->json([
                'anak_panti' => $anak_panti_pertahun,

            ], 200);
        }
    }
}
