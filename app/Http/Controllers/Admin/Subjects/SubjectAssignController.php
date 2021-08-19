<?php

namespace App\Http\Controllers\Admin\Subjects;

use Illuminate\Http\Request;
use App\Models\Admin\Subject;
use App\Http\Controllers\Controller;
use App\Models\Admin\SubjectAssign;
use App\Models\Students\StudentClass;

class SubjectAssignController extends Controller
{
    public function index()
    {
        $subject_assigns = SubjectAssign::with('studentClass')->select('student_class_id')->groupBy('student_class_id')->get();
        return view('admin.subjects.subject-assign.index',compact('subject_assigns'));
    }


    public function create()
    {
        $subjects = Subject::latest()->get();
        $student_classes = StudentClass::latest()->get();
        return view('admin.subjects.subject-assign.create',compact('subjects','student_classes'));
    }


    public function store(Request $request)
    {
        // return $request->all();
        $countSubject = count($request->subject_id);
        if ($countSubject != null) {
            for ($i=0; $i < $countSubject; $i++) {
                $subject_assign = new SubjectAssign();
                $subject_assign->student_class_id = $request->student_class_id;
                $subject_assign->subject_id = $request->subject_id[$i];
                $subject_assign->subject_code = $request->subject_code[$i];
                $subject_assign->full_mark = $request->full_mark[$i];
                $subject_assign->pass_mark = $request->pass_mark[$i];
                $subject_assign->subjective_mark = $request->subjective_mark[$i];
                $subject_assign->save();
            }
        }else{
            return back()->with('error','Please Select Latest one Subject!');
        }

        return back()->with('success','Subject Assign Successfully Completed!');
    }


    public function show($id)
    {
        $subject_assigns = SubjectAssign::where('student_class_id',$id)->get();
        // $subject_assigns = StudentClass::find($id)->subjectAssigns()->get();
        // return $subject_assigns;
        return view('admin.subjects.subject-assign.show',compact('subject_assigns'));
    }


    public function edit($id)
    {
        $subject_assigns = SubjectAssign::where('student_class_id', $id)->get();
        $subjects = Subject::latest()->get();
        $student_classes = StudentClass::latest()->get();
        return view('admin.subjects.subject-assign.edit', compact('subject_assigns','subjects','student_classes'));
    }




    public function update($id,Request $request)
    {
        // return $request->all();
        if ($request->subject_id != null) {
            SubjectAssign::where('student_class_id', $id)->delete();
            $countSubject = count($request->subject_id);
            if ($countSubject != null) {
                for ($i = 0; $i < $countSubject; $i++) {
                    $subject_assign = new SubjectAssign();
                    $subject_assign->student_class_id = $request->student_class_id;
                    $subject_assign->subject_id = $request->subject_id[$i];
                    $subject_assign->subject_code = $request->subject_code[$i];
                    $subject_assign->full_mark = $request->full_mark[$i];
                    $subject_assign->pass_mark = $request->pass_mark[$i];
                    $subject_assign->subjective_mark = $request->subjective_mark[$i];
                    $subject_assign->save();
                }
            } else {
                return back()->with('error', 'Please Select Latest one Subject!');
            }
        }else{
            return back()->with('error', 'Please Select Latest one Subject!');

        }


        return back()->with('success', 'Subject Assign Successfully Completed!');
    }
}
