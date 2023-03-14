<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Peserta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $petugas = count(User::where('role', 'petugas')->get());
        $event = count(Event::all());
        $peserta = count(Peserta::all());
        return view('home.index', compact('petugas', 'event', 'peserta'));
    }

    public function profile()
    {
        return view('home.profile');
    }

    public function setPassword(Request $request)
    {
        // dd($request);
        // dd($data->password . ' ' . Hash::make($request->old));
        if ($request->new == $request->old) {
            $data = User::find(Auth::user()->id);
            $data->password = Hash::make($request->new);
            $data->update();
            toast('Berhasil mengganti password', 'success');
        } else {
            toast('Password tidak cocok', 'error');
        }
        return redirect()->back();
    }

    public function setProfile(Request $request)
    {
        // dd($request);
        $data = User::find(Auth::user()->id);
        $data->email = $request->email;
        $data->name = $request->nama;
        $data->telp = $request->telpon;
        $data->update();
        if ($data) {
            toast('Berhasil mengubah data!', 'success');
        } else {
            toast('Berhasil mengubah data!', 'success');
        }
        return redirect()->back();
    }

    public function setGambar(Request $request)
    {
        if ($request->hasFile('gambar')) {
            $uploadPath = public_path('uploads/img');
            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true, true);
            }

            $file = $request->file('gambar');
            $extension = $file->getClientOriginalExtension();
            $rename = 'img' . date('dmYHis') . '.' . $extension;

            if ($file->move($uploadPath, $rename)) {
                $data = User::find(Auth::user()->id);
                $data->profile = $rename;
                $data->update();
                toast('Berhasil mengganti foto profil', 'success');
            }
        } else {
            toast('Silahkan inputkan file', 'error');
        }
        return redirect()->back();
    }
}
