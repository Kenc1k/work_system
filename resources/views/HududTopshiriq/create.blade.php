@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <h1 align="center">Create Topshiriq</h1>
        <form action="{{ route('hudud_topshiriq.store') }}" method="POST">
            @csrf
            <!-- Hudud Dropdown -->
            <div class="mb-3">
                <label for="hudud" class="form-label">Hudud</label>
                <select class="form-control" id="hudud" name="hudud_id" required>
                    @foreach ($hududs as $hudud)
                        <option value="{{ $hudud->id }}">{{ $hudud->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Topshiriq Dropdown -->
            <div class="mb-3">
                <label for="topshiriq" class="form-label">Topshiriq</label>
                <select class="form-control" id="topshiriq" name="topshiriq_id" required>
                    @foreach ($topshiriqs as $topshiriq)
                        <option value="{{ $topshiriq->id }}">{{ $topshiriq->name }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Status Dropdown -->
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="sent">Sent</option>
                    <option value="opened">Opened</option>
                    <option value="done">Done</option>
                    <option value="rejected">Rejected</option>
                    <option value="approved">Approved</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Create</button>
        </form>
    </div>
@endsection
