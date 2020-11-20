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
                <th scope="col">User_id</th>
                <th scope="col">Title</th>
                <th scope="col">Email</th>
                <th scope="col">Subject</th>
                <th scope="col">Message</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <th scope="row">{{$contact->id}}</th>
                <td>{{$contact->user_id}}</td>
                <td>{{$contact->title}}</td>
                <td>{{$contact->email}}</td>
                <td>{{$contact->subject}}</td>
                <td>{{$contact->message}}</td>
                <td>
                    <button type="button" class="btn btn-danger" wire:click="destroy({{$contact->id}})">Delete Message</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>