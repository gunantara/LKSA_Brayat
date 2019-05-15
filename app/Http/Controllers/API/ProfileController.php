<?php

namespace App\Http\Controllers\API;

use App\About;
use App\profile;
use App\profile_kegiatan;
use App\Program;
use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $about = DB::table('users')
            ->join('abouts', 'users.id', '=', 'abouts.id_user')
            ->join('contacts', 'users.id', '=', 'contacts.id_user')
            ->join('profiles', 'abouts.id', '=', 'profiles.id_about')
            ->join('profile_kegiatans', 'abouts.id', '=', 'profile_kegiatans.id_about')
            ->select('abouts.*', 'profiles.*', 'profile_kegiatans.*', 'contacts.*')
            ->get();
        return response()->json([
            'about' => $about,
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
        //
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
            'Logo_LKSA' => 'required|string',
            'Photo_about' => 'required|string',
            'Photo_profiles' => 'required|string',
            'Photo_kegiatan' => 'required|string',
            'Nama_LKSA' => 'required|string|max:191',
            'Quote' => 'required|string',
            'Profile' => 'required|string',
            'Profile_kegiatan' => 'required|string',
        ]);

        $about = About::FindOrFail($id);
        //For change Logo
        $currentLogo = $about->Logo_LKSA;
        if ($request->Logo_LKSA != $currentLogo) {
            $name = time() . '.' . explode('/', explode(':', substr($request->Logo_LKSA, 0, strpos($request->Logo_LKSA, ';')))[1])[1];
            \Image::make($request->Logo_LKSA)->save(public_path('img/profile_lksa/') . $name);

            $request->merge(['Logo_LKSA' => $name]);

            $Logo_LKSA = public_path('img/profile_lksa/') . $currentLogo;
            if (file_exists($Logo_LKSA)) {
                @unlink($Logo_LKSA);
            }
        }
        //For change Photo About
        $currentAbout = $about->Photo_about;
        if ($request->Photo_about != $currentAbout) {
            $name = time() . '.' . explode('/', explode(':', substr($request->Photo_about, 0, strpos($request->Photo_about, ';')))[1])[1];
            \Image::make($request->Photo_about)->save(public_path('img/profile_lksa/') . $name);

            $request->merge(['Photo_about' => $name]);

            $Photo_about = public_path('img/profile_lksa/') . $currentAbout;
            if (file_exists($Photo_about)) {
                @unlink($Photo_about);
            }
        }
        $about->update($request->all());
        //end update Profile About


        $profile = profile::FindOrFail($id);
        //For change Photo Sumber Dana
        $currentPhotoSumber = $profile->Photo_profiles;
        if ($request->Photo_profiles != $currentPhotoSumber) {
            $name = time() . '.' . explode('/', explode(':', substr($request->Photo_profiles, 0, strpos($request->Photo_profiles, ';')))[1])[1];
            \Image::make($request->Photo_profiles)->save(public_path('img/profile_lksa/') . $name);

            $request->merge(['Photo_profiles' => $name]);

            $Photo_profiles = public_path('img/profile_lksa/') . $currentPhotoSumber;
            if (file_exists($Photo_profiles)) {
                @unlink($Photo_profiles);
            }
        }
        $profile->update($request->all());
        //end update Profile Sumber Dana

        $profile_kegiatan = profile_kegiatan::FindOrFail($id);
        //For change Photo Kegiatan
        $currentPhotoKegiatan = $profile_kegiatan->Photo_kegiatan;
        if ($request->Photo_kegiatan != $currentPhotoKegiatan) {
            $name = time() . '.' . explode('/', explode(':', substr($request->Photo_kegiatan, 0, strpos($request->Photo_kegiatan, ';')))[1])[1];
            \Image::make($request->Photo_kegiatan)->save(public_path('img/profile_lksa/') . $name);

            $request->merge(['Photo_kegiatan' => $name]);

            $Photo_kegiatan = public_path('img/profile_lksa/') . $currentPhotoKegiatan;
            if (file_exists($Photo_kegiatan)) {
                @unlink($Photo_kegiatan);
            }
        }
        $profile_kegiatan->update($request->all());
        //end update Profile Kegiatan

        $this->validate($request, [
            'email' => 'required|string',
            'Telp' => 'required|numeric',
            'Alamat' => 'required|string',
            'No_Rekening' => 'required|string',
        ]);

        $contact = Contact::FindOrFail($id);
        $contact->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
