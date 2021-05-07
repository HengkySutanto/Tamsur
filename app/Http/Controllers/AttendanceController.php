<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Session;
use App\Models\Student;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $firstDayOfMonth = Carbon::now()->firstOfMonth();
        $today = Carbon::now();

        $attendances = DB::table('students AS stud')
        ->select(['stud.name', 'att.session_id', 'att.student_id', 'att.attendance_date', 'att.status'])
        ->leftJoin('attendances AS att', 'stud.id' ,'=', 'att.student_id')
        ->whereBetween('att.attendance_date', [$firstDayOfMonth, $today])
        ->get()
        ->groupBy('student_id');
        // dd($attendances);
        $sessions = Session::whereBetween('session_date', [$firstDayOfMonth, $today])->get();
        return view('attendances.index', [
            'sessions' => $sessions,
            'attendances' => $attendances,
            ]);
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
    public function store(Student $student, Session $session, Request $request)
    {
        $students = $student->all();
        $distinctSessionId = array_unique($request->sessions);
        $activeSessions = $session->whereIn('id', $distinctSessionId)->get();
        // dd($request);
        
        foreach($activeSessions as $session) {
            if($request->input('session_id_'.$session->id) !== null){
                // foreach($request->input('session_id_'.$session->id) as $studentID) {
                    foreach($students as $student) {
                        if(in_array( $student->id , $request->input('session_id_'.$session->id))) {
                            if($request->input('session_id_'.$session->id.'_telat') !== null) {
                                if(in_array( $student->id , $request->input('session_id_'.$session->id.'_telat') )) {
                                    $attends = Attendance::updateOrCreate(
                                        [
                                            'session_id' => $session->id,
                                            'student_id' => $student->id,
                                            'attendance_date' => $session->session_date,
                                        ],
                                        [
                                            'status' => "telat",
                                        ]
                                    );
                                }else {
                                    $attends = Attendance::updateOrCreate(
                                        [
                                            'session_id' => $session->id,
                                            'student_id' => $student->id,
                                            'attendance_date' => $session->session_date,
                                        ],
                                        [
                                            'status' => "checked",
                                        ]
                                    );
                                }
                            }else {
                                $attends = Attendance::updateOrCreate(
                                    [
                                        'session_id' => $session->id,
                                        'student_id' => $student->id,
                                        'attendance_date' => $session->session_date,
                                    ],
                                    [
                                        'status' => "checked",
                                    ]
                                );
                            }
                        }else {
                            $attends = Attendance::updateOrCreate(
                                [
                                    'session_id' => $session->id,
                                    'student_id' => $student->id,
                                    'attendance_date' => $session->session_date,
                                ],
                                [
                                    'status' => "alpa",
                                ]
                            );
                        }

                    }
                // }
            }
        }
        
        return back()->with('success', 'data absensi berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
