<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Transaksi;
use App\Penarikan;
use Auth;

class PengumpulController extends Controller
{
    public function __construct()
    {
        $this->middleware('pengumpul');
    }

    public function dashboard()
    {
        $transaksi = Transaksi::orderBy('id','desc')->where('pengumpul', Auth::user()->username)->get();
        return view('pengumpul.dashboard', compact('transaksi'));
    }

    public function histori()
    {
        $transaksi = Penarikan::orderBy('id','desc')->where('user_id', Auth::user()->id)->get();
        return view('pengumpul.histori', compact('transaksi'));
    }
}
