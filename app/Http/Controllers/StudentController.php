<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = Student::all();
        return response()->json($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'name' => 'required',
            'father_name' => 'required',
            'mobile_number' => 'required | min:10 | max:12',
            'email' => 'required | unique:students',
            'sign_image' => 'required | mimes:jpeg,png,jpg,gif,svg',
            'student_image' => 'required | mimes:jpeg,png,jpg,gif,svg',
        ]);


        $student = new Student();

        $student->name = $request->name;
        $student->father_name = $request->father_name;
        $student->mobile_number = $request->mobile_number;
        $student->email = $request->email;
        
        
        if($request->sign_image && $request->student_image){
            $sign_image = $request->sign_image;
            $signextension = $sign_image->getClientOriginalExtension();
            $sign_file_name = "sign_".time().'.'.$signextension;
            
            $sign_image->move('students/image/', $sign_file_name);
            $student->sign_image = $sign_file_name;
            $student_image = $request->student_image;
            $studentextension = $student_image->getClientOriginalExtension();
            $student_file_name = "st_".time().'.'.$studentextension;
            $student_image->move('students/image/', $student_file_name);
            $student->student_image = $student_file_name;   
        }
        $student->save();

        return response()->json(
            [
                'success' => true,
                'message' => 'Data inserted successfully'
            ]
        );

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $data = Student::find($id);
        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Student::find($id);
        return response()->json($data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $student = Student::find($id);
        $student->name = $request->name;
        $student->father_name = $request->father_name;
        $student->mobile_number = $request->mobile_number;
        $student->email = $request->email;

        if($request->sign_image){
            $sign_image = $request->sign_image;
            $signextension = $sign_image->getClientOriginalExtension();
            $sign_file_name = "sign_".time().'.'.$signextension;
            $sign_image->move('students/image/', $sign_file_name);
            $student->sign_image = $sign_file_name;
        }
        if($request->student_image){
            $student_image = $request->student_image;
            $studentextension = $student_image->getClientOriginalExtension();
            $student_file_name = "st_".time().'.'.$studentextension;
            $student_image->move('students/image/', $student_file_name);
            $student->student_image = $student_file_name;   
        }


        $student->save();
        return response()->json(
            [
                'success' => true,
                'message' => 'Data updated successfully'
            ]
        );

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        
    }

    public function deleteItem($id){
        Student::where('id',$id)->delete();
    }
}
