<div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Created Date</th>
                            <th>Updated Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($student_fee_categories as $key => $student_fee_category)

                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $student_fee_category->name }}</td>
                            <td>{{ $student_fee_category->created_at == 'null' ? 'Date Not Found' : $student_fee_category->created_at->diffForHumans() }}
                            <td>{{ $student_fee_category->updated_at == 'null' ? 'Date Not Found' : $student_fee_category->updated_at->diffForHumans() }}
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
                            <th>Name</th>
                            <th>Created Date</th>
                            <th>Updated Date</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
