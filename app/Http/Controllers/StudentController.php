<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Database\Seeders\StudentSeeder;
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
        
        $students = Student::orderBy('geup', 'DESC')->orderBy('created_at', 'DESC')->paginate(10);

        return view('members.index', [
            'students' => $students,
        ]);
    }
    
    public function filter(Request $request)
    {
        $sortByGeup = $request->geup;
        $perPage = $request->per_page ? $request->per_page : '10';
        if((int)$perPage > 30) {
            return view('error');
        }
        $search = $request->search;
        if($search) {
            // dd($search);
            $students = Student::when($search, function ($query, $search) {
                // return $query->whereLike(['name', 'address', 'phone', 'place_of_birth', 'date_of_birth', 'reg_number', 'status'], $search)
                return $query->whereRaw("name LIKE ?", ['%' . $search . '%'])
                            ->orWhereRaw("reg_number LIKE ?", ['%' . $search . '%'])
                            ->orWhereRaw("place_of_birth LIKE ?", ['%' . $search . '%'])
                            ->orderBy('geup', 'DESC')->orderBy('created_at', 'DESC');
            }, function ($query) {
                return $query->orderBy('geup', 'DESC')->orderBy('created_at', 'DESC');
            })->paginate($perPage)->appends(request()->query());
        }else {
            $students = Student::when($sortByGeup, function ($query, $sortByGeup) {
                return $query->where('geup', $sortByGeup)->orderBy('geup', 'DESC')->orderBy('created_at', 'DESC');
            }, function ($query) {
                return $query->orderBy('geup', 'DESC')->orderBy('created_at', 'DESC');
            })->paginate($perPage)->appends(request()->query());
        }

        return view('members.index', [
            'students' => $students,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('members.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $input = $request->all();

        if ($image = $request->file('photo')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['photo'] = "$profileImage";
        }

        Student::create($input);

        return redirect()->route('members')
                        ->with('success','Member Berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        // dd($student->attendances);
        $studentAttendances= [];
        // foreach($students as $student) {
            
            $countSessions = $student->attendances->count();
            $total_alpa = 0;
            $total_telat = 0;
            foreach($student->attendances as $attendance) {
                if ($attendance->status == 'alpa') {
                    $total_alpa = $total_alpa + 1;
                }
                
                if ($attendance->status == 'telat') {
                    $total_telat = $total_telat + 1;
                }
            };

            $studentReports = (object) [
                'name' => $student->name,
                'jumlah_sesi_latihan' => $countSessions,
                'total_alpa' => $total_alpa,
                'total_telat' => $total_telat,
                'persen_kehadiran' => round(($countSessions - $total_alpa) / $countSessions * 100, 2),
                'persen_telat' => round($total_telat / $countSessions * 100, 2),
              ];
            array_push($studentAttendances, $studentReports);
        // }
        // dd($studentAttendances);
        return view('members.show',compact('student', 'studentAttendances'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('members.edit',compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $input = $request->all();

        if ($image = $request->file('photo')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            
            $image_path = public_path(). "/" . $destinationPath . $student->photo;
            if(is_file($image_path)) {
                unlink($image_path);
            }
            
            $input['photo'] = "$profileImage";
        }else {
            unset($input['photo']);
        }

        $updateSuccess = $student->update($input);
        if($updateSuccess) {
            return redirect()->route('members')
                            ->with('success','Data Member Berhasil Diubah.');
        }else {
            return back()
                   ->with('failed','Maaf, Terjadi Kesalahan.');;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
  
        $destinationPath = 'images/';
        $image_path = public_path(). "/" . $destinationPath . $student->photo;
        if(is_file($image_path)) {
            unlink($image_path);
        }
        return redirect()->route('members')
                        ->with('success','Member berhasil dihapus');
    }
}
