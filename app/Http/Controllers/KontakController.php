<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Kontak::orderBy('created_at', 'desc')->get();
        return view('kontak.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kontak.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = Kontak::create([
            'wa' => $request->wa,
            'telpon' => $request->telp,
            'email' => $request->email,
            'facebook' => $request->fb,
            'twiter' => $request->tweeter,
            'instagram' => $request->ig,
            'telegram' => $request->tg,
            'status' => 'non-aktif'
        ]);

        if ($data) {
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

    public function on($id)
    {
        $data = Kontak::find($id);
        $data->status = 'aktif';
        $data->update();
        if ($data) {
            toast('Berhasil mengaktifkan data!', 'success');
        } else {
            toast('Gagal mengaktifkan data!', 'error');
        }
        return redirect()->back();
    }

    public function off($id)
    {
        $data = Kontak::find($id);
        $data->status = 'non-aktif';
        $data->update();
        if ($data) {
            toast('Berhasil menon-aktifkan data!', 'success');
        } else {
            toast('Gagal menon-aktifkan data!', 'error');
        }
        return redirect()->back();
    }
}
