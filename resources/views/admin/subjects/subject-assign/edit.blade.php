@extends('layouts.admin.app')

@section('title')
Create Subject Assign
@endsection

@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Create Fee Category Amount</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Create Subject Assign</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <div class="btn-group">
            <a href="{{ route('admin.subject.subject_assign.index') }}" class="btn btn-primary">
                <span>
                    <i class="fadeIn animated bx bx-box font-22"></i>
                    Manage Subject Assign
                </span>

            </a>
        </div>
    </div>
</div>

@if (session()->has('success'))
<div class="alert alert-success border-0 bg-success alert-dismissible fade show py-2">
    <div class="d-flex align-items-center">
        <div class="font-35 text-white"><i class="bx bxs-check-circle"></i>
        </div>
        <div class="ms-3">
            <h6 class="mb-0 text-white">Successful</h6>
            <div class="text-white">{{ session('success') }}</div>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


@if (session()->has('error'))
<div class="alert alert-danger border-0 bg-danger alert-dismissible fade show py-2">
    <div class="d-flex align-items-center">
        <div class="font-35 text-white"><i class="bx bxs-message-square-x"></i>
        </div>
        <div class="ms-3">
            <h6 class="mb-0 text-white">Danger Alerts</h6>
            <div class="text-white">{{ session('error') }}</div>
        </div>
    </div>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

<div class="card">
    <div class="card-body">

        <form method="POST" action="{{ route('admin.subject.subject_assign.update',$subject_assigns[0]->student_class_id) }}">
            @csrf
            <div class="add_item">
                <div class="mb-3">
                    <label class="form-label">Student Class:</label>
                    <select class="form-select @error('student_class_id') is-invalid @enderror" name="student_class_id"
                        aria-label="Default select example">
                        @foreach ($student_classes as $student_class)
                        <option value="{{ $student_class->id }}" {{ $subject_assigns[0]->student_class_id == $student_class->id ? 'selected' : ''}}>{{ $student_class->name }}</option>
                        @endforeach
                    </select>
                    @error('student_class_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>


                @foreach ($subject_assigns as $subject_assign)
                <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Subject Name:</label>
                                <select class="form-select @error('subject_id') is-invalid @enderror" name="subject_id[]"
                                    aria-label="Default select example">
                                    @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}" {{ $subject->id == $subject_assign->subject_id ? 'selected' : '' }}>{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                                @error('subject_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Subject Code</label>
                                <input type="number" name="subject_code[]"
                                    class="form-control @error('subject_code') is-invalid @enderror" value="{{ $subject_assign->subject_code }}">
                                @error('subject_code')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Full Mark</label>
                                <input type="number" name="full_mark[]"
                                    class="form-control @error('full_mark') is-invalid @enderror" value="{{ $subject_assign->full_mark }}">
                                @error('full_mark')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Pass Mark</label>
                                <input type="number" name="pass_mark[]"
                                    class="form-control @error('pass_mark') is-invalid @enderror" value="{{ $subject_assign->pass_mark }}">
                                @error('pass_mark')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Subjective Mark</label>
                                <input type="number" name="subjective_mark[]"
                                    class="form-control @error('subjective_mark') is-invalid @enderror" value="{{ $subject_assign->subjective_mark }}">
                                @error('subjective_mark')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2" style="padding-top: 28px;">
                            <button type="button" class="btn btn-success addeventmore"><i
                                    class="bx bx-plus font-22"></i></button>
                            <button type="button" class="btn btn-danger removeeventmore"><i
                                    class="bx bx-minus font-22"></i></button>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>



            <button class="btn btn-primary" type="submit">
                <span>
                    <i class="fadeIn animated bx bx-check font-22"></i>
                    Save Subject Assign
                </span>
            </button>
        </form>
    </div>
</div>

{{-- create repertar html content --}}
<div style="visibility: hidden;">
    <div class="whole_extra_item_add" id="whole_extra_item_add">
        <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
            <div class="row">
                <div class="col-md-2">
                    <div class="mb-3">
                        <label class="form-label">Subject Name:</label>
                        <select class="form-select @error('subject_id') is-invalid @enderror" name="subject_id[]"
                            aria-label="Default select example">
                            @foreach ($subjects as $subject)
                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                            @endforeach
                        </select>
                        @error('subject_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-3">
                        <label class="form-label">Subject Code</label>
                        <input type="number" name="subject_code[]"
                            class="form-control @error('subject_code') is-invalid @enderror">
                        @error('subject_code')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="mb-3">
                        <label class="form-label">Full Mark</label>
                        <input type="number" name="full_mark[]"
                            class="form-control @error('full_mark') is-invalid @enderror">
                        @error('full_mark')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="mb-3">
                        <label class="form-label">Pass Mark</label>
                        <input type="number" name="pass_mark[]"
                            class="form-control @error('pass_mark') is-invalid @enderror">
                        @error('pass_mark')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="mb-3">
                        <label class="form-label">Subjective Mark</label>
                        <input type="number" name="subjective_mark[]"
                            class="form-control @error('subjective_mark') is-invalid @enderror">
                        @error('subjective_mark')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-2" style="padding-top: 28px;">
                    <button type="button" class="btn btn-success addeventmore"><i
                            class="bx bx-plus font-22"></i></button>
                    <button type="button" class="btn btn-danger removeeventmore"><i
                            class="bx bx-minus font-22"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('script')
<script>
    $(document).ready(function(){
            var counter = 0;
            $(document).on('click','.addeventmore',function(){
                var whole_extra_item_add = $('#whole_extra_item_add').html();
                $(this).closest('.add_item').append(whole_extra_item_add);
                counter++;
            });

            $(document).on('click','.removeeventmore',function(){
                $(this).closest('.delete_whole_extra_item_add').remove();
                counter--;
            });
        });
</script>
@endpush
@endsection
