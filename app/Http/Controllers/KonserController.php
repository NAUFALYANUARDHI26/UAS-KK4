<?php

namespace App\Http\Controllers;
use App\Models\Konser;
use Illuminate\Http\Request;

class KonserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Konser = konser::all();
        return $Konser;
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
          
        $Konser = Konser::create([
            "nama_konser" => $request->nama_konser,
            "tanggal" => $request->tanggal,
            "waktu" => $request->waktu,
            "nama_artis" => $request->nama_artis,
            "panggung" => $request->panggung,
            "kapasitas" => $request->kapasitas
        ]);

        return response()->json([
            'sucsess' => 201,
            'message' => 'data berhasil disimpan',
            'data' => $Konser
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
        $Konser = konser::find($id);
        if ($Konser) {
            return response()->json([
                'status' => 200,
                'data' => $Konser
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
        
        $Konser = konser::find($id);
        if($Konser){
            $Konser->nama_konser = $request->nama_konser ? $request->nama_konser : $Konser->nama_konser; 
            $Konser->tanggal = $request->tanggal ? $request->tanggal : $Konser->tanggal;
            $Konser->waktu = $request->waktu ? $request->waktu : $Konser->waktu;
            $Konser->nama_artis = $request->nama_artis ? $request->nama_artis : $Konser->nama_artis; 
            $Konser->panggung = $request->panggung ? $request->panggung : $Konser->panggung; 
            $Konser->kapasitas = $request->kapasitas ? $request->kapasitas : $Konser->kapasitas; 
            $Konser->save();
            
            return response()->json([
                'status' => 200,
                'data' => $Konser
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
        $Konser = konser::where('id',$id)->first();
        if($Konser){
            $Konser->delete();
            return response()->json([
                'status' => 200,
                'data' => $Konser
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id . 'tidak ditemukan'            
            ],404);
        }
    }
}
