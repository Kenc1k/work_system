@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-12">
                <h1 align="center">Topshiriqlar</h1>

                <!-- Filter Section -->
                <form method="GET" action="{{ route('topshiriq.index') }}" class="d-flex mb-4">
                    <div class="mb-3 me-2">
                        <label for="start-date" class="form-label">Start Date</label>
                        <input type="date" name="start_date" id="start-date" class="form-control" value="{{ request('start_date') }}">
                    </div>

                    <div class="mb-3 me-2">
                        <label for="end-date" class="form-label">End Date</label>
                        <input type="date" name="end_date" id="end-date" class="form-control" value="{{ request('end_date') }}">
                    </div>

                    <button type="submit" class="btn btn-primary">Filter</button>
                </form>

                <!-- Create Button -->
                <a href="{{ route('topshiriq.create') }}" class="btn btn-primary mb-3">Create Topshiriq</a>

                <!-- Table -->
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Category</th>
                            <th scope="col">Ijrochi</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">File</th>
                            <th scope="col">Muddat</th>
                            <th scope="col">Delete</th>
                            <th scope="col">Update</th>
                        </tr>
                    </thead>
                    <tbody id="topshiriq-table-body">
                        @foreach ($topshiriqs as $topshiriq)
                            <tr>
                                <td>{{ $topshiriq->id }}</td>
                                <td>{{ $topshiriq->category_id }}</td>
                                <td>{{ $topshiriq->ijrochi }}</td>
                                <td>{{ $topshiriq->title }}</td>
                                <td>{{ $topshiriq->description }}</td>
                                <td>
                                    @if ($topshiriq->file)
                                        <a href="{{ asset('files/' . $topshiriq->file) }}" download>{{ $topshiriq->file }}</a>
                                    @else
                                        No File
                                    @endif
                                </td>
                                <td>{{ $topshiriq->muddat }}</td>
                                <td>
                                    <form action="{{ route('topshiriq.destroy', $topshiriq->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                <td><a href="{{ route('topshiriq.edit', $topshiriq->id) }}" class="btn btn-warning">Update</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
