<div>
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

                            <td>
                                <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-outline-dark border-0" wire:click="show({{$fee_category_amount->student_fee_category_id}})" data-bs-toggle="modal" data-bs-target="#showLargeModal"><i class="bx bx-show text-primary"></i></button>
                                <button type="button" class="btn btn-sm btn-outline-dark border-0" wire:click="edit({{$fee_category_amount->student_fee_category_id}})" data-bs-toggle="modal" data-bs-target="#editLargeModal"><i class="bx bx-edit-alt text-warning"></i></button>
                                <button type="" class="btn btn-sm btn-outline-dark border-0"><i class="bx bx-trash text-danger"></i></button>
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

    {{-- show modal --}}
    <div class="modal fade" wire:ignore.self id="showLargeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        @if ($show_fee_category_amounts != [] || $show_fee_category_amounts != null)
                        Fee Category Name : <b>{{ ucfirst($show_fee_category_amounts[0]->studentFeeCategory->name) }}</b>
                        @endif
                    </h5>
                    <button type="button" class="btn-close"  data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($show_fee_category_amounts != [] || $show_fee_category_amounts != null)
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
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
                                @foreach ($show_fee_category_amounts as $show_fee_category_amount)

                                <tr>
                                    <td>[]</td>
                                    <td>{{ $show_fee_category_amount->studentClass->name }}</td>
                                    <td>{{ $show_fee_category_amount->amount }}</td>
                                    <td>{{ $show_fee_category_amount->created_at == 'null' ? 'Date Not Found' : $show_fee_category_amount->created_at->diffForHumans() }}
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
                                    <th>Class name</th>
                                    <th>Amount</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="$set('show_fee_category_amounts',[])" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- edit modal --}}
    <div class="modal fade" wire:ignore.self id="editLargeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        @unless ($edit_category_amounts == NULL || $edit_category_amounts == 'NULL' || empty($edit_category_amounts))
                        Fee Category Name : <b>{{ ucfirst($edit_category_amounts[0]->studentFeeCategory->name) }}</b>
                        @endunless
                    </h5>
                    <button type="button" wire:click="$set('edit_category_amounts',[])" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($edit_category_amounts != [] || $edit_category_amounts != null)
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

                            <form method="POST" wire:submit.prevent="save">
                                @csrf
                                <div class="add_item">
                                    <div class="mb-3">
                                        <label class="form-label">Fee Category:</label>
                                        <select disabled
                                            class="form-select @error('edit_category_amounts.0.student_fee_category_id') is-invalid @enderror"
                                            wire:model="edit_category_amounts.0.student_fee_category_id"
                                            aria-label="Default select example">
                                            <option selected>Choose Fee Category</option>
                                            @foreach ($student_fee_categories as $student_fee_category)
                                            <option value="{{ $student_fee_category->id }}">{{ $student_fee_category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('edit_category_amounts.0.student_fee_category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    @if ($edit_category_amounts != [] || $edit_category_amounts != null)
                                    @foreach ($edit_category_amounts as $index => $edit_category_amount)
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label class="form-label">Student Class:</label>
                                                <select
                                                    class="form-select @error('edit_category_amounts.{{$index}}.student_class_id') is-invalid @enderror"
                                                    wire:model="edit_category_amounts.{{$index}}.student_class_id"
                                                    aria-label="Default select example">
                                                    <option>Choose Student Class</option>
                                                    @foreach ($student_classes as $student_class)
                                                    <option value="{{ $student_class->id }}">{{ $student_class->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('edit_category_amounts.{{$index}}.student_class_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label class="form-label">Amount</label>
                                                <input type="text" wire:model.lazy="edit_category_amounts.{{$index}}.amount"
                                                    class="form-control @error('edit_category_amounts.{{$index}}.amount') is-invalid @enderror">
                                                @error('edit_category_amounts.{{$index}}.amount')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-2" style="padding-top: 28px;">
                                            {{-- <button type="button" wire:click.prevent="add({{$repeter}})"
                                                class="btn btn-success addeventmore"><i class="bx bx-plus font-22"></i></button> --}}
                                            <button type="button" class="btn btn-danger"
                                                                                    wire:click="$set('delete_id',{{ $edit_category_amount->id }})" data-bs-toggle="modal"
                                                                                    data-bs-target="#deleteLargeModal"><i class="bx bx-minus"></i></button>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif


                                    {{-- @foreach ($inputs as $key => $value)
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label class="form-label">Student Class:</label>
                                                <select class="form-select @error('student_class_id') is-invalid @enderror"
                                                    wire:model="student_class_id.{{$value}}" aria-label="Default select example">
                                                    @foreach ($student_classes as $student_class)
                                                    <option value="{{ $student_class->id }}">{{ $student_class->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('student_class_id.{{$value}}')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="mb-3">
                                                <label class="form-label">Amount</label>
                                                <input type="number" wire:model="amount.{{$value}}"
                                                    class="form-control @error('amount') is-invalid @enderror">
                                                @error('amount.{{$value}}')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-2" style="padding-top: 28px;">
                                            <button type="button" wire:click.prevent="remove({{$key}},{{$value}})"
                                                class="btn btn-danger addeventmore"><i class="bx bx-minus font-22"></i></button>
                                        </div>
                                    </div>
                                    @endforeach --}}


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
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="$set('edit_category_amounts',[])" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- delete modal --}}
    <div class="modal fade" wire:ignore.self id="deleteLargeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                   <h2 class="text-center text-danger">Be Curful, It it Danger.Nothing restore again. Are You Sure Remove This Item?</h2>
                   <button class="btn btn-danger" wire:click="delete({{$edit_category_amounts[0]->student_fee_category_id ?? ''}})">Yes</button>
                   <button class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close" wire:click="$set('delete_id',null)">No</button>
                </div>
            </div>
        </div>
    </div>
</div>
