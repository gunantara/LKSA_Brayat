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
        $this->validate($request, [
            'Nama_lengkap' => 'required|string|max:191',
            'NIK' => 'required|numeric',
            'Jenis_Kelamin' => 'required|string|max:191',
            'Tempat_lahir' => 'required|string|max:191',
            'Tgl_lahir' => 'required|date',
            'Mulai_Bekerja' => 'required|date',
            'Jabatan' => 'required|string|max:191',
            'Status_Kepegawaian' => 'required|string|max:191',
            'Pendidikan_Terakhir' => 'required|string|max:191',
            'Pelatihan_yg_diikuti' => 'required|string|max:191'
        ]);

        $employee = new Employee();
        $employee->Nama_lengkap = $request->input("Nama_lengkap");
        $employee->NIK = $request->input("NIK");
        $employee->Jenis_Kelamin = $request->input("Jenis_Kelamin");
        $employee->Tempat_lahir = $request->input("Tempat_lahir");
        $employee->Tgl_lahir = $request->input("Tgl_lahir");
        $employee->Mulai_Bekerja = $request->input("Mulai_Bekerja");
        $employee->Jabatan = $request->input("Jabatan");
        $employee->Status_Kepegawaian = $request->input("Status_Kepegawaian");
        $employee->Pendidikan_Terakhir = $request->input("Pendidikan_Terakhir");
        $employee->Pelatihan_yg_diikuti = $request->input("Pelatihan_yg_diikuti");
        $employee->save();

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
        //delete the user
        $employee = Employee::FindOrFail($id);
        $employee->forceDelete();
        return ['message' => 'user deleted'];
    }
}
