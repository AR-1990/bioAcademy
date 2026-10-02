@extends('admin.main')

<style>
    html.dark-mode .table,
    html.dark-mode .text-50, 
    html.dark-mode .text-muted {
        color: #000 !important;
    }
    .page-section{
        overflow: auto;
    }
</style>

@section('content')
<div class="container-fluid page__container page-section" style="max-width: 100% !important;">
  <div class="pt-32pt">
    <div class="d-flex flex-column flex-md-row align-items-center text-center text-sm-left mx-auto">
      <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">
        <div class="mb-24pt mb-sm-0 mr-sm-24pt">
          <h2 class="mb-0">SMS Logs</h2>
          <ol class="breadcrumb p-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('/admin_dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">SMS Logs</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  <div class="card mt-4">
    <div class="card-body">
      <ul class="nav nav-pills mb-3" role="tablist">
        <li class="nav-item"><a class="nav-link active" href="#tab-inbox" role="tab">Inbox</a></li>
        <li class="nav-item"><a class="nav-link" href="#tab-outbox" role="tab">Outbox</a></li>
        <li class="nav-item"><a class="nav-link" href="#tab-mass" role="tab">Mass Text</a></li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane show active" id="tab-inbox" role="tabpanel">
          <div class="table-responsive">
            <table class="table table-sm">
              <thead><tr><th>From</th><th>To</th><th>User</th><th>Body</th><th>Time</th></tr></thead>
              <tbody>
                @forelse($inbox as $m)
                  <tr>
                    <td>{{ $m->sender_number }}</td>
                    <td>{{ $m->recipient_number }}</td>
                    <td>{{ ($m->user ?? $m->matched_user)?->first_name }} {{ ($m->user ?? $m->matched_user)?->last_name }}</td>
                    <td class="w-50">{{ $m->body }}</td>
                    <td>{{ $m->created_at->format('Y-m-d H:i') }}</td>
                  </tr>
                @empty
                  <tr><td colspan="5" class="text-muted">No messages</td></tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>

        <div class="tab-pane" id="tab-outbox" role="tabpanel">
          <div class="table-responsive">
            <table class="table table-sm">
              <thead><tr><th>To</th><th>From</th><th>User</th><th>Status</th><th>Body</th><th>Time</th></tr></thead>
              <tbody>
                @forelse($outbox as $m)
                  <tr>
                    <td>{{ $m->recipient_number }}</td>
                    <td>{{ $m->sender_number }}</td>
                    <td>{{ ($m->user ?? $m->matched_user)?->first_name }} {{ ($m->user ?? $m->matched_user)?->last_name }}</td>
                    <!--<td>{{ $m->status }}</td>-->
                    <td>Sent</td>
                    <td class="w-50">{{ $m->body }}</td>
                    <td>{{ $m->created_at->format('Y-m-d H:i') }}</td>
                  </tr>
                @empty
                  <tr><td colspan="6" class="text-muted">No messages</td></tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>

        <div class="tab-pane" id="tab-mass" role="tabpanel">
          <div class="table-responsive">
            <table class="table table-sm">
              <thead><tr><th>To</th><th>Category</th><th>Status</th><th>Body</th><th>Time</th></tr></thead>
              <tbody>
                @forelse($mass as $m)
                  <tr>
                    <td>{{ $m->recipient_number }}</td>
                    <td>{{ ucfirst($m->category) }}</td>
                    <td>Sent</td>
                    <td class="w-50">{{ $m->body }}</td>
                    <td>{{ $m->created_at->format('Y-m-d H:i') }}</td>
                  </tr>
                @empty
                  <tr><td colspan="5" class="text-muted">No messages</td></tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<script>
  const tabLinks = document.querySelectorAll('.nav-pills .nav-link');
  const panes = document.querySelectorAll('.tab-content .tab-pane');
  tabLinks.forEach(link => link.addEventListener('click', (e) => {
    e.preventDefault();
    const target = link.getAttribute('href');
    tabLinks.forEach(l => l.classList.remove('active'));
    link.classList.add('active');
    panes.forEach(p => {
      p.classList.remove('show');
      p.classList.remove('active');
      if ('#' + p.id === target) { p.classList.add('show'); p.classList.add('active'); }
    });
  }));
</script>
@endsection
