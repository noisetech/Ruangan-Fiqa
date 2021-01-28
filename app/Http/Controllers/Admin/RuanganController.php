<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Ruangan::all();
        return view('pages.ruang.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.ruang.create');
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
            'nama_ruangan' => 'required|max:255',
            'kapasitas_ruangan' => 'required|max:255',
            'waktu_ketersedian_ruangan' => 'required|max:255',
            'status_ruangan' => 'required|max:255',
        ]);

        $data = $request->all();

        Ruangan::create($data);

        return redirect()->route('ruangan.index')->with('status', 'Data Berhasil Ditambahkan');
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
        $items = Ruangan::findOrFail($id);
        return view('pages.ruang.edit', [
            'items' => $items
        ]);
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
            'nama_ruangan' => 'required|max:255',
            'kapasitas_ruangan' => 'required|max:255',
            'waktu_ketersedian_ruangan' => 'required|max:255',
            'status_ruangan' => 'required|max:255',
        ]);


        $data = $request->all();

        $item = Ruangan::findOrFail($id);

        $item->update($data);

        return redirect()->route('ruangan.index')->with('status', 'Data Berhasil Diubah');




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Ruangan::findOrFail($id);

        $hapus->delete();

        return redirect()->route('ruangan.index')->with('status', 'Data Berhasil Dihapus');
    }
}
