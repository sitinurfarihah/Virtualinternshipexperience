<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\kategori;
use Illuminate\Http\Request;

class PostController extends Controller
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
        $post= post::all();
        return view ('post.index', compact ('kategori','post'));
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
        $post= post::all();
        return view ('post.create', compact ('kategori','post'));
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
        $post = $request->all();
        post::create([
            'judul' =>$request->judul,
            'isi' =>$request->isi,
            'penulis' =>$request->penulis,
            'tanggal' =>$request->tanggal,
            'kategoris_id' =>$request->kategoris_id,
        ]); 
        return redirect('post');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view ('post.edit', compact ('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        //untuk memasukkan editan
        $data = $request->all();

        try {
            $post->update($data);
        }catch (\Throwable $th) {
                $post->update($data);
            }
            return redirect('post');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
    public function delete($id){
        //untuk menghapus data
        $data = post::find($id);

        $data->delete();
        return redirect ('post');
    }
}
