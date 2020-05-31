<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Transaksi;
use App\User;
use Illuminate\Support\Facades\Validator;
use Auth;

class PengepulController extends Controller
{
    public function __construct()
    {
        $this->middleware('pengepul');
    }

    public function dashboard()
    {
        return view('pengepul.dashboard');
    }

    public function kirim()
    {
        return view('pengepul.kirim');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pengumpul' => 'exists:users,username',], ['pengumpul.exists' => 'username tidak ditemukan']);

        if($validator->fails()){
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator);
        }

        $file = $request->file('gambar');
        $nama_file = time()."_".$file->getClientOriginalName();
        $folder_tujuan = 'img';
        $file->move($folder_tujuan, $nama_file);

        Transaksi::create([
                'pengepul' => $request->pengepul,
                'pengumpul' => $request->pengumpul,
                'berat' => $request->berat,
                'harga' => $request->harga,
                'gambar' => $nama_file
        ]);

        $saldo_lama = User::select('saldo')->where('username', $request->pengumpul)->get()->all();
        $saldo_baru = $saldo_lama[0]['saldo'] + $request->harga;

        User::where('username', $request->pengumpul)->update([
            'saldo' => $saldo_baru  
        ]);
        return redirect()->back()->with('status', 'Transaksi berhasil dilakukan');
    }

    public function histori()
    {
        $histori = Transaksi::orderBy('id','desc')->where('pengepul', Auth::user()->id)->get();
        return view('pengepul.histori', compact('histori'));

    }
}
