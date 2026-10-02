@extends('admin.main')
@section('content')
<div class="container-fluid page__container page-section" style="max-width: 100% !important;">
  <div class="pt-32pt">
    <div class="d-flex flex-column flex-md-row align-items-center text-center text-sm-left mx-auto">
      <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">
        <div class="mb-24pt mb-sm-0 mr-sm-24pt">
          <h2 class="mb-0">SMS Inbox</h2>
          <ol class="breadcrumb p-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('/admin_dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">SMS Inbox</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-sm">
          <thead>
            <tr>
              <th>From</th>
              <th>User</th>
              <th>Body</th>
              <th>Time</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @forelse($inbox as $m)
              <tr>
                <td>{{ $m->sender_number }}</td>
                <td>{{ ($m->user ?? $m->matched_user)?->first_name }} {{ ($m->user ?? $m->matched_user)?->last_name }}</td>
                <td>{{ $m->body }}</td>
                <td>{{ $m->created_at->format('Y-m-d H:i') }}</td>
                <td><a class="btn btn-sm btn-primary" href="{{ route('admin.sms-conversation', $m->sender_number) }}">Open</a></td>
              </tr>
            @empty
              <tr><td colspan="5" class="text-muted">No messages</td></tr>
            @endforelse
          </tbody>
        </table>
      </div>
      {{ $inbox->links() }}
    </div>
  </div>

</div>
@endsection
