@extends('user.partials.app')

@section('title', 'Dashboard | Biopharma Academy Of Clinical Research')

@section('content')
<div class="row g-6">
  <div class="col-12">
    <div class="card">
      <div class="card-datatable table-responsive pt-0">
        <div class="row card-header flex-column flex-md-row border-bottom mx-0 px-3">
          <div class="d-md-flex justify-content-between align-items-center col-md-auto me-auto mt-0">
            <h5 class="card-title mb-0 text-md-start text-center pb-md-0 pb-6">Blog</h5>
          </div>
          <div
            class="d-md-flex justify-content-between align-items-center dt-layout-end col-md-auto ms-auto gap-md-2 gap-0 mt-0">
            <button class="btn create-new btn-primary" type="button" onclick="window.location.href='{{ route('user.blog.form') }}'">
              <span>
                <span class="d-flex align-items-center gap-2">
                  <i class="icon-base ti tabler-plus icon-sm"></i>
                  <span class="d-none d-sm-inline-block">Add New BLog</span>
                </span>
              </span>
            </button>
          </div>
        </div>

        <table class="table datatables-blog">
          <thead>
            <tr>
              <th>Sr.No</th>
              <th>Title</th>
              <th>Heading</th>
              <th>Content</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody class="table-border-bottom-0">
            @for ($i = 1; $i <= 100; $i++) 
            <tr>
              <td>{{ $i }}</td>
              <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus, minima?</td>
              <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias, exercitationem! Corporis quisquam
                voluptatum accusantium velit.</td>
              <td>Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus voluptas perferendis rem velit adipisci
                id ab eum illo fuga laborum!</td>
              <td>11 April 2025</td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                    <i class="icon-base ti tabler-dots-vertical"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item waves-effect" href="{{ route('user.blog.details') }}">
                      <i class="ti tabler-eye icon-base me-1"></i> Details
                    </a>
                    <a class="dropdown-item waves-effect" href="{{ route('user.blog.edit') }}">
                      <i class="icon-base ti tabler-pencil me-1"></i> Edit
                    </a>
                    <a class="dropdown-item waves-effect" href="javascript:void(0);">
                      <i class="icon-base ti tabler-trash me-1"></i> Delete
                    </a>
                  </div>
                </div>
              </td>
            </tr>
            @endfor
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection