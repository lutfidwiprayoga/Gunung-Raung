<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tiket;

class TiketController extends Controller
{
    public function __construct()
    {
        $this->tiket = new Tiket();
        $this->middleware(['auth', 'verified']);
    }

    public function index(Request $request)
    {
        $tiket = Tiket::orderBy('nama', 'asc')->when(
            request()->cari,
            function ($tiket) {
                $tiket = $tiket->where('nama', 'like', '%' . request()->cari . '%');
            }
        )->paginate(10);
        return view('admin.tiket.index', compact('tiket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tiket.add');
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
            'nama' => 'required',
            'harga' => 'required',
            'asuransi' => 'required',
        ]);
        //simpan ke database pesanan
        $tiket = $request->all();
        Tiket::create($tiket);

        if ($tiket) {
            //redirect dengan pesan sukses
            return
                redirect()->route('admin.tiket.index')->with(['success' => 'Data
            Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.tiket.index')->with(['error' => 'Data Gagal
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
        $tiket = Tiket::find($id);
        return view('admin.tiket.detail', compact('tiket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tiket = Tiket::find($id);
        return view('admin.tiket.edit', compact('tiket'));
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
        $tiket = Tiket::find($id)->update($request->all());

        if ($tiket) {
            //redirect dengan pesan sukses
            return redirect()->route('admin.tiket.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('admin.tiket.index')->with(['error' => 'Data Gagal Diupdate!']);
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
        //Hapus Foto
        $tiket = Tiket::findOrFail($id);
        $tiket->delete();
        return redirect()->route('admin.tiket.index')->with('success', 'Data berhasil dihapus!');
    }
}
