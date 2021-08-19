@extends('layouts.admin.app')

@section('title')
   Manage Fee Category Amount
@endsection

@section('content')
<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Fee Category Amount</div>
    <div class="ps-3">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">Fee Category Amount</li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <div class="btn-group">
            <a href="{{ route('admin.student.fee_category_amount.create') }}"
                class="btn btn-primary">
                <span >
                    <i class="fadeIn animated bx bx-plus font-22"></i>
                    Create Fee Category Amount
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
                        <th>Fee Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fee_category_amounts as $key => $fee_category_amount)

                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $fee_category_amount->studentFeeCategory->name }}</td>
                        </td>
                        <td>
                            <div class="btn-group">
                                <a href="{{ route('admin.student.fee_category_amount.show',$fee_category_amount->student_fee_category_id) }}" class="btn btn-outline-dark border-0"><i class="bx bx-show text-primary"></i></a>
                                <a href="{{ route('admin.student.fee_category_amount.edit',$fee_category_amount->student_fee_category_id) }}" class="btn btn-outline-dark border-0"><i class="bx bx-edit-alt text-warning"></i></a>
                                <button class="btn btn-outline-dark border-0"><i class="bx bx-trash text-danger"></i></button>
                            </div>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Fee Category name</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection
