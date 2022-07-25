<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kuota;
use App\Models\Periode;
use Illuminate\Http\Request;

class ManagementKuotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->periode = new Periode();
        $this->kuota = new Kuota();
        $this->middleware(['auth', 'verified']);
    }

    public function index(Request $request)
    {
        if ($request->has('cari')) {
            $kuota = Kuota::where('periode_id', 'LIKE', '&' . $request->cari . '&')->paginate(30);
        } else {
            $kuota = Kuota::all();
        }
        $kuota = Kuota::get();
        $periode = Periode::get();
        return view('admin.kuota.index', compact('kuota', 'periode'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $periode = Periode::get();
        return view('admin.kuota.add', compact('periode'));
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
            'periode_id' => 'required',
            'tanggal_pendakian' => 'required',
            'kuota' => 'required',
        ]);
        //simpan ke database pesanan
        $kuota = $request->all();
        Kuota::create($kuota);
        // dd($kuota);

        if ($kuota) {
            //redirect dengan pesan sukses
            return
                redirect()->route('admin.kuota.index')->with(['success' => 'Data
            Berhasil Ditambahkan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.kuota.index')->with(['error' => 'Data Gagal
            Ditambahkan!']);
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
        $kuota = Kuota::find($id)->update($request->all());
        if ($kuota) {
            return redirect()->back()->with('sukses', 'Data Berhasil Diupdate');
        } else {
            return redirect()->back()->with('error', 'Data Gagal Diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kuota = Kuota::findOrFail($id);
        $kuota->delete();
        return redirect()->route('admin.kuota.index')->with('success', 'Data berhasil dihapus!');
    }
}
