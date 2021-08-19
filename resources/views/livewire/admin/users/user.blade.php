<div>
    @section('title')
    Users
    @endsection
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Users</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Users</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" wire:click="$toggle('status')"
                    class="btn  {{ $status == true ? 'btn-primary' : 'btn-danger' }}">
                    <span wire:loading.remove wire:target="status">
                    <i class="fadeIn animated bx {{ $status == true ? 'bx-user-plus' : 'bx-user' }} font-22"></i>
                    {{ $status == true ? 'Create User' : 'Manage Users' }}
                    </span>
                    <span wire:loading wire:target="status">Loading....</span>
                </button>
            </div>
        </div>
    </div>

    @if ($status)
    @livewire('admin.users.manage-user')
    @else
    @livewire('admin.users.add-user')
    @endif
</div>
