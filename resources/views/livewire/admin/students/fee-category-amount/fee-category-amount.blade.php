<div>
    @section('title')
    Fee Category Amount
    @endsection
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Fee Category Amount</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}"><i
                                class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Fee Category Amount</li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5">
            @livewire('admin.students.fee-category-amount.manage-fee-category-amount')
        </div>

        <div class="col-md-7">
            @livewire('admin.students.fee-category-amount.add-fee-category-amount')
        </div>


    </div>

</div>
