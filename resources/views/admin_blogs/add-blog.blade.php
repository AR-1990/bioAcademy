@extends('admin_blogs.layouts.master')

@section('content')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet">
<!-- <link rel="stylesheet" href={{ asset('admin-assets/css/text-editor.css') }}> -->

<style>
  /* Add your styles here */
</style>

<div class="main-content">
  <section class="section">
    <ul class="breadcrumb breadcrumb-style ">
      <li class="breadcrumb-item">
        <h4 class="page-title m-b-0">Upload Blog</h4>
      </li>
    </ul>
    <form method="POST" id="myForm" enctype="multipart/form-data" action="{{ route('/admin/create-blogs') }}">
      @csrf
      <input type="hidden" name="content" id="editor-content">
      <div class="section-body mb-5">
        <div class="row">
          <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <h5 class="my-2">Add Title</h5>
                      <div class="input-group">
                        <input type="text" name="title" class="form-control" placeholder="Enter Title" id="title"
                          required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <h5 class="my-2">Add Heading</h5>
                      <div class="input-group">
                        <input type="text" name="heading" class="form-control" placeholder="Enter heading" id="heading"
                          required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <h5 class="my-2">Add Slug</h5>
                      <div class="input-group">
                        <input type="text" name="slug" class="form-control" placeholder="Enter Slug" id="slug">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <h5 class="my-2">Add Meta Description</h5>
                      <div class="input-group">
                        <input type="text" name="meta_tags" class="form-control" placeholder="Enter Meta Tags"
                          id="meta_tags">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <h5 class="my-2">Select Category</h5>
                      <div class="input-group">
                        <select name="category" id="category" class="form-control" required>
                          <option value="">Select Category</option>
                          @foreach($blogCategories as $value => $label)
                            <option value="{{ $value }}" {{ old('category') === $value ? 'selected' : '' }}>
                              {{ $label }}
                            </option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                      <h5 class="my-2">Add Content</h5>
                      <div id="div_editor1"></div>

                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <h5 class="my-2">Upload Image</h5>
                    <div class="wrapper">
                      <div class="box">
                        <div class="js--image-preview"></div>
                        <div class="upload-options">
                          <label>
                            <input type="file" class="image-upload" accept="image/*" name="cuctomeimage"
                              id="cuctomeimage" />
                          </label>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row mt-4">
                  <div class="col-md-6">
                    <button type="submit" class="btn btn-dark ml-2" onclick="datapass();">Submit</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
  </section>
</div>
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
@push('script')
<!-- <script src={{ asset('admin-assets/js/text-editor.js') }}></script> */ -->
<script>
  const quill = new Quill('#div_editor1', {
      theme: 'snow'
  });  
  // var editor1 = new RichTextEditor("#div_editor1");
  function datapass() {
   var editorContent = quill.root.innerHTML;
    var title = $('#title').val().trim();
    var slug = $('#slug').val().trim();
    var metaTags = $('#meta_tags').val().trim();
    var category = $('#category').val().trim();
    var content = editorContent.trim();
    var image = $('#cuctomeimage')[0].files[0];
    if (title === '') {
      Swal.fire('Alert!', 'Please mention title first', 'error');
      return false;
    } else if (slug === '') {
      Swal.fire('Alert!', 'Please mention slug', 'error');
      return false;
    } else if (metaTags === '') {
      Swal.fire('Alert!', 'Please mention meta tags', 'error');
      return false;
    } else if (category === '') {
      Swal.fire('Alert!', 'Please select a category', 'error');
      return false;
    } else if (content === '' || content === '<p><br></p>') {
      Swal.fire('Alert!', 'Please mention content', 'error');
      return false;
    } else if (!image) {
      Swal.fire('Alert!', 'Please add image first', 'error');
      return false;
    } else {
      $('#editor-content').val(content);
    }
  }
  function initImageUpload(box) {
    let uploadField = box.querySelector('.image-upload');
    uploadField.addEventListener('change', getFile);
    function getFile(e) {
      let file = e.currentTarget.files[0];
      checkType(file);
    }
    function previewImage(file) {
      let thumb = box.querySelector('.js--image-preview'),
        reader = new FileReader();
      reader.onload = function () {
        thumb.style.backgroundImage = 'url(' + reader.result + ')';
      }
      reader.readAsDataURL(file);
      thumb.className += ' js--no-default';
    }
    function checkType(file) {
      let imageType = /image.*/;
      if (!file.type.match(imageType)) {
        throw 'File is not an image';
      } else if (!file) {
        throw 'No image chosen';
      } else {
        previewImage(file);
      }
    }
  }
  var boxes = document.querySelectorAll('.box');
  for (let i = 0; i < boxes.length; i++) {
    let box = boxes[i];
    initDropEffect(box);
    initImageUpload(box);
  }
  function initDropEffect(box) {
    let area, drop, areaWidth, areaHeight, maxDistance, dropWidth, dropHeight, x, y;
    area = box.querySelector('.js--image-preview');
    area.addEventListener('click', fireRipple);
    function fireRipple(e) {
      area = e.currentTarget;
      if (!drop) {
        drop = document.createElement('span');
        drop.className = 'drop';
        this.appendChild(drop);
      }
      drop.className = 'drop';
      areaWidth = getComputedStyle(this, null).getPropertyValue("width");
      areaHeight = getComputedStyle(this, null).getPropertyValue("height");
      maxDistance = Math.max(parseInt(areaWidth, 10), parseInt(areaHeight, 10));
      drop.style.width = maxDistance + 'px';
      drop.style.height = maxDistance + 'px';
      dropWidth = getComputedStyle(this, null).getPropertyValue("width");
      dropHeight = getComputedStyle(this, null).getPropertyValue("height");
      x = e.pageX - this.offsetLeft - (parseInt(dropWidth, 10) / 2);
      y = e.pageY - this.offsetTop - (parseInt(dropHeight, 10) / 2) - 30;
      drop.style.top = y + 'px';
      drop.style.left = x + 'px';
      drop.className += ' animate';
      e.stopPropagation();
    }
  }
</script>
@endpush
