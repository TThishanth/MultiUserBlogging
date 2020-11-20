<div class="container my-5">
    <div class="card">
        <div class="card-header">
            <div class="input-group col-4 ml-2">
                <input type="text" class="form-control" placeholder="Search..." wire:model="searchTerm">
            </div>
        </div>
        <div class="card-body">
            <div class="container">
                <div>
                    @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                    @endif
                </div>
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Change utype</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if ($user->utype === 'USR')
                                <button type="button" class="btn btn-warning" wire:click="MakeAdmin({{$user->id}})">Make Admin</button>
                                @else
                                <button type="button" class="btn btn-primary" wire:click="MakeUser({{$user->id}})">Make User</button>
                                @endif
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger" wire:click="destroy({{$user->id}})">Delete User</button>
                            </td>
                        </tr>
                        @endforeach
                        {{ $users->links() }}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>