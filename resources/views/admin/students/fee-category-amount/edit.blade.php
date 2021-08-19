@extends('layouts.admin.app')

@section('title')
Edit Fee Category Amount
@endsection

@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Edit Fee Category Amount</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Edit Fee Category Amount</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <div class="btn-group">
            <a href="{{ route('admin.student.fee_category_amount.index') }}" class="btn btn-primary">
                <span>
                    <i class="fadeIn animated bx bx-box font-22"></i>
                    Manage Fee Category Amount
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

        <form method="POST" action="{{ route('admin.student.fee_category_amount.update',$fee_category_amounts[0]->student_fee_category_id) }}">
            @csrf
            <div class="add_item">
                <div class="mb-3">
                    <label class="form-label">Fee Category:</label>
                    <select class="form-select @error('student_fee_category_id') is-invalid @enderror"
                        name="student_fee_category_id" aria-label="Default select example">
                        @foreach ($student_fee_categories as $student_fee_category)
                        <option value="{{ $student_fee_category->id }}" {{ $fee_category_amounts[0]->student_fee_category_id == $student_fee_category->id ? 'selected' : '' }}>{{ $student_fee_category->name }}</option>
                        @endforeach
                    </select>
                    @error('student_fee_category_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                @foreach ($fee_category_amounts as $fee_category_amount)
                <div class="delete_whole_extra_item_add" id="delete_whole_extra_item_add">
                    <div class="row">
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label class="form-label">Student Class:</label>
                                <select class="form-select @error('student_class_id') is-invalid @enderror"
                                    name="student_class_id[]" aria-label="Default select example">
                                    @foreach ($student_classes as $student_class)
                                    <option value="{{ $student_class->id }}" {{ $fee_category_amount->student_class_id == $student_class->id ? 'selected' : '' }}>{{ $student_class->name }}</option>
                                    @endforeach
                                </select>
                                @error('student_class_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label class="form-label">Amount</label>
                                <input type="number" name="amount[]"
                                    class="form-control @error('amount') is-invalid @enderror" value="{{ $fee_category_amount->amount }}">
                                @error('amount')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2" style="padding-top: 28px;">
                            <button type="button" class="btn btn-success addeventmore"><i
                                    class="bx bx-plus font-22"></i></button>
                            <button type="button" class="btn btn-danger removeeventmore"><i class="bx bx-minus font-22"></i></button>
                        </div>
                    </div>
                </div>
                @endforeach


            </div>



            <button class="btn btn-primary" type="submit">
                <span>
                    <i class="fadeIn animated bx bx-check font-22"></i>
                    Save Fee Category Amount
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
                <div class="col-md-5">
                    <div class="mb-3">
                        <label class="form-label">Student Class:</label>
                        <select class="form-select @error('student_class_id') is-invalid @enderror"
                            name="student_class_id[]" aria-label="Default select example">
                            @foreach ($student_classes as $student_class)
                            <option value="{{ $student_class->id }}">{{ $student_class->name }}</option>
                            @endforeach
                        </select>
                        @error('student_class_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="mb-3">
                        <label class="form-label">Amount</label>
                        <input type="number" name="amount[]" class="form-control @error('amount') is-invalid @enderror">
                        @error('amount')
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
                counter -= 1;
            });
        });
</script>
@endpush
@endsection
