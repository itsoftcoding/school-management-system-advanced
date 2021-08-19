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
                        @foreach ($student_shifts as $key => $student_shift)

                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $student_shift->name }}</td>
                            <td>{{ $student_shift->created_at == 'null' ? 'Date Not Found' : $student_shift->created_at->diffForHumans() }}
                            <td>{{ $student_shift->updated_at == 'null' ? 'Date Not Found' : $student_shift->updated_at->diffForHumans() }}
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
