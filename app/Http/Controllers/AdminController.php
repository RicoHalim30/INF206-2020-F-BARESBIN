<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use App\Transaksi;
use App\Penarikan;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function dashboard()
    {
        $transaksi = \DB::table('transaksi as tr')
                        ->select(array(\DB::Raw('sum(tr.berat) as tot'), \DB::Raw('DATE(tr.created_at) day')))
                        ->groupBy('day')->orderBy('day','desc')->get();
        $statistik = [
            'pengepul' => User::where('jenis', 'pengepul')->count(),
            'pengumpul' => User::where('jenis', 'pengumpul')->count(),
            'berat' => Transaksi::sum('berat')
        ];
        return view('admin.dashboard', compact('transaksi','statistik'));
    }

    public function pengepul()
    {
        $pengepul = User::orderBy('id', 'desc')->where('jenis', 'pengepul')->get();
        return view('admin.pengepul', compact('pengepul'));
    }

    public function pengumpul()
    {
        $pengumpul = User::orderBy('id','desc')->where('jenis', 'pengumpul')->get();
        return view('admin.pengumpul', compact('pengumpul'));
    }

    public function tarik(Request $request)
    {
        $saldo_awal = User::select('saldo')->where('id', $request->user_id)->get()->all();
        $sisa_saldo = $saldo_awal[0]['saldo'] - $request->saldo;

        Penarikan::create([
           'user_id'=> $request->user_id,
           'jumlah'=> $request->saldo,
           'sisa_saldo'=> $sisa_saldo
        ]);

        User::where('id', $request->user_id)->update([
            'saldo'=>$sisa_saldo
        ]);

        return redirect()->back()->with('status', 'Penarikan Berhasil');
    }

    public function status(Request $request, $id){
        if($request->status_sekarang == 'aktif'){
            User::where('id', $id)->update([
                'status' => 'nonaktif'
            ]);
        }else{
            User::where('id', $id)->update([
                'status' => 'aktif'
            ]);
        }

        return redirect()->back()->with('status', 'Status Berhasil Diubah');
    }

}
