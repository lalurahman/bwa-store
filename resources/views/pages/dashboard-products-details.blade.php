@extends('layouts.dashboard')

@section('title')
    Store - Dashboard Product Detail
@endsection

@section('content')
<!-- section content -->
<div
class="section-content section-dashboard-home"
data-aos="fade-up"
>
<div class="container-fluid">
  <div class="dashboard-heading">
    <h2 class="dashboard-title">Shirup Marzann</h2>
    <p class="dashboard-subtitle">Product Details</p>
  </div>
  <div class="dashboard-content">
    <div class="row">
      <div class="col-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('dashboard-products-updates', $product->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="users_id" value="{{ Auth::user()->id }}">
          <div class="card">
            <div class="card-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Product Name</label>
                    <input
                      type="text"
                      name="name"
                      class="form-control"
                      value="{{ $product->name }}"
                    />
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="">Price</label>
                    <input
                      type="number"
                      name="price"
                      class="form-control"
                      value="{{ $product->price }}"
                    />
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label>Category</label>
                    <select
                        name="categories_id"
                        id="categories_id"
                        class="form-control"
                    >
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $category->id == $product->categories_id ? 'selected' : '' }}>{{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="">Description</label>
                    <textarea name="description" id="editor">{!! $product->description !!}</textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col text-right">
                  <button
                    type="submit"
                    class="btn btn-success px-5 btn-block"
                  >
                    Update Now
                  </button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row mt-2">
      <div class="col-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              @foreach ($product->galleries as $gallery)
                <div class="col-md-4 mb-2">
                  <div class="gallery-container">
                    <img
                      src="{{ Storage::url($gallery->photos ?? '') }}"
                      alt=""
                      class="w-100"
                    />
                    <a href="{{ route('dashboard-products-gallery-delete', $gallery->id) }}" class="delete-gallery">
                      <img src="/images/icon-delete.svg" alt="" />
                    </a>
                  </div>
                </div>  
              @endforeach
            </div>
            <div class="row mt-3">
              <div class="col-12">
                <form action="{{ route('dashboard-products-gallery-upload') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <input type="hidden" name="products_id" value="{{ $product->id }}">
                  <input
                    type="file"
                    id="file"
                    name="photos"
                    class="d-none"
                    onchange="form.submit()"
                  />
                  <button
                    type="button"
                    class="btn btn-secondary btn-block"
                    onclick="thisFileUpload()"
                  >
                    Add Photo
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection

@push('addon-script')
    <script src="https://cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
    <script>
    function thisFileUpload() {
        document.getElementById("file").click();
    }
    </script>
    <script>
    CKEDITOR.replace("editor");
    </script>
@endpush