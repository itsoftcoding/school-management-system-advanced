<div>
    @section('title')
    Subject Assign
    @endsection
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Subject Assign</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Subject Assign</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            @livewire('admin.subjects.subject-assigns.manage-subject-assign')
        </div>

        <div class="col-md-8">
            @livewire('admin.subjects.subject-assigns.add-subject-assign')
        </div>


    </div>

</div>
