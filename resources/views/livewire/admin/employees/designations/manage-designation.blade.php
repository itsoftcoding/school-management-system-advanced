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
                        @foreach ($designations as $key => $designation)

                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $designation->name }}</td>
                            <td>{{ $designation->created_at == 'null' ? 'Date Not Found' : $designation->created_at->diffForHumans() }}
                            <td>{{ $designation->updated_at == 'null' ? 'Date Not Found' : $designation->updated_at->diffForHumans() }}
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
