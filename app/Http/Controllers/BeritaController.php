<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Gambar;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        date_default_timezone_set('Asia/Ujung_Pandang');
    }

    public function index()
    {
        $data = Berita::all();
        return view('berita.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('berita.create');
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
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'file' => ['required', 'mimes:png,jpeg,jpg', 'max:2048']
        ]);

        if ($request->hasFile('file')) {
            $uploadPath = public_path('uploads/img');
            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true, true);
            }

            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $rename = 'img' . date('dmYHis') . '.' . $extension;

            if ($file->move($uploadPath, $rename)) {
                $img = new Gambar;
                // $img->id = rand(111, 9999) . date('dmYHis');
                $img->gambar = $rename;
                $img->status = 'non-aktif';
                $img->save();

                $post = new Berita();
                $post->id = rand(1, 999) . date('dmYHis');
                $post->judul = $request->judul;
                $post->slug  = \Str::slug($request->judul);
                $post->isi = $request->isi;
                $post->gambar = $rename;
                $post->user_id = Auth::user()->id;
                $post->created_at = date('d-m-Y H:i');
                $post->save();
                toast('Berhasil melakukan input data!', 'success');
                return redirect(route('berita.index'));
            }
        }
        toast('Gagal melakukan input data!', 'error');
        return redirect(route('berita.index'));
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
        $data = Berita::find($id);
        return view('berita.edit', compact('data'));
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
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'file' => ['required', 'mimes:png,jpeg,jpg', 'max:2048']
        ]);

        if ($request->hasFile('file')) {
            $uploadPath = public_path('uploads/img');
            if (!File::isDirectory($uploadPath)) {
                File::makeDirectory($uploadPath, 0755, true, true);
            }

            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $rename = 'img' . date('dmYHis') . '.' . $extension;

            if ($file->move($uploadPath, $rename)) {
                $img = new Gambar;
                // $img->id = rand(111, 9999) . date('dmYHis');
                $img->gambar = $rename;
                $img->status = 'non-aktif';
                $img->save();

                $post = Berita::find($id);
                $post->judul = $request->judul;
                $post->slug  = Str::slug($request->judul);
                $post->isi = $request->isi;
                $post->gambar = $rename;
                $post->user_id = Auth::user()->id;
                $post->created_at = date('d-m-Y H:i');
                $post->update();
                toast('Berhasil melakukan edit data!', 'success');
                return redirect(route('berita.index'));
            }
        }
        toast('Gagal melakukan edit data!', 'error');
        return redirect(route('berita.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Berita::find($id);
        $post->delete();

        if ($post) {
            toast('Berhasil menghapus data!', 'success');
        } else {
            toast('Gagal menghapus data!', 'error');
        }

        return redirect(route('berita.index'));
    }
}
