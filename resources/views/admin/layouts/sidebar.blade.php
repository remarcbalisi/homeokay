<div class="col-md-4">
    <div class="card">
        <div class="card-header">Menu</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

            <ul>
                <li>
                    Products

                    <ul>
                        <li>
                            <a href="{{route('admin.product.create')}}">Add</a>
                        </li>
                        <li>
                            <a href="{{route('admin.product.list')}}">List</a>
                        </li>
                    </ul>
                </li>
                <li>Users</li>
            </ul>
        </div>
    </div>
</div>
