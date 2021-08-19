<div>
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
                                    <button type="button" class="btn btn-sm btn-outline-dark border-0" wire:click="show({{$subject_assign->student_class_id}})" data-bs-toggle="modal" data-bs-target="#showLargeModal"><i class="bx bx-show text-primary"></i></button>
                                    <button type="button" class="btn btn-sm btn-outline-dark border-0" wire:click="edit({{$subject_assign->student_class_id}})" data-bs-toggle="modal" data-bs-target="#editLargeModal"><i class="bx bx-edit-alt text-warning"></i></button>
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

    {{-- show modal --}}
    <div class="modal fade" wire:ignore.self id="showLargeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        @if ($show_subject_assigns != [] || $show_subject_assigns != null)
                        Class Name : <b>{{ ucfirst($show_subject_assigns[0]->studentClass->name) }}</b>
                        @endif
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($show_subject_assigns != [] || $show_subject_assigns != null)
                    <div class="table-responsive">
                        <table  class="table table-striped table-bordered">
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
                                @foreach ($show_subject_assigns as $show_subject_assign)

                                <tr>
                                    <td></td>
                                    <td>{{ $show_subject_assign->subject->name }}</td>
                                    <td>{{ $show_subject_assign->subject_code }}</td>
                                    <td>{{ $show_subject_assign->full_mark }}</td>
                                    <td>{{ $show_subject_assign->pass_mark }}</td>
                                    <td>{{ $show_subject_assign->subjective_mark }}</td>
                                    <td>{{ $show_subject_assign->created_at == 'null' ? 'Date Not Found' : $show_subject_assign->created_at->diffForHumans() }}
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
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="$set('show_subject_assigns',[])" class="btn btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- show modal --}}
    <div class="modal fade" wire:ignore.self id="editLargeModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">
                        @if ($edit_subject_assigns != [] || $edit_subject_assigns != null)
                        Class Name : <b>{{ ucfirst($edit_subject_assigns[0]->studentClass->name) }}</b>
                        @endif
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if ($edit_subject_assigns != [] || $edit_subject_assigns != null)
                    <form method="POST" wire:submit.prevent="save">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Student Class:</label>
                            <select disabled class="form-select @error('edit_subject_assigns.0.student_class_id') is-invalid @enderror" wire:model="edit_subject_assigns.0.student_class_id"
                                aria-label="Default select example">
                                <option selected>Choose Student Class</option>
                                @foreach ($student_classes as $student_class)
                                <option value="{{ $student_class->id }}">{{ $student_class->name }}</option>
                                @endforeach
                            </select>
                            @error('edit_subject_assigns.0.student_class_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>


                        @foreach ($edit_subject_assigns as $index => $edit_subject_assign)

                        <div class="row">
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label">Subject Name:</label>
                                    <select class="form-select @error('edit_subject_assigns.{{$index}}.subject_id') is-invalid @enderror" wire:model="edit_subject_assigns.{{$index}}.subject_id"
                                        aria-label="Default select example">
                                        <option selected>Choose Subject</option>
                                        @foreach ($subjects as $subject)
                                        <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('edit_subject_assigns.{{$index}}.subject_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label">Subject Code</label>
                                    <input type="number" wire:model.lazy="edit_subject_assigns.{{$index}}.subject_code"
                                        class="form-control @error('edit_subject_assigns.{{$index}}.subject_code') is-invalid @enderror">
                                    @error('edit_subject_assigns.{{$index}}.subject_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label">Full Mark</label>
                                    <input type="number" wire:model.lazy="edit_subject_assigns.{{$index}}.full_mark"
                                        class="form-control @error('edit_subject_assigns.{{$index}}.full_mark') is-invalid @enderror">
                                    @error('edit_subject_assigns.{{$index}}.full_mark')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label">Pass Mark</label>
                                    <input type="number" wire:model.lazy="edit_subject_assigns.{{$index}}.pass_mark"
                                        class="form-control @error('edit_subject_assigns.{{$index}}.pass_mark') is-invalid @enderror">
                                    @error('edit_subject_assigns.{{$index}}.pass_mark')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label class="form-label">Subjective Mark</label>
                                    <input type="number" wire:model.lazy="edit_subject_assigns.{{$index}}.subjective_mark"
                                        class="form-control @error('edit_subject_assigns.{{$index}}.subjective_mark') is-invalid @enderror">
                                    @error('edit_subject_assigns.{{$index}}.subjective_mark')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2" style="padding-top: 28px;">
                                <button type="button" class="btn btn-danger" wire:click="$set('delete_id',{{ $edit_subject_assign->id }})"
                                    data-bs-toggle="modal" data-bs-target="#deleteLargeModal"><i class="bx bx-minus"></i></button>
                            </div>
                        </div>

                        @endforeach

                        <button class="btn btn-primary" wire:loading.attr="disabled" wire:target="save" type="submit">
                            <div wire:loading wire:target="save">
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
                                </span>
                                Loading...
                            </div>
                            <span wire:loading.remove wire:target="save">
                                <i class="fadeIn animated bx bx-user-check font-22"></i>
                                Save Subject Assign
                            </span>
                        </button>
                    </form>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" wire:click="$set('edit_subject_assigns',[])" class="btn btn-secondary"
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
                        @if($delete_id > 0)
                        <h2 class="text-center text-danger">Be Curful, It it Danger.Nothing restore again. Are You Sure Remove
                            This Item?</h2>
                        <button class="btn btn-danger"
                            wire:click="delete({{$edit_subject_assigns[0]->student_class_id ?? ''}})">Yes</button>
                        <button class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close"
                            wire:click="$set('delete_id',null)">No</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>


</div>
