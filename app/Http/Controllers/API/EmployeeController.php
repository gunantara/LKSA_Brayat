<?php

namespace App\Http\Controllers\API;

use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
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
        $employee = Employee::all();
        return response()->json([
            'employees' => $employee
        ], 200);

        //return $users = DB::table('employees')->get();
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
        return Employee::create([
            'Nama_lengkap' => $request['Nama_lengkap'],
            'NIK' => $request['NIK'],
            'Jenis_Kelamin' => $request['Jenis_Kelamin'],
            'Tempat_lahir' => $request['Tempat_lahir'],
            'Tgl_lahir' => $request['Tgl_lahir'],
            'Mulai_Bekerja' => $request['Mulai_Bekerja'],
            'Jabatan' => $request['Jabatan'],
            'Status_Kepegawaian' => $request['Status_Kepegawaian'],
            'Pendidikan_Terakhir' => $request['Pendidikan_Terakhir'],
            'Pelatihan_yg_diikuti' => $request['Pelatihan_yg_diikuti'],
        ]);
        return ['message' => 'employee created'];
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
        $employee = Employee::FindOrFail($id);
        $employee->update($request->all());
        return ['message' => 'employee updated'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $employee = Employee::FindOrFail($id);
        //delete the user
        $employee->delete();
        return ['message' => 'user deleted'];
    }
}
