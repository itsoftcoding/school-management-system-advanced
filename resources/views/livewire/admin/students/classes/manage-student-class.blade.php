<div>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Code</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($student_classes as $key => $student_class)

                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $student_class->name }}</td>
                            <td>{{ $student_class->code }}</td>
                            <td>{{ $student_class->status == 0 ? 'disable' : 'enable' }}</td>
                            <td>{{ $student_class->created_at == 'null' ? 'Date Not Found' : $student_class->created_at->diffForHumans() }}
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
                            <th>Code</th>
                            <th>Status</th>
                            <th>Created Date</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
