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

            <form method="POST" wire:submit.prevent="save">
                @csrf

                    <div class="mb-3">
                        <label class="form-label">Student Class:</label>
                        <select class="form-select @error('student_class_id') is-invalid @enderror" wire:model="student_class_id"
                            aria-label="Default select example">
                            <option selected>Choose Student Class</option>
                            @foreach ($student_classes as $student_class)
                            <option value="{{ $student_class->id }}">{{ $student_class->name }}</option>
                            @endforeach
                        </select>
                        @error('student_class_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="row">
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Subject Name:</label>
                                <select class="form-select @error('subject_id.0') is-invalid @enderror" wire:model="subject_id.0"
                                    aria-label="Default select example">
                                    <option selected>Choose Subject</option>
                                    @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                                @error('subject_id.0')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Subject Code</label>
                                <input type="number" wire:model.lazy="subject_code.0"
                                    class="form-control @error('subject_code.0') is-invalid @enderror">
                                @error('subject_code.0')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Full Mark</label>
                                <input type="number" wire:model.lazy="full_mark.0"
                                    class="form-control @error('full_mark.0') is-invalid @enderror">
                                @error('full_mark.0')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Pass Mark</label>
                                <input type="number" wire:model.lazy="pass_mark.0"
                                    class="form-control @error('pass_mark.0') is-invalid @enderror">
                                @error('pass_mark.0')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Subjective Mark</label>
                                <input type="number" wire:model.lazy="subjective_mark.0"
                                    class="form-control @error('subjective_mark.0') is-invalid @enderror">
                                @error('subjective_mark.0')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2" style="padding-top: 28px;">
                            <button type="button" wire:click.prevent="add({{$repeter}})" class="btn btn-success addeventmore"><i
                                    class="bx bx-plus font-22"></i></button>
                        </div>
                    </div>


                    @foreach ($inputs as $key => $value)

                    <div class="row">
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Subject Name:</label>
                                <select class="form-select @error('subject_id.{{$value}}') is-invalid @enderror" wire:model="subject_id.{{$value}}"
                                    aria-label="Default select example">
                                    <option selected>Choose Subject</option>
                                    @foreach ($subjects as $subject)
                                    <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                    @endforeach
                                </select>
                                @error('subject_id.{{$value}}')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Subject Code</label>
                                <input type="number" wire:model.lazy="subject_code.{{$value}}" class="form-control @error('subject_code.{{$value}}') is-invalid @enderror">
                                @error('subject_code.{{$value}}')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Full Mark</label>
                                <input type="number" wire:model.lazy="full_mark.{{$value}}" class="form-control @error('full_mark.{{$value}}') is-invalid @enderror">
                                @error('full_mark.{{$value}}')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Pass Mark</label>
                                <input type="number" wire:model.lazy="pass_mark.{{$value}}" class="form-control @error('pass_mark.{{$value}}') is-invalid @enderror">
                                @error('pass_mark.{{$value}}')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mb-3">
                                <label class="form-label">Subjective Mark</label>
                                <input type="number" wire:model.lazy="subjective_mark.{{$value}}"
                                    class="form-control @error('subjective_mark.{{$value}}') is-invalid @enderror">
                                @error('subjective_mark.{{$value}}')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2" style="padding-top: 28px;">
                            <button type="button" wire:click.prevent="remove({{$key}},{{$value}})" class="btn btn-danger addeventmore"><i
                                    class="bx bx-minus font-22"></i></button>
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
        </div>
    </div>
</div>
