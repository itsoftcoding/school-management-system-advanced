@extends('layouts.admin.app')

@section('title')
Manage Subject Assign
@endsection

@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Subject Assign</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Subject Assign</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <div class="btn-group">
            <a href="{{ route('admin.subject.subject_assign.create') }}" class="btn btn-primary">
                <span>
                    <i class="fadeIn animated bx bx-plus font-22"></i>
                    Create Subject Assign
                </span>

            </a>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table id="example2" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Class Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subject_assigns as $key => $subject_assign)

                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $subject_assign->studentClass->name }}</td>
                        </td>
                        <td>
                            <div class="btn btn-group">
                                <a href="{{ route('admin.subject.subject_assign.show',$subject_assign->student_class_id) }}" class="btn btn-outline-dark border-0"><i class="bx bx-show text-primary"></i></a>
                                <a href="{{ route('admin.subject.subject_assign.edit',$subject_assign->student_class_id) }}" class="btn btn-outline-dark border-0"><i class="bx bx-edit-alt text-warning"></i></a>
                                <button class="btn btn-outline-dark border-0"><i class="bx bx-trash text-danger"></i></button>
                            </div>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Class name</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
