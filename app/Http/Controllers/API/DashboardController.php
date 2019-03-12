<?php

namespace App\Http\Controllers\API;

use App\User;
use App\Employee;
use App\Children;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function banyak_User()
    {
        $this->authorize('isAdmin');
        $banyak_user = DB::table('users')
            ->where('users.deleted_at', null)
            ->where('id', '>', 0)
            ->count();
        return response()->json([
            'jumlah_users' => $banyak_user
        ], 200);
    }

    public function banyak_karyawan()
    {
        $this->authorize('isAdmin');
        $banyak_karyawan = DB::table('employees')
            ->where('employees.deleted_at', null)
            ->count();
        return response()->json([
            'jumlah_employees' => $banyak_karyawan
        ], 200);
    }

    public function banyak_anak()
    {
        $this->authorize('isAdmin');
        $banyak_anak = DB::table('childrens')
            ->where('childrens.deleted_at', null)
            ->count();
        return response()->json([
            'jumlah_childrens' => $banyak_anak
        ], 200);
    }
}
