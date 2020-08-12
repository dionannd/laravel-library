<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Kategori\Kategori;
use Validator;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::orderBy('nama', 'ASC')->paginate(10);
        return view('pages.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.kategori.form');
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
        $kategori = Kategori::find($id);
        return view('pages.kategori.form',compact('kategori'));
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

        $kategori = Kategori::find($id);
        $rules = [
            'nama'      => 'required|string|max:15|unique:kategori,nama,'.$kategori->id,
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
        if ($kategori) {
            $kategori->update([
                'nama'      => $request->nama,
                'deskripsi' =>$request->deskripsi
            ]);
            /* if success redirect to kategori list */
            return redirect()->route('kategori.index')->with(['success' => 'Kategori berhasil diperbaharui']);
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
        $kategori = Kategori::find($id)->delete();
        if ($kategori) {
            return redirect()->route('kategori.index')->with(['success' => 'Kategori berhasil dihapus']);
        }
    }
}
