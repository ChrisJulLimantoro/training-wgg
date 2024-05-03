<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;

class studentController extends Controller
{
    public function index(Request $request){
        $student = Student::all();
        return response()->json($student,200,[
            'Content-Type' => 'application/json',
            'allowed_methods' => 'GET, POST, PUT, DELETE',
            'allowed_origins' => '*',
            'access-control-allow-origin' => '*',
        ]);
    }

    public function store(Request $request){
        $data = $request->only(['nrp','name','address']);
        $rules = [
            'nrp' => 'required|min:5',
            'name' => 'required|min:5',
            'address' => 'required|min:10'
        ];
        $messages = [
            'nrp.required' => 'NRP wajib diisi',
            'nrp.min' => 'NRP minimal 5 karakter',
            'name.required' => 'Nama wajib diisi',
            'name.min' => 'Nama minimal 5 karakter',
            'address.required' => 'Alamat wajib diisi',
            'address.min' => 'Alamat minimal 10 karakter'
        ];
        $val = Validator::make($data, $rules, $messages);

        if($val->fails()){
            return response()->json($val->errors(), 420);
        }
        $student = Student::create($request->only(['nrp','name','address']));
        return response()->json([
            'message' => 'Data mahasiswa berhasil ditambahkan'
        ],200);
    }

    public function edit(Request $request, $id){
        $student = Student::find($id);
        $student->update($request->all());
        return response()->json($student,200);
    }

    public function destroy($id){
        $student = Student::find($id);
        $student->delete();
        return response()->json([
            'message' => 'Data mahasiswa berhasil dihapus'
        ],200);
    }
}
