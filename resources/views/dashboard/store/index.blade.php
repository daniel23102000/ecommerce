@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Product</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success col-lg-8" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive col-lg-8">
        <table class="table table-striped table-sm">
          <thead>
          <tbody>
            @foreach($posts as $post)
            <tr>
              <td>{{ $post->title }}</td>
              <td>{{ $post->category->name }}</td>
              <td>
              {!! $post->body !!}
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

<form action="/action_page.php">
  <label for="fname">First name:</label><br>
  <input type="text" id="fname" name="fname"><br>
  <label for="lname">Last name:</label><br>
  <input type="text" id="lname" name="lname"><br><br>
  <input type="submit" value="Submit">
</form> 
@endsection