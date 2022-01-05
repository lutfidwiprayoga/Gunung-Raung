<?php

namespace App\Http\Controllers\Guide;

use App\Http\Controllers\Controller;
use App\Models\Perjalanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerjalananController extends Controller
{
    public function __construct()
    {
        $this->Perjalanan = new Perjalanan();
        $this->middleware(['auth', 'verified']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->id;
        $guide = Perjalanan::orderBy('harga_perjalanan', 'asc')->where('perjalanans.user_id', $user)->get();
        return view('guide.paket.index', compact('guide'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('guide.paket.add');
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
            'nama_paket' => 'required',
            'jadwal_mulai' => 'required',
            'jadwal_selesai' => 'required',
            'harga_perjalanan' => 'required',
            'keterangan' => 'required',
        ]);
        $guide = new Perjalanan();
        $guide->nama_paket = $request->nama_paket;
        $guide->jadwal_mulai = $request->jadwal_mulai;
        $guide->jadwal_selesai = $request->jadwal_selesai;
        $guide->harga_perjalanan = $request->harga_perjalanan;
        $guide->keterangan = $request->keterangan;
        $guide->user_id = Auth::user()->id;
        $guide->save();

        if ($guide) {
            //redirect dengan pesan sukses
            return
                redirect()->route('guide.perjalanan.index')->with(['success' => 'Data
            Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('guide.perjalanan.index')->with(['error' => 'Data Gagal
            Disimpan!']);
        }
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
        $guide = Perjalanan::findOrFail($id);
        $guide->delete();
        return redirect()->route('guide.perjalanan.index')->with('success', 'Data berhasil dihapus!');
    }
}
