<div>
    @section('title')
    Student Shift
    @endsection
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Student Shift</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Student Shift</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            @livewire('admin.students.shifts.manage-student-shift')
        </div>

        <div class="col-md-4">
            @livewire('admin.students.shifts.add-student-shift')
        </div>


    </div>

</div>
