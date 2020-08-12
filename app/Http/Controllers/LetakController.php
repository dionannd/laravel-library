<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Letak\Letak;
use Validator;

class LetakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $letak = Letak::orderBy('nama', 'ASC')->paginate(10);
        return view('pages.letak.index', compact('letak'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.letak.form');
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
            'nama'      => 'required|string|max:15|unique:letak',
            'deskripsi' => 'required|string'
        ];
        $message = [
            'nama.unique' => 'Tempat sudah ada, harap ganti dengan yang lain'
        ];
        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            /* redirect back and show error validation */
            return redirect()->back()->withErrors($validation)->withInput();
        }
        $letak = Letak::create([
            'nama'      => $request->nama,
            'deskripsi' => $request->deskripsi
        ]);
        if ($letak) {
            /* if success redirect to kategori list */
            return redirect()->route('letak.index')->with(['success' => 'Tempat berhasil ditambahkan']);
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
        $letak = Letak::find($id);
        return view('pages.letak.form',compact('letak'));
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
        $letak = Letak::find($id);
        $rules = [
            'nama'      => 'required|string|max:15|unique:letak,nama,'.$letak->id,
            'deskripsi' => 'required|string'
        ];
        $message = [
            'nama.unique' => 'Tempat sudah ada, harap ganti dengan yang lain'
        ];
        $validation = Validator::make($request->all(), $rules, $message);
        if ($validation->fails()) {
            /* redirect back and show error validation */
            return redirect()->back()->withErrors($validation)->withInput();
        }
        if ($letak) {
            $letak->update([
                'nama'      => $request->nama,
                'deskripsi' =>$request->deskripsi
            ]);
            /* if success redirect to letak list */
            return redirect()->route('letak.index')->with(['success' => 'Tempat berhasil diperbaharui']);
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
        $letak = Letak::find($id)->delete();
        if ($letak) {
            return redirect()->route('letak.index')->with(['success' => 'Tempat berhasil dihapus']);
        }
    }
}
