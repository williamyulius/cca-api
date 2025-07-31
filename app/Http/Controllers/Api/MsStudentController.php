<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\MsStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MsStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = MsStudent::orderBy('id','asc')->get();
        return response()->json([
            'status'=>true,
            'message'=>'List Siswa',
            'data'=>$data
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'student_id'=>'required',
            'name'=>'required',
            'unit'=>'required',
            'class'=>'required',
            'gender'=>'required',
        ];

        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return response()->json([
                'status'=>false,
                'message'=>'Gagal memasukkan data',
                'data'=>$validator->errors(),
            ]);
        }
        // dd($validator->validated());

        // Insert data langsung ambil semua dari request (Make sure field yang terinput aman)
        $dataSiswa = MsStudent::create($request->all());

        // Bisa digunakan untuk menjaga inputan dari front-end sesuai dengan rules yang dibuat di validator
        // $dataSiswa = Siswa::create($validator->validated());
        return response()->json([
            'status'=>true,
            'message'=>'Sukses memasukkan siswa',
        ]);
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    public function show()
    {
        $data = ['id' => request('id')];
        if(is_numeric($data['id'])){
            $datas = MsStudent::find($data);
        } else{
            $column = "name";
            $datas = MsStudent::where($column, 'LIKE', '%'.$data['id'].'%')->first();
        }
        
        if($datas){
            return response()->json([
                'status'=>true,
                'message'=>'Data ditemukan',
                'data'=>$datas
            ],200);
        }else{
            return response()->json([
                'status'=>false,
                'message'=>'Data tidak ditemukan'
            ],404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
