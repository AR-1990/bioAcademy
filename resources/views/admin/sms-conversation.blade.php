@extends('admin.main')
@section('content')
<div class="container-fluid page__container page-section" style="max-width: 100% !important;">
  <div class="pt-32pt">
    <div class="d-flex flex-column flex-md-row align-items-center text-center text-sm-left mx-auto">
      <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">
        <div class="mb-24pt mb-sm-0 mr-sm-24pt">
          <h2 class="mb-0">Conversation</h2>
          <ol class="breadcrumb p-0 m-0">
            <li class="breadcrumb-item"><a href="{{ route('admin.sms-inbox') }}">SMS Inbox</a></li>
            <li class="breadcrumb-item active">{{ $user?->first_name }} {{ $user?->last_name }} ({{ $phone }})</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="card mb-3">
    <div class="card-body">
      <div class="d-flex flex-column" style="gap:12px;">
        @foreach($messages as $m)
          @if($m->direction === 'inbound')
            <div class="p-2" style="align-self:flex-start; background:#f3f4f6; border:1px solid #e5e7eb; border-radius:10px; max-width:70%;">
              <div class="text-muted" style="font-size:12px;">From {{ $m->sender_number }} • {{ $m->created_at->format('Y-m-d H:i') }}</div>
              <div>{{ $m->body }}</div>
            </div>
          @else
            <div class="p-2" style="align-self:flex-end; background:#e0f2fe; border:1px solid #bae6fd; border-radius:10px; max-width:70%;">
              <div class="text-muted" style="font-size:12px;">To {{ $m->recipient_number }} • {{ $m->created_at->format('Y-m-d H:i') }} • {{ $m->status }}</div>
              <div>{{ $m->body }}</div>
            </div>
          @endif
        @endforeach
      </div>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <form method="post" action="{{ route('admin.mass-text.send') }}">
        @csrf
        <input type="hidden" name="category" value="individual">
        <input type="hidden" name="phone" value="{{ $phone }}">
        <div class="form-group">
          <label>Reply Message</label>
          <textarea name="message" class="form-control" rows="3" placeholder="Type your reply" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Send Reply</button>
      </form>
    </div>
  </div>

</div>
@endsection

