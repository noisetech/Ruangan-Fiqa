<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Peminjaman;
use App\Ruangan;
use App\User;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Peminjaman::with(['ruangan', 'users'])->get();

        return view('pages.peminjaman.index', [
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $items = Peminjaman::findOrFail($id);
        $ruang = Ruangan::all();
        $users = User::all();


        return view('pages.peminjaman.edit', [
            'items' => $items,
            'ruang' => $ruang,
            'users' => $users
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
            'kegiatan' => 'required|string|in:SEMINAR,RAPAT_ORGANISASI',
            'status_peminjaman' => 'required|string|in:SUKSESS,GAGAL'
        ]);


        $data = $request->all();

        $items = Peminjaman::findOrFail($id);

        $items->update($data);

        return redirect()->route('peminjaman.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Peminjaman::findOrFail($id);

        $hapus->delete();

        return redirect()->route('peminjaman.index');
    }
}
