<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use App\Traits\Results;
use App\Http\Controllers\Controller;
use App\Models\Staff;
use App\Models\StudentAttendance;
use App\Models\TeacherAttendance;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScanController extends Controller
{
    use Results;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        switch (@$user->role) {
            case 'admin':
                return view('scan');
                break;
            case 'staff':
                return view('scan');
                break;
            }
        return responseError('You not authorized!',500);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $session_id = currentSession();
        $date = Carbon::now()->format('Y-m-d');
        $time = Carbon::now()->format('H:s');
        if($request->category=='students'){
            $students = Student::select(['id', 'roll_no', 'user_id', 'parent_id', 'session_id', 'class_id', 'section_id'])
                ->with('user:name,id,email')
                ->where('roll_no', $request->roll_no)
                ->first();

            $row['student_id'] = $students->id;
            $row['session_id'] = $session_id;
            $row['class_id'] = $students->class_id;
            $row['section_id'] = $students->section_id;
            $row['status'] = 1;
            $row['date'] = $date;
            $row['time'] = $time;
            $row['type'] = $request->type;

            $attendance = StudentAttendance::where('student_id', $students->id)
                ->where('date', $row['date'])
                ->where('type', $row['type'])
                ->first();

            if ($attendance) {
                $attendance->update(['status' => $row['status']]);
            } else {
                StudentAttendance::create($row);
            }
        } else {
            $teacher = Staff::select(['id', 'roll_no', 'user_id'])
            ->with('user:name,id,email')
            ->where('roll_no', $request->roll_no)
            ->first();
            // dd($teacher);
            $row['teacher_id'] = $teacher->id;
            $row['session_id'] = $session_id;
            $row['status'] = 1;
            $row['date'] = $date;
            $row['time'] = $time;
            $row['type'] = $request->type;

            $attendance = TeacherAttendance::where('teacher_id', $teacher->id)
                ->where('date', $row['date'])
                ->where('type', $row['type'])
                ->first();

            if ($attendance) {
                $data_update = [
                    'status' => $row['status'],
                    'time' => $row['time'],
                ];
                $attendance->update($data_update);
            } else {
                TeacherAttendance::create($row);
            }
        }

        return true;

        // User info
        // $user_data = $request->only('name', 'email', 'password');
        // $user_data['role'] = 'student';
        // $user_data['password'] = bcrypt(123456);
        // $user = User::create($user_data);
        // $user->assignRole('Student');

        // Student info
        // $student_data = $request->only('admission_date', 'class_id', 'section_id', 'roll_no', 'parent_id', 'gender');
        // $student_data['parent_id'] = $request->parent_id['id'];
        // $student_data['user_id'] = $user->id;
        // $student_data['session_id'] = currentSession();
        // $student = Student::create($student_data);

        // Mail Send
        // checkSetup() ? Mail::to($user->email)->send(new SendLoginCredentialMail($user, $request->password)) : '';

        // return responseSuccess('student', $student, 'Student create successfully');
    }

}
