<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Buku\Buku;
use App\Model\Kategori\Kategori;
use App\Model\Letak\Letak;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::all();
        return view('pages.buku.index', compact('buku'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        $letak = Letak::all();
        $awal = 'B';
        $noAkhir = Buku::max('id');
        $kode = $awal.sprintf('%04s', abs($noAkhir + 1));
        return view('pages.buku.form', compact('kategori', 'letak', 'kode'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nama'      => 'required|string|max:15|unique:kategori',
            'deskripsi' => 'required|string'
        ];
        $message = [
            'nama.unique' => 'Kategori sudah ada, harap ganti dengan yang lain'
        ];
        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            /* redirect back and show error validation */
            return redirect()->back()->withErrors($validation)->withInput();
        }
        $kategori = Kategori::create([
            'nama'      => $request->nama,
            'deskripsi' => $request->deskripsi
        ]);
        if ($kategori) {
            /* if success redirect to kategori list */
            return redirect()->route('kategori.index')->with(['success' => 'Kategori berhasil ditambahkan']);
        } else {
            return 500;
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
        //
    }
}
