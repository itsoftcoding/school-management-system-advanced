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
                <li class="breadcrumb-item active" aria-current="page">Fee Category Name : <b>{{ ucfirst($fee_category_amounts[0]->studentFeeCategory->name) }}</b></li>
            </ol>
        </nav>
    </div>
    <div class="ms-auto">
        <div class="btn-group">
            <a href="{{ route('admin.student.fee_category_amount.create') }}" class="btn btn-primary">
                <span>
                    <i class="fadeIn animated bx bx-plus font-22"></i>
                    Create Fee Category Amount
                </span>

            </a>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h3 class="card-title mb-3">Fee Category Name : <b>{{ ucfirst($fee_category_amounts[0]->studentFeeCategory->name) }}</b></h3>
        <div class="table-responsive">
            <table id="example2" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Class Name</th>
                        <th>Amount</th>
                        <th>Created Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fee_category_amounts as $key => $fee_category_amount)

                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $fee_category_amount->studentClass->name }}</td>
                        <td>{{ $fee_category_amount->amount }}</td>
                        <td>{{ $fee_category_amount->created_at == 'null' ? 'Date Not Found' : $fee_category_amount->created_at->diffForHumans() }}

                        {{-- <td>{{ $fee_category_amount->updated_at == 'null' ? 'Date Not Found' : $fee_category_amount->updated_at->diffForHumans() }}
                        --}}
                        </td>
                        <td>
                            {{-- <a href="{{ route('admin.student.fee_category_amount.show',$fee_category_amount->student_fee_category_id) }}"
                                class="btn btn-primary">Show</a> --}}
                            <button>Edit</button>
                            <button>Delete</button>
                        </td>
                    </tr>

                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Class name</th>
                        <th>Amount</th>
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
