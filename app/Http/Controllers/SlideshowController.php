<?php

namespace App\Http\Controllers;

use App\Models\Gambar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SlideshowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Gambar::orderBy('created_at', 'desc')
            ->where('status', 'aktif')
            ->get();
        // dd($data);
        $img = Gambar::orderBy('created_at', 'desc')->get();
        return view('slide-show.index', compact('data', 'img'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slide-show.create');
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
            'gambar' => ['required']
        ]);
        $uploadPath = public_path('uploads/img');
        if (!File::isDirectory($uploadPath)) {
            File::makeDirectory($uploadPath, 0755, true, true);
        }

        $img = $request->file('gambar');
        $extension = $img->getClientOriginalExtension();
        $rename = 'IMG' . date('YmdHis') . '.' . $extension;

        if ($img->move($uploadPath, $rename)) {
            $post = new Gambar;
            $post->gambar = $rename;
            $post->status = 'non-aktif';
            $post->save();
            // toast('Berhasil Mengunggah File', 'success');
        }

        return redirect(route('slide-show.index'));
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
        $post = Gambar::find($id);
        if ($post->status == 'aktif') {
            $post->status = 'non-aktif';
            $post->update();
        } else {
            $post->status = 'aktif';
            $post->update();
        }

        return redirect(route('slide-show.index'));
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
        $data = Gambar::find($id);
        $data->delete();
        return redirect(route('slide-show.index'));
    }
}
