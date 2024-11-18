@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <h1>Update Hudud</h1>
        <form action="{{ route('hudud.update', $hudud->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- Required for update requests -->
            <div class="mb-3">
                <label for="user_id" class="form-label">User</label>
                <select class="form-control" id="user_id" name="user_id" required>
                    <option value="" disabled>Select a user</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" @if($hudud->user_id == $user->id) selected @endif>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $hudud->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
