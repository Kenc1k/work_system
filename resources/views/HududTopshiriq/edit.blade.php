@extends('layouts.main')

@section('content')
    <div class="container mt-4">
        <h1 align="center">Edit Topshiriq</h1>
        <form action="{{ route('hudud_topshiriq.update', $hududTopshiriq->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="hudud" class="form-label">Hudud</label>
                <select class="form-control" id="hudud" name="hudud" required>
                    @foreach($hududs as $hudud)
                        <option value="{{ $hudud->id }}" {{ $hududTopshiriq->hudud_id == $hudud->id ? 'selected' : '' }}>
                            {{ $hudud->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label for="topshiriq" class="form-label">Topshiriq</label>
                <select class="form-control" id="topshiriq" name="topshiriq" required>
                    @foreach($topshiriqs as $topshiriq)
                        <option value="{{ $topshiriq->id }}" {{ $hududTopshiriq->topshiriq_id == $topshiriq->id ? 'selected' : '' }}>
                            {{ $topshiriq->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            

            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="sent" {{ $hududTopshiriq->status == 'sent' ? 'selected' : '' }}>Sent</option>
                    <option value="opened" {{ $hududTopshiriq->status == 'opened' ? 'selected' : '' }}>Opened</option>
                    <option value="done" {{ $hududTopshiriq->status == 'done' ? 'selected' : '' }}>Done</option>
                    <option value="rejected" {{ $hududTopshiriq->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    <option value="approved" {{ $hududTopshiriq->status == 'approved' ? 'selected' : '' }}>Approved</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
