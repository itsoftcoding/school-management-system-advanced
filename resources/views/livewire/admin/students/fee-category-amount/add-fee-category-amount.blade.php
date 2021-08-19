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
                <div class="add_item">
                    <div class="mb-3">
                        <label class="form-label">Fee Category:</label>
                        <select class="form-select @error('student_fee_category_id') is-invalid @enderror"
                            wire:model="student_fee_category_id" aria-label="Default select example">
                            <option selected>Choose Fee Category</option>
                            @foreach ($student_fee_categories as $student_fee_category)
                            <option value="{{ $student_fee_category->id }}">{{ $student_fee_category->name }}</option>
                            @endforeach
                        </select>
                        @error('student_fee_category_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="row">
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label class="form-label">Student Class:</label>
                                <select class="form-select @error('student_class_id.0') is-invalid @enderror"
                                    wire:model="student_class_id.0" aria-label="Default select example">
                                    <option>Choose Student Class</option>
                                    @foreach ($student_classes as $student_class)
                                    <option value="{{ $student_class->id }}">{{ $student_class->name }}</option>
                                    @endforeach
                                </select>
                                @error('student_class_id.0')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label class="form-label">Amount</label>
                                <input type="number" wire:model="amount.0"
                                    class="form-control @error('amount.0') is-invalid @enderror">
                                @error('amount.0')
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
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label class="form-label">Student Class:</label>
                                <select class="form-select @error('student_class_id') is-invalid @enderror" wire:model="student_class_id.{{$value}}"
                                    aria-label="Default select example">
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
                                <input type="number" wire:model="amount.{{$value}}" class="form-control @error('amount') is-invalid @enderror">
                                @error('amount.{{$value}}')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-2" style="padding-top: 28px;">
                            <button type="button" wire:click.prevent="remove({{$key}},{{$value}})" class="btn btn-danger addeventmore"><i class="bx bx-minus font-22"></i></button>
                        </div>
                    </div>
                    @endforeach


                </div>



               <button class="btn btn-primary" wire:loading.attr="disabled" wire:target="save" type="submit">
                <div wire:loading wire:target="save">
                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
                    </span>
                    Loading...
                </div>
                <span wire:loading.remove wire:target="save">
                    <i class="fadeIn animated bx bx-user-check font-22"></i>
                    Save Fee Category Amount
                </span>
            </button>
            </form>
        </div>
    </div>
</div>
