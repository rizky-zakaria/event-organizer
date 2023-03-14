<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\Cluster;
use App\Models\Event;
use App\Models\Gambar;
use App\Models\Peserta;
use App\Models\SpaceBoot;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $event = Cluster::join('events', 'events.id', '=', 'clusters.event_id')
            ->join('users', 'users.id', '=', 'clusters.user_id')
            ->where('clusters.status', 'aktif')
            ->first();
        // dd($event);
        $img = Gambar::where('status', 'aktif')
            ->orderBy('created_at', 'desc')
            ->get();
        $space = SpaceBoot::where('event_id', '1')->get();
        return view('front.index', compact('event', 'space', 'img'));
    }

    public function blog()
    {
        $data = Berita::join('users', 'users.id', '=', 'beritas.user_id')->paginate(6);
        return view('front.blog', compact('data'));
    }

    public function kontak()
    {
        return view('front.kontak');
    }

    public function galeri()
    {
        $data = Gambar::orderBy('created_at', 'desc')->paginate(9);
        return view('front.galeri', compact('data'));
    }

    public function register(Request $request)
    {
        $cek = Event::where('status', 'aktif')->first();
        if (isset($cek->nama)) {
            $data = Peserta::create([
                'nama' => $request->name,
                'alamat' => $request->alamat,
                'wa' => $request->wa,
                'perusahaan' => $request->usaha,
                'space_boot' => $request->space
            ]);
            toast('Berhasil melakukan registrasi', 'success');
        } else {
            toast('Tidak ada event untuk saat ini!', 'error');
        }
        return redirect()->back();
    }
}
