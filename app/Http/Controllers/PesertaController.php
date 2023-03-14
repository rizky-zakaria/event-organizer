<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index()
    {
        $data = Peserta::orderBy('created_at', 'desc')->get();
        return view('peserta.index', compact('data'));
    }
}
