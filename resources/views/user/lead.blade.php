@extends('user.partials.app')

@section('title', 'Dashboard | Biopharma Academy Of Clinical Research')

@section('content')
<div class="row g-6">
  <div class="col-xxl-12">
    <!-- DataTable with Buttons -->
    <div class="card">
      <div class="card-datatable table-responsive pt-0">
        <table class="datatables-basic table">
          <thead>
            <tr>
              <th></th>
              <th></th>
              <th>id</th>
              <th>Name</th>
              <th>Email</th>
              <th>Date</th>
              <th>Salary</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
    <!--/ DataTable with Buttons -->
  </div>
</div>
@endsection