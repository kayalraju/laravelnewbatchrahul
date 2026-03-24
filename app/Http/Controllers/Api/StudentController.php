<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{

    public function getStudent(){
        $student = Student::all();
        return response()->json([
            'status' => true,
            'message' => 'student fetch successfully',
            'total' => $student->count(),
            'data' => $student
        ],200);
        
    }
    public function createStudent(Request $request){
         $request->validate([
            'name' => 'required|max:50',
            'email' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
        ]);

        // Proceed with saving the product if validation passes
        $student = new Student();
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->address = $request->address;
        
        $student->save();

        return response()->json([
            'message' => 'Student  created successfully',
            'product' => $student
        ], 201);
        
    }

    public function editStudent($id){
        $student = Student::find($id);
        return response()->json([
            'status' => true,
            'message' => 'get sigle data',
            'data' => $student
        ],200);
    }


    public function updateStudent(Request $request,$id){
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required',
            'phone' => 'required|numeric',
            'address' => 'required',
        ]);

        // Proceed with saving the product if validation passes
        $student = Student::find($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->address = $request->address;
        
        $student->save();

        return response()->json([
            'status' => true,
            'message' => 'Student  updated successfully',
        ], 201);
        
    }

    public function deleteStudent($id){
        $student = Student::find($id);
        $student->delete();
        return response()->json([
            'status' => true,
            'message' => 'Student  deleted successfully',
        ], 201);
    }
}
