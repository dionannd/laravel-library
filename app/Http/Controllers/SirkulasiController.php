<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Sirkulasi\Sirkulasi;
use App\Model\Buku\Buku;
use App\Model\Anggota\Anggota;
use Validator;
use Carbon\Carbon;

class SirkulasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sirkulasi  = Sirkulasi::all();
        return view('pages.sirkulasi.index', compact('sirkulasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buku = Buku::all();
        $anggota = Anggota::all();
        $awal = 'S';
        $noAkhir = Sirkulasi::max('id');
        $kode = $awal.sprintf('%04s', abs($noAkhir + 1));
        $pinjam = Carbon::now();
        return view('pages.sirkulasi.form', compact('kode', 'buku', 'anggota', 'pinjam'));
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
            'kode'       => 'required|string|max:15|unique:sirkulasi',
            'id_buku'    => 'required',
            'id_anggota' => 'required',
        ];
        $validation = Validator::make($request->all(), $rules);
        if ($validation->fails()) {
            /* redirect back and show error validation */
            return redirect()->back()->withErrors($validation)->withInput();
        }
        $tanggalSekarang = date('Y-m-d h:i:s');
        $convertTanggalSekarang = strtotime($tanggalSekarang);
        $tanggalKembali = 7;
        $convertTanggalKembali = 86400 * $tanggalKembali;
        $jumlahTanggalKembali = $convertTanggalSekarang + $convertTanggalKembali;
        $hasilTanggalKembali = date('Y-m-d h:i:s', $jumlahTanggalKembali);
        $pinjam = Sirkulasi::create([
            'kode'          => $request->kode,
            'id_buku'       => $request->id_buku,
            'id_anggota'    => $request->id_anggota,
            'tgl_pinjam'    => Carbon::now(),
            'tgl_kembali'   => $hasilTanggalKembali
        ]);
        if ($pinjam) {
            /* if success redirect to sirkulasi list */
            return redirect()->route('sirkulasi.index')->with(['success' => 'Peminjaman berhasil']);
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
