@extends('admin.main')
@section('content')
<div class="container-fluid page__container page-section" style="max-width: 100% !important;">
  <div class="pt-32pt">
    <div class="d-flex flex-column flex-md-row align-items-center text-center text-sm-left mx-auto">
      <div class="flex d-flex flex-column flex-sm-row align-items-center mb-24pt mb-md-0">
        <div class="mb-24pt mb-sm-0 mr-sm-24pt">
          <h2 class="mb-0">Mass Text</h2>
          <ol class="breadcrumb p-0 m-0">
            <li class="breadcrumb-item"><a href="{{ url('/admin_dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Mass Text</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

  @if(session('status'))
    <div class="alert alert-success">{{ session('status') }}</div>
  @endif

  <div class="card">
    <div class="card-body">
      <form method="post" action="{{ route('admin.mass-text.send') }}">
        @csrf
        <div class="form-group">
          <label class="d-block font-weight-bold mb-2">Audience</label>
          <div class="d-flex" style="gap:16px; flex-wrap:wrap;">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="audiences[]" id="audience-inquiries" value="inquiries" checked>
              <label class="form-check-label" for="audience-inquiries">Inquiries</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="audiences[]" id="audience-students" value="students" checked>
              <label class="form-check-label" for="audience-students">Students</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="use_individual" id="audience-individual" value="1">
              <label class="form-check-label" for="audience-individual">Individual</label>
            </div>
          </div>
        </div>

        <div class="form-group" id="individual-input" style="display:none;">
          <label>Phone (E.164 like +1XXXXXXXXXX)</label>
          <input type="text" class="form-control" name="phone" placeholder="+1XXXXXXXXXX">
        </div>

        <div class="form-group">
          <label class="d-block font-weight-bold mb-2">Status Filter (optional)</label>
          <div class="d-flex" style="gap:12px; flex-wrap:wrap;">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="statuses[]" id="status-not-contacted" value="Not contacted">
              <label class="form-check-label" for="status-not-contacted">Not contacted</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="statuses[]" id="status-attempt1" value="Contact Attempt 1">
              <label class="form-check-label" for="status-attempt1">Contact Attempt 1</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="statuses[]" id="status-attempt2" value="Contact Attempt 2">
              <label class="form-check-label" for="status-attempt2">Contact Attempt 2</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="statuses[]" id="status-attempt3" value="Contact Attempt 3">
              <label class="form-check-label" for="status-attempt3">Contact Attempt 3</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="statuses[]" id="status-followup" value="Followup-Required">
              <label class="form-check-label" for="status-followup">Followup Required</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" name="statuses[]" id="status-not-interested" value="Not-Interested">
              <label class="form-check-label" for="status-not-interested">Not Interested</label>
            </div>
          </div>
        </div>

        <div class="form-group">
          <label>Message</label>
          <textarea name="message" class="form-control" rows="4" placeholder="Type your message" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Send</button>
      </form>
    </div>
  </div>

  

</div>

<script>
  const individualCheckbox = document.getElementById('audience-individual');
  const individualInput = document.getElementById('individual-input');
  const toggleIndividual = () => { individualInput.style.display = individualCheckbox.checked ? 'block' : 'none'; };
  individualCheckbox.addEventListener('change', toggleIndividual);
  toggleIndividual();
</script>
@endsection
