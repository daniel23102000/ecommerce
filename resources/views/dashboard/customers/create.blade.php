@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Customers</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="log-lg-8">
<form method="post" action="/dashboard/customers" class="mb-5" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="first_name" class="form-label">First Name</label>
    <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" 
    required autofocus value="{{ old('first_name') }}">
    @error('first_name')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="last_name" class="form-label">Last Name</label>
    <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" 
    required autofocus value="{{ old('last_name') }}">
    @error('last_name')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>

  <div class="mb-3">
      <label for="email">Email address</label>
      <input type="text" name="email" class="form-control @error('email')is-invalid @enderror" id="email" required value="{{ old('email') }}">
      @error('email')
      <div class="invalid-feedback">
        {{ $message }}
      </div>
      @enderror
    </div>

    <div class="mb-3">
    <label for="phone" class="form-label">Phone</label>
    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" 
    required autofocus value="{{ old('phone') }}">
    @error('phone')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>
  
  <div class="mb-3">
    <label for="address" class="form-label">Address</label>
    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" 
    required autofocus value="{{ old('address') }}">
    @error('address')
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>
  
  <button type="submit" class="btn btn-primary">Create customer</button>
</form>
</div>

<script>
    const title = documnet.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/posts/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data = => slug.value = data.slug)
    });

    // document.addEventListener('tric-file-accept', function(e){
    //   e.preventDefault();
    // })

    function previewImage(){
      const image = document.querySelector('#image');
      const imgPreview = document.querySelector('.#img-preview');

      imgPreview.style.display = 'block';

      const oFReader= new FileReader();
      oFReader.readAsDataURL(image.files[0]);

      oFReader.onload = function(oFREvent){
        imgPreview.src = oFREvent.target.result;
      }
    }
</script>
@endsection