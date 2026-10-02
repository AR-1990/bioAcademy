@extends('user.partials.app')

@section('title', 'Dashboard | Biopharma Academy Of Clinical Research')

@section('content')
<div class="row g-6">
  <!-- Bootstrap Validation -->
  <div class="col-md">
    <div class="card">
      <h5 class="card-header">Edit Blog</h5>
      <div class="card-body">
        <form class="needs-validation" novalidate>
          <div class="mb-6">
            <label class="form-label" for="bs-validation-title">Edit Title</label>
            <input type="text" class="form-control" id="bs-validation-title" placeholder="Enter Title" required />
            <div class="valid-feedback">Looks good!</div>
            <div class="invalid-feedback">Please enter title.</div>
          </div>

          <div class="mb-6">
            <label class="form-label" for="bs-validation-heading">Edit Heading</label>
            <input type="email" id="bs-validation-heading" class="form-control" placeholder="Enter Heading"
              aria-label="john.doe" required />
            <div class="valid-feedback">Looks good!</div>
            <div class="invalid-feedback">Please enter heading</div>
          </div>

          <div class="mb-6">
            <label class="form-label" for="bs-validation-slug">Edit Slug</label>
            <input type="text" class="form-control" id="bs-validation-slug" placeholder="Enter Slug" required />
            <div class="valid-feedback">Looks good!</div>
            <div class="invalid-feedback">Please enter slug.</div>
          </div>

          <div class="mb-6">
            <label class="form-label" for="bs-validation-meta-description">Edit Meta Description</label>
            <input type="text" class="form-control" id="bs-validation-meta-description"
              placeholder="Enter Meta Description" required />
            <div class="valid-feedback">Looks good!</div>
            <div class="invalid-feedback">Please enter meta description.</div>
          </div>

          <div class="mb-6">
            <label class="form-label" for="bs-validation-date">Edit Date</label>
            <input type="text" class="form-control flatpickr-validation" id="bs-validation-date" required />
            <div class="valid-feedback">Looks good!</div>
            <div class="invalid-feedback">Please Enter date</div>
          </div>

          <div class="mb-6">
            <div class="card">
              <h5 class="card-header">Edit Content</h5>
              <div class="card-body">
                <div id="editor"></div>
              </div>
            </div>
          </div>

          <div class="mb-6">
            <label class="form-label" for="bs-validation-image">Upload Image</label>
            <div action="/upload" class="dropzone needsclick" id="dropzone-multi">
              <div class="dz-message needsclick">
                Drop files here or click to upload
                <span class="note needsclick">(This is just a demo dropzone. Selected files are
                  <span class="fw-medium">not</span> actually uploaded.)</span>
              </div>
              <div class="fallback">
                <input name="file" type="file" />
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
  <!-- /Bootstrap Validation -->
</div>
@endsection