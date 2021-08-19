<div>
    @section('title')
    Student Fee Category
    @endsection
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Student Fee Category</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Student Fee Category</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            @livewire('admin.students.fee-category.manage-student-fee-category')
        </div>

        <div class="col-md-4">
            @livewire('admin.students.fee-category.add-student-fee-category')
        </div>


    </div>

</div>
