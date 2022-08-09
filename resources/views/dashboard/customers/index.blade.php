@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">My Customers</h1>
</div>

@if(session()->has('success'))
<div class="alert alert-success" role="alert">
  {{ session('success') }}
</div>
@endif

<div class="table-responsive col-lg-8">
  <a href="/dashboard/customers/create" class="btn btn-primary mb-3">Create new customer</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">First Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Email</th>
              <th scope="col">Phone</th>
              <th scope="col">Address</th>
            </tr>
          </thead>
          <tbody>
            @foreach($customers as $customer)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $customer->first_name }}</td>
              <td>{{ $customer->last_name }}</td>
              <td>{{ $customer->email }}</td>
              <td>{{ $customer->phone }}</td>
              <td>{{ $customer->address }}</td>
              <td>
                <a href="/dashboard/posts/{{ $customer->first_name }}" class="badge bg-info"><span data-feather="eye">
                </span></a>
                <a href="/dashboard/posts/{{ $customer->first_name }}/edit" class="badge bg-warning"><span data-feather="edit">
                </span></a>
                <form action="/dashboard/posts/{{ $customer->first_name }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Are you sure?')">
                  <span data-feather="x-circle"></span></button>
                </form>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
@endsection