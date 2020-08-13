<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Buku\Buku;
use App\Model\Kategori\Kategori;
use App\Model\Letak\Letak;
use Validator;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buku = Buku::with('kategori')->latest()->get();
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
            'kode'      => 'required|string|max:15|unique:buku',
            'judul'     => 'required|string',
            'id_kategori' => 'required',
            'pengarang' => 'required',
            'penerbit'  => 'required',
            'tahun'     => 'required|integer',
            'id_letak'  => 'required'
        ];
        $message = [
            'kode.unique' => 'Kategori sudah ada, harap ganti dengan yang lain',
            'tahun.integer' => 'Format tahun harus angka'
        ];
        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            /* redirect back and show error validation */
            return redirect()->back()->withErrors($validation)->withInput();
        }
        $buku = Buku::create([
            'kode'      => $request->kode,
            'judul'     => $request->judul,
            'id_kategori' => $request->id_kategori,
            'pengarang' => $request->pengarang,
            'penerbit'  => $request->penerbit,
            'tahun'     => $request->tahun,
            'letak'     => $request->letak
        ]);
        if ($buku) {
            /* if success redirect to buku list */
            return redirect()->route('buku.index')->with(['success' => 'Buku berhasil ditambahkan']);
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
        $buku = Buku::find($id);
        $kode = $buku->kode;
        $kategori = Kategori::all();
        $letak = Letak::all();
        return view('pages.buku.form', compact('buku', 'kode', 'kategori', 'letak'));
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
        $buku = Buku::find($id);
        $rules = [
            'kode'      => 'required|string|max:15|unique:buku,kode,'.$buku->id,
            'judul'     => 'required|string',
            'id_kategori' => 'required',
            'pengarang' => 'required',
            'penerbit'  => 'required',
            'tahun'     => 'required|integer',
            'id_letak'  => 'required'
        ];
        $message = [
            'kode.unique' => 'Kategori sudah ada, harap ganti dengan yang lain',
            'tahun.integer' => 'Format tahun harus angka'
        ];
        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            /* redirect back and show error validation */
            return redirect()->back()->withErrors($validation)->withInput();
        }
        if ($buku) {
            $buku->update([
                'kode'      => $request->kode,
                'judul'     => $request->judul,
                'id_kategori' => $request->id_kategori,
                'pengarang' => $request->pengarang,
                'penerbit'  => $request->penerbit,
                'tahun'     => $request->tahun,
                'id_letak'  => $request->id_letak
            ]);
            /* if success redirect to bukuu list */
            return redirect()->route('buku.index')->with(['success' => 'Buku berhasil diperbaharui']);
        } else {
            return 500;
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
        //
    }
}
