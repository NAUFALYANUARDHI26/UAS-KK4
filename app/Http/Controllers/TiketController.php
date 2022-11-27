<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tiket;
class TiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tiket = tiket::all();
        return $tiket;
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
        $tiket = Tiket::create([
            "nomor_tiket" => $request->nomor_tiket,
            "nama_konser" => $request->nama_konser,
            "tanggal" => $request->tanggal,
            "waktu" => $request->waktu,
            "nama_artis" => $request->nama_artis,
            "harga" => $request->harga,
            "nomor_kursi" => $request->nomor_kursi,
            "jenis_tiket" => $request->jenis_tiket,
            "ketersediaan_tiket" => $request->ketersediaan_tiket,
            
            
        ]);

        return response()->json([
            'sucsess' => 201,
            'message' => 'data berhasil disimpan',
            'data' => $tiket
        ], 201);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        
        $tiket = tiket::find($id);
        if ($tiket) {
            return response()->json([
                'status' => 200,
                'data' => $tiket
            ], 200);
        } else {
            return response()->json([
                'status' => 404,
                'message' => 'id atas' .$id. 'tidak ditemukan'

            ],404);

        }
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
         
        $tiket = tiket::find($id);
        if($tiket){
            $tiket->nomor_tiket = $request->nama_lengkap ? $request->nama_lengkap : $tiket->nomor_tiket;
            $tiket->nama_konser = $request->nama_konser ? $request->nama_konser : $tiket->nama_konser; 
            $tiket->tanggal = $request->tanggal ? $request->tanggal : $tiket->tanggal;
            $tiket->waktu = $request->waktu ? $request->waktu : $tiket->waktu;
            $tiket->nama_artis = $request->nama_artis ? $request->nama_artis : $tiket->nama_artis; 
            $tiket->harga = $request->harga ? $request->harga : $tiket->harga; 
            $tiket->nomor_kursi = $request->nomor_kursi ? $request->nomor_kursi : $tiket->nomor_kursi; 
            $tiket->jenis_tiket = $request->jenis_tiket ? $request->jenis_tiket : $tiket->v; 
            $tiket->ketersediaan_tiket = $request->ketersediaan_tiket ? $request->ketersediaan_tiket : $tiket->ketersediaan_tiket; 
            $tiket->save();
            
            return response()->json([
                'status' => 200,
                'data' => $tiket
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => $id . 'tidak ditemukan'
            ],404);
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
         
        $tiket = tiket::where('id',$id)->first();
        if($tiket){
            $tiket->delete();
            return response()->json([
                'status' => 200,
                'data' => $tiket
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id . 'tidak ditemukan'            
            ],404);
        }
    }
    
}
