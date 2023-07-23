<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //untuk menampilkan data
        $kategori = kategori::all();
        $produk= produk::all();
        return view ('produk.index', compact ('kategori','produk'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //untuk menampilkan data
        $kategori = kategori::all();
        $produk= produk::all();
        return view ('produk.create', compact ('kategori','produk'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //untuk memfungsikan create
        $produk = $request->all();
        produk::create([
            'nama' =>$request->nama,
            'foto' =>$request->foto,
            'harga' =>$request->harga,
            'descproduk' =>$request->descproduk,
            'kategoris_id' =>$request->kategoris_id,
        ]); 
        return redirect('produk');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        //
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        //untuk menampilkan dorm edit
        return view ('produk.edit', compact ('produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        //untuk memasukkan editan
        $data = $request->all();

        try {
            $data['foto'] = Storage::put('img', $request->foto);

            $produk->update($data);
        }catch (\Throwable $th) {
                $data['foto'] = $produk->foto;
                $produk->update($data);
            }

            return redirect('produk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        //
    }
    public function delete($id){
        //untuk menghapus data
        $data = produk::find($id);

        $data->delete();
        return redirect ('produk');
    }
}
