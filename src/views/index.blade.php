@extends('usermaster::layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>User List</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('usermaster.create') }}"> Create New User</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>Username</th>
        <th>Email</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($usermasters as $usermaster)
    <tr>
        <td>{{ $usermaster->username }}</td>
        <td>{{ $usermaster->email }}</td>
        <td>
            <form action="{{ route('usermaster.destroy',$usermaster->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('usermaster.show',$usermaster->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('usermaster.edit',$usermaster->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $usermasters->links() !!}

@endsection