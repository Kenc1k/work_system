@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <h1 align="center">Edit Topshiriq</h1>
                <form action="{{ route('topshiriq.update', $topshiriq->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="category_id" class="form-label">Category</label>
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ $category->id == $topshiriq->category_id ? 'selected' : '' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="ijrochi" class="form-label">Ijrochi</label>
                        <input type="text" name="ijrochi" id="ijrochi" class="form-control" value="{{ $topshiriq->ijrochi }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" value="{{ $topshiriq->title }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4" required>{{ $topshiriq->description }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">File</label>
                        <input type="file" name="file" id="file" class="form-control">
                        @if($topshiriq->file)
                            <p>Current File: <a href="{{ asset('storage/' . $topshiriq->file) }}" target="_blank">{{ $topshiriq->file }}</a></p>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="muddat" class="form-label">Muddat</label>
                        <input type="date" name="muddat" id="muddat" class="form-control" value="{{ $topshiriq->muddat }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
