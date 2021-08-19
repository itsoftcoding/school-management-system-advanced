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


                <div class="mb-3">
                    <label class="form-label">Name:</label>
                    <input type="search" wire:model.lazy="name"
                        class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>



                <button class="btn btn-primary" wire:loading.attr="disabled" wire:target="save" type="submit">
                    <div wire:loading wire:target="save">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true">
                        </span>
                        Loading...
                    </div>
                    <span wire:loading.remove wire:target="save">
                        <i class="fadeIn animated bx bx-user-check font-22"></i>
                        Save Student Group
                    </span>
                </button>
            </form>
        </div>
    </div>
</div>
