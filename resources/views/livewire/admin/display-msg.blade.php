<div class="container">
    <div class="row">
        <div class="col">
            <div class="container my-5">
                <div class="card text-white bg-dark">
                    <div class="card-header text-white bg-dark">
                        Create Messages
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-group">
                                <label for="messagebody">Create display Message</label>
                                <textarea class="form-control" id="messagebody" rows="3" wire:model="message"></textarea>
                                @error('message') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="pt-4">
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
                            <th scope="col">Message</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($messages as $message)
                        <tr>
                            <th scope="row">{{$message->id}}</th>
                            <td>{{$message->body}}</td>
                            <td>
                                <button type="button" class="btn btn-danger" wire:click="destroy({{$message->id}})">Delete Message</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>