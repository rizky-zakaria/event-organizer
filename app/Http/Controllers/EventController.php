<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Gambar;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PDO;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Event::orderBy('waktu', 'desc')->get();
        return view('event.index', compact('data'));
    }

    public function on($id)
    {
        $cek = Event::where('status', 'aktif')->first();
        if (isset($cek->nama)) {
            toast('Silahkan matikan event lain yang sedang aktif', 'error');
        } else {
            $data = Event::find($id);
            $data->status = 'aktif';
            $data->update();
            toast('Event Aktif!', 'success');
        }
        return redirect()->back();
    }

    public function off($id)
    {

        $data = Event::find($id);
        $data->status = 'non-aktif';
        $data->update();
        toast('Event Non-Aktif!', 'success');
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kat = Kategori::all();
        $user = User::where('role', 'petugas')->get();
        return view('event.create', compact('kat', 'user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'logo' => 'required',
            'banner' => 'required',
            'kategori' => 'required',
            'nama' => 'required',
            'penyelenggara' => 'required',
            'hari' => 'required',
            'jam' => 'required',
            'desa' => 'required',
            'kecamatan' => 'required',
            'kota' => 'required',
            'provinsi' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'tempat' => 'required'
        ]);

        $uploadPath = public_path('uploads/img');
        if (!File::isDirectory($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true, true);
        }

        $logo = $request->file('logo');
        $extension_logo = $logo->getClientOriginalExtension();
        $rename_logo = 'LOGO' . date('dmYHis') . '.' . $extension_logo;

        $banner = $request->file('banner');
        $extension_banner = $banner->getClientOriginalExtension();
        $rename_banner = 'BANNER' . date('dmYHis') . '.' . $extension_banner;

        $logo->move($uploadPath, $rename_logo);
        $banner->move($uploadPath, $rename_banner);

        $img_logo = new Gambar;
        $img_logo->gambar = $rename_logo;
        $img_logo->status = 'non-aktif';
        $img_logo->save();

        $img_banner = new Gambar;
        $img_banner->gambar = $rename_banner;
        $img_banner->status = 'non-aktif';
        $img_banner->save();

        $post = Event::create([
            'nama' => $request->nama,
            'penyelenggara' => $request->penyelenggara,
            'banner' => $rename_banner,
            'logo' => $rename_logo,
            'waktu' => $request->hari . ' ' . $request->jam,
            'desa' => $request->desa,
            'kecamatan' => $request->kecamatan,
            'kota' => $request->kota,
            'provinsi' => $request->provinsi,
            'longitude' => $request->longitude,
            'latitude' => $request->latitude,
            'kategori' => $request->kategori,
            'tempat' => $request->tempat,
            'petugas_id' => $request->petugas
        ]);

        if ($post) {
            toast('Berhasil menambahkan data!', 'success');
        } else {
            toast('Gagal menambahkan data!', 'error');
        }
        return redirect()->back();
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
        //
    }
}
