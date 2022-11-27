<?php

namespace App\Http\Controllers;
use App\Models\Artis;
use Illuminate\Http\Request;

class ArtisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artis = artis::all();
        return $artis;
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
         
        $table = Artis::create([
            "nama" => $request->nama,
            "umur" => $request->umur,
            "gender" => $request->gender,
            "genre_musik" => $request->genre_musik,
            "username" => $request->username,
            "email" => $request->email,
            "password" => $request->password
            
        ]);

        return response()->json([
            'sucsess' => 201,
            'message' => 'data berhasil disimpan',
            'data' => $artis
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
        
        $artis = artis::find($id);
        if ($artis) {
            return response()->json([
                'status' => 200,
                'data' => $artis
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
        
        $artis = artis::find($id);
        if($artis){
            $artis->nama_lengkap = $request->nama_lengkap ? $request->nama_lengkap : $artis->nama_lengkap;
            $artis->umur = $request->umur ? $request->umur : $artis->umur; 
            $artis->gender = $request->gender ? $request->gender : $artis->gender;
            $artis->genre_musik = $request->genre_musik ? $request->genre_musik : $artis->genre_musik;
            $artis->username = $request->username ? $request->username : $artis->username; 
            $artis->email = $request->email ? $request->email : $artis->email; 
            $artis->password = $request->password ? $request->password : $request->password; 
            $artis->save();
            
            return response()->json([
                'status' => 200,
                'data' => $artis
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
        
        $artis = artis::where('id',$id)->first();
        if($artis){
            $artis->delete();
            return response()->json([
                'status' => 200,
                'data' => $artis
            ],200);
        }else{
            return response()->json([
                'status' => 404,
                'message' => 'id' . $id . 'tidak ditemukan'            
            ],404);
        }
    }
    
    
    public function register(Request $request){

        $field = $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed|min:8'
        ]);

        $artis = Artis::create([
            'nama' => $field['nama'],
            'email' => $field['email'],
            'password' => bcrypt($field['password'])
        ]);

        $token = $user->CreateToken('tokenku')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);

    }

    
    public function login(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        //Check email
        $user = User::where('email', $fields['email'])->first();

        //Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'unauthorized'
            ], 401);
        }

        $token = $user->createToken('tokenku')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return [
            'message' => 'Logged out'
        ];
    }

}
