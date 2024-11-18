@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <h1 align="center">Create Topshiriq</h1>
                <form action="{{ route('topshiriq.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <label for="category_id">Category</label>
                    <select name="category_id" id="category_id" required>
                        <option value="" disabled selected>Select a category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <div class="error">{{ $message }}</div>
                    @enderror
                    
                    
                    <div class="mb-3">
                        <label for="ijrochi" class="form-label">Ijrochi</label>
                        <input type="text" name="ijrochi" id="ijrochi" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="file" class="form-label">File</label>
                        <input type="file" name="file" id="file" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="muddat" class="form-label">Muddat</label>
                        <input type="date" name="muddat" id="muddat" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
