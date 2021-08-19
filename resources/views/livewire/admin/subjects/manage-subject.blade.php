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
                        @foreach ($subjects as $key => $subject)

                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $subject->name }}</td>
                            <td>{{ $subject->created_at == 'null' ? 'Date Not Found' : $subject->created_at->diffForHumans() }}
                            <td>{{ $subject->updated_at == 'null' ? 'Date Not Found' : $subject->updated_at->diffForHumans() }}
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
