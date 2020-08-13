<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Anggota\Anggota;
use Validator;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota = Anggota::all();
        return view('pages.anggota.index', compact('anggota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $awal = 'M';
        $noAkhir = Anggota::max('id');
        $kode = $awal.sprintf('%04s', abs($noAkhir + 1));
        return view('pages.anggota.form', compact('kode'));
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
            'kode'      => 'required|string|max:10|unique:anggota',
            'nama'      => 'required|string|max:15',
            'gender'    => 'required',
            'alamat'    => 'required',
            'telepon'   => 'required|max:13|regex:/(^62)([+?0-9]+$)+/'
        ];
        $message = [
            'kode.unique' => 'Anggota sudah ada, harap ganti dengan yang lain',
            'telepon.regex' => 'format telepon harus (628xxx)'
        ];
        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            /* redirect back and show error validation */
            return redirect()->back()->withErrors($validation)->withInput();
        }
        $anggota = Anggota::create([
            'kode'      => $request->kode,
            'nama'      => $request->nama,
            'gender'    => $request->gender,
            'alamat'    => $request->alamat,
            'telepon'   => $request->telepon
        ]);
        if ($anggota) {
            /* if success redirect to anggota list */
            return redirect()->route('anggota.index')->with(['success' => 'Anggota berhasil ditambahkan']);
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
        $anggota = Anggota::find($id);
        $kode = $anggota->kode;
        return view('pages.anggota.form', compact('anggota', 'kode'));
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
        $anggota = Anggota::find($id);
        $rules = [
            'kode'      => 'required|string|max:10|unique:anggota,kode,'.$anggota->id,
            'nama'      => 'required|string|max:15',
            'gender'    => 'required|string',
            'telepon'   => 'required|max:13|regex:/(^62)([+?0-9]+$)+/',
            'alamat'    => 'required|string'
        ];
        $message = [
            'kode.unique' => 'Anggota sudah ada, harap ganti dengan yang lain',
            'telepon.regex' => 'format telepon harus (628xxx)'
        ];
        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            /* redirect back and show error validation */
            return redirect()->back()->withErrors($validation)->withInput();
        }
        if ($anggota) {
            $anggota->update([
                'kode'      => $request->kode,
                'nama'      => $request->nama,
                'gender'    => $request->gender,
                'alamat'    => $request->alamat,
                'telepon'   => $request->telepon
            ]);
            /* if success redirect to anggota list */
            return redirect()->route('anggota.index')->with(['success' => 'Anggota berhasil diperbaharui']);
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
        $anggota = Anggota::find($id)->delete();
        if ($anggota) {
            return redirect()->route('anggota.index')->with(['success' => 'Anggota berhasil dihapus']);
        }
    }
}
