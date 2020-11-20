<div class="container">
    <div class="row">
        <div class="col">
            <div class="container my-5">
                <div class="card text-white bg-dark">
                    <div class="card-header text-white bg-dark">
                        Create Category
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="formGroupExampleInput">Category Name</label>
                                <input type="text" class="form-control" id="formGroupExampleInput" wire:model="name">
                                @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="pt-2">
                                <button type="submit" class="btn btn-primary" wire:click.prevent="store()">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="container pt-5 pb-3">
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
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{$category->id}}</th>
                            <td>{{$category->name}}</td>
                            <td>
                                <button type="button" class="btn btn-danger" wire:click="destroy({{$category->id}})">Delete Category</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>