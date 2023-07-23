<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RekomendasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('rekomendasi');
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
        // $dt = new rekomendasi($request->keluhan, $request->umur);
        $dm = new saran($request->keluhan, $request->umur);
        $data = [
            'namajamu' => $dm->namajamu(),
            'keluhan' => $request->keluhan,
            'keluhanku' => $request->keluhanku,
            'umur' => $dm->hitungumur(),
            'saran' => $dm->saran(),
            'saranguna' => $dm->saranguna(),
        ];

        return view ('rekomendasi', compact ('data'));
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
interface Harga {
    public function namajamu();
    public function hitungumur();

}
class rekomendasi implements Harga {
    public function __construct($keluhan, $umur,) {
        $this->keluhan = $keluhan;
        $this->umur = $umur;
    }

    public function namajamu(){
        if ($this->keluhan == "keseleo dan/atau kurang nafsu makan") {
            return "Jamu Beras Kencur";
        } else if($this->keluhan == "pegal-pegal"){
            return "Jamu Kunir asam";
        }else if ($this->keluhan== "darah tinggi dan/atau gula darah"){
            return "Jamu Brotowali";
        }else if ($this->keluhan == "Kram perut dan/atau masuk angin"){
            return "Jamu Temu Lawak";
        }else{
            return "Jamu belum ditemukan";
        }    
    }
        public function hitungumur(){
        return date('Y') - $this->umur; 
    } 
}

class saran extends rekomendasi
{
    public function saran(){
        if ($this->hitungumur() <=10) {
            return "Digunakan 1x sehari";
        } else {
            return "Digunakan 2x sehari";
        }   
    }

    public function saranguna(){
        if ($this->namajamu() == "Jamu Beras Kencur") {
            return "Dioles";
        } else {
            return "Dikonsumsi";
        }   
    }




       
}

