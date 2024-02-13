<?php

namespace App\Http\Controllers;

use App\Models\MjuStudent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\updatedataMjustudentRequest;
//use App\Http\Controllers\DB;

class MjuStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = MjuStudent::all();
        return $students;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)  //post
    {
        $validated = $request->validate([
            'student_code' => 'required|string|max:15',
            'first_name_en' => 'required|string|max:50',
            'first_name' => 'required|string|max:50',
            'idcard' => 'required||digits:13',
            'major_id' => 'required|exists:majors,major_id',
            'phone' => 'required|string',
            'address' => 'required|string',
            'email' => 'required|email'
        ]);
        MjuStudent::create($validated);

        return response()->json(['message' => 'Student created successfully'], 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(Request $request,MjuStudent $mjuStudent)   //get
    {
        //return "hello show";
        Log::info($request->mju);
        $student_code = $request->mju;  //เรียกใช้ดาต้า
        $mjuStudent = MjuStudent::where('student_code',$student_code)->get();   //หาข้อมูลในดาต้าเบส
        // ค้นหาตามรหัสนักศึกษา
        return response()->json (
            [
                'message' => 'Student get successfully',
                'get Data by' => 'Pavanrat',
                'data' => $mjuStudent],
            200  //
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MjuStudent $mjuStudent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updatedata(Request $request, MjuStudent $mjuStudent , $data)
    {
        $validated = $request->validate([
            'student_code' => 'required|string|max:12',
            'first_name' => 'required|string|max:50',
            'first_name_en' => 'required|string|max:50',
            'major_id' => 'required|exists:majors,major_id',
            'idcard' => 'required||digits:13',
            'address' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|email',
            // 'last_name'=> 'required|string|max:50',
            // 'last_name_en'=> 'required|string|max:50',
        ]);
       
        $mjuStudent->update($validated);

        $updatedata = DB::table('mju_students')
        ->where('student_code', $data)
        ->orwhere('first_name', $data)
        ->orwhere('first_name_en', $data)
        ->orwhere('major_id', $data)
        ->orwhere('idcard', $data)
        ->orwhere('address', $data)
        ->orwhere('phone', $data)
        ->orwhere('email', $data)
        ->update([
            'student_code'=>$validated['student_code'],
            'first_name'=>$validated['first_name'],
            'first_name_en'=>$validated['first_name_en'],
            'major_id'=>$validated['major_id'],
            'idcard'=>$validated['idcard'],
            'address'=>$validated['address'],
            'phone'=>$validated['phone'],
            'email'=>$validated['email'],
        ]);
        return response()->json(['message' => 'Student update successfully' ,'data'=>$updatedata], 200);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request,MjuStudent $mjuStudent, $delete)
    {
       $deletedt = DB::table('mju_students')
       ->where('student_code',$delete)
       ->delete(); 
        return response()->json(
            [
                'message'=>'Student get successfully',
                'get Data by'=>'Pavanrat',
                'data'=>$deletedt
            ],
            200
        );
    }
}
