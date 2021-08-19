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
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Student Name:</label>
                            <input type="search" wire:model.lazy="name" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Father Name:</label>
                            <input type="search" wire:model.lazy="fname" class="form-control @error('fname') is-invalid @enderror">
                            @error('fname')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Mother Name:</label>
                            <input type="search" wire:model.lazy="mname" class="form-control @error('mname') is-invalid @enderror">
                            @error('mname')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Email:</label>
                            <input type="email" wire:model.lazy="email" class="form-control @error('email') is-invalid @enderror"
                                placeholder="example@gmail.com">
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="number" wire:model.lazy="phone" class="form-control @error('phone') is-invalid @enderror"
                                placeholder="">
                            @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Address:</label>
                            <input type="text" wire:model.lazy="address" class="form-control @error('address') is-invalid @enderror"
                                placeholder="">
                            @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Gender</label>
                            <select class="form-select @error('gender') is-invalid @enderror" wire:model="gender"
                                aria-label="Default select example">

                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            @error('gender')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Date Of Birth</label>
                            <input type="date" wire:model.lazy="dob" class="form-control @error('dob') is-invalid @enderror"
                                placeholder="">
                            @error('dob')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Religion</label>
                            <input type="text" wire:model.lazy="religion" class="form-control @error('religion') is-invalid @enderror"
                                placeholder="">
                            @error('religion')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Year</label>
                            <select class="form-select @error('student_year') is-invalid @enderror" wire:model="student_year"
                                aria-label="Default select example">

                                <option>Choose Year</option>
                                @foreach ($student_years as $student_year)
                                    <option value="{{$student_year->id}}">{{ $student_year->name }}</option>
                                @endforeach
                            </select>
                            @error('student_year')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Class</label>
                            <select class="form-select @error('student_class') is-invalid @enderror" wire:model="student_class"
                                aria-label="Default select example">

                                <option>Choose Class</option>
                                @foreach ($student_classes as $student_class)
                                    <option value="{{$student_class->id}}">{{ $student_class->name }}</option>
                                @endforeach
                            </select>
                            @error('student_class')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Group</label>
                            <select class="form-select @error('student_group') is-invalid @enderror" wire:model="student_group"
                                aria-label="Default select example">

                                <option>Choose Group</option>
                                @foreach ($student_groups as $student_group)
                                    <option value="{{$student_group->id}}">{{$student_group->name}}</option>
                                @endforeach
                            </select>
                            @error('student_group')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>


                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Shift</label>
                            <select class="form-select @error('student_shift') is-invalid @enderror" wire:model="student_shift"
                                aria-label="Default select example">

                                <option>Choose Shift</option>
                                @foreach ($student_shifts as $student_shift)
                                    <option value="{{$student_shift->id}}">{{ $student_shift->name }}</option>
                                @endforeach
                            </select>
                            @error('student_shift')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Discount</label>
                            <input type="number" wire:model.lazy="discount" class="form-control @error('discount') is-invalid @enderror"
                                placeholder="">
                            @error('discount')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Profile Pic</label>
                            <input type="file" wire:model.lazy="profile_pic" class="form-control @error('profile_pic') is-invalid @enderror"
                                placeholder="">
                            @error('profile_pic')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                </div>




                <button class="btn btn-primary" wire:loading.attr="disabled" wire:target="save" type="submit">
                    <div wire:loading wire:target="save">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
                        </span>
                        Loading...
                    </div>
                    <span wire:loading.remove wire:target="save">
                        <i class="fadeIn animated bx bx-user-check font-22"></i>
                        Save Student
                    </span>
                </button>
            </form>
        </div>
    </div>
</div>
