@extends('admin.main')

@section('content')
<div class="container py-4">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="mb-0">Add Social Lead</h4>
    <a href="{{ route('admin_dashboard') }}" class="btn btn-outline-secondary btn-sm">Back to Dashboard</a>
  </div>

  @if ($errors->any())
  <div class="alert alert-danger">
    <ul class="mb-0">
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

  @if (session('success'))
  <div class="alert alert-success">{{ session('success') }}</div>
  @endif

  @if (session('error'))
  <div class="alert alert-danger">{{ session('error') }}</div>
  @endif

  <div class="card shadow-sm">
    <div class="card-body">
      <form method="POST" action="{{ route('admin.linkedin-lead.store') }}">
        @csrf
        <div class="row g-3">
          <div class="col-md-6">
            <label class="form-label">First Name</label>
            <input type="text" name="first_name" class="form-control" placeholder="John" value="{{ old('first_name') }}" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Last Name</label>
            <input type="text" name="last_name" class="form-control" placeholder="Doe" value="{{ old('last_name') }}" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control" placeholder="john@example.com" value="{{ old('email') }}" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Phone</label>
            <input type="tel" name="phone_number" class="form-control" placeholder="+1XXXXXXXXXX" value="{{ old('phone_number') }}" required>
          </div>
          <div class="col-md-6">
            <label class="form-label">Source</label>
            <select name="source" class="form-control" required>
              @foreach ($sourceOptions as $value => $label)
              <option value="{{ $value }}" {{ (string) old('source', $defaultSource) === (string) $value ? 'selected' : '' }}>
                {{ $label }}
              </option>
              @endforeach
            </select>
          </div>
          <div class="col-md-6">
            <label class="form-label">ZIP</label>
            <input type="text" name="postal" class="form-control" placeholder="12345" value="{{ old('postal') }}" required>
          </div>
        </div>
        <div class="mt-4">
          <button type="submit" class="btn btn-primary">Save Lead</button>
          <button type="reset" class="btn btn-outline-secondary">Reset</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
