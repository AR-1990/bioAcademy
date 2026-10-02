@extends('admin_blogs.layouts.master')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="main-content">
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <h4>Add Blog Category</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('admin.blog-categories.store') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Category Name</label>
                                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="slug">Category Slug</label>
                                    <input type="text" name="slug" id="slug" class="form-control" value="{{ old('slug') }}" placeholder="leave blank to auto-generate">
                                    <small class="text-muted">Example: clinical-updates</small>
                                </div>

                                <button type="submit" class="btn btn-dark">Add Category</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-md-7">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between">
                            <h4>Blog Categories</h4>
                            <span class="badge badge-primary">{{ $categories->count() }} Total</span>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped w-100" id="categoryTable">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>Blogs</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($categories as $category)
                                            <tr>
                                                <td>{{ $category->id }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->slug }}</td>
                                                <td>{{ $category->blogs_count }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-sm btn-info" data-toggle="modal" data-target="#editCategoryModal{{ $category->id }}">
                                                        Edit
                                                    </button>

                                                    @if($category->slug !== 'other')
                                                        <form method="POST" action="{{ route('admin.blog-categories.delete', $category->id) }}" style="display:inline-block;" onsubmit="return confirm('Delete this category? Related blogs will move to Other.');">
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                        </form>
                                                    @else
                                                        <span class="badge badge-secondary">Default</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@foreach($categories as $category)
    <div class="modal fade" id="editCategoryModal{{ $category->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form method="POST" action="{{ route('admin.blog-categories.update', $category->id) }}">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                        </div>

                        <div class="form-group">
                            <label>Category Slug</label>
                            <input type="text" name="slug" class="form-control" value="{{ $category->slug }}" {{ $category->slug === 'other' ? 'readonly' : '' }}>
                            @if($category->slug === 'other')
                                <small class="text-muted">Default fallback category cannot change slug.</small>
                            @endif
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-dark">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endforeach
@endsection

@push('script')
<script>
    $(document).ready(function () {
        $('#categoryTable').DataTable({
            scrollX: true
        });
    });
</script>
@endpush
