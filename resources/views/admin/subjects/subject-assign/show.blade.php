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
                <li class="breadcrumb-item active" aria-current="page">Class Name : <b>{{ ucfirst($subject_assigns[0]->studentClass->name) }}</b></li>
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
        <h3 class="card-title mb-3">Class Name : <b>{{ ucfirst($subject_assigns[0]->studentClass->name) }}</b>
                </h3>
        <div class="table-responsive">
            <table id="example2" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Subject Name</th>
                        <th>Subject Code</th>
                        <th>Full Mark</th>
                        <th>Pass Mark</th>
                        <th>Subjective Mark</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subject_assigns as $key => $subject_assign)

                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $subject_assign->subject->name }}</td>
                        <td>{{ $subject_assign->subject_code }}</td>
                        <td>{{ $subject_assign->full_mark }}</td>
                        <td>{{ $subject_assign->pass_mark }}</td>
                        <td>{{ $subject_assign->subjective_mark }}</td>
                        <td>{{ $subject_assign->created_at == 'null' ? 'Date Not Found' : $subject_assign->created_at->diffForHumans() }}

                        {{-- <td>{{ $subject_assign->updated_at == 'null' ? 'Date Not Found' : $subject_assign->updated_at->diffForHumans() }}
                        --}}
                        </td>
                        <td>
                            <button>Edit</button>
                            <button>Delete</button>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Subject Name</th>
                        <th>Subject Code</th>
                        <th>Full Mark</th>
                        <th>Pass Mark</th>
                        <th>Subjective Mark</th>
                        <th>Created Date</th>
                        {{-- <th>Updated Date</th> --}}
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
