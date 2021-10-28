@extends('dashboard.layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Courses</h1>
</div>
@if (session()->has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif


{{-- table --}}
<div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Image</th>
          <th scope="col">Course Name</th>
          <th scope="col">Deskripsi</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($courses as $course)
            <tr>
              <td>
                  {{ $loop->iteration }}
              </td>
              <td><img src="/image/{{ $course->image }}" alt="" height="50"></td>
              <td>{{ $course->coursename }}</td>
              <td>{{ $course->deskripsi }}</td>
              <td>
                <form action="{{ route('courses.destroy', $course->id) }}" method="POST">
                    <a href="{{ route('courses.show', $course->id) }}" class="btn text-primary"><span data-feather="eye"></span></a>
                    <a href="{{ route('courses.edit', $course->id) }}" class="btn text-warning"><span data-feather="edit"></span></a>

                    @csrf
                    @method('DELETE')
                    <button class="btn text-danger"><span data-feather="trash"></span></button>
                </form>
              </td>
            </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="row">
      <div class="col-lg-12 margin-tb">
          <a class="btn btn-primary" href="{{ route('courses.create') }}">
              <span data-feather="plus"></span> Add
          </a>
      </div>
  </div>
@endsection

