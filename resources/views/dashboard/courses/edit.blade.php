@extends('dashboard.layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Courses</h1>
    <a href="{{ route('courses.index') }}" class="btn btn-primary">Back</a>
</div>

<form action="{{ route('courses.update', $course->id) }}" enctype="multipart/form-data" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3 col-md-6">
      <label for="coursename" class="form-label">Course Name</label>
      <input type="text" class="form-control @error('coursename') is-invalid @enderror" id="coursename" name="coursename" value="{{ $course->coursename }}">
      @error('coursename')
        <div id="validationServer03Feedback" class="invalid-feedback">
            {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3 col-md-6">
      <label for="deskripsi" class="form-label">Deskripsi</label>
      <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi" id="deskripsi" rows="4" value="{{ $course->deskripsi }}">{{ $course->deskripsi }}</textarea>
      @error('deskripsi')
        <div id="validationServer03Feedback" class="invalid-feedback">
            {{ $message }}
        </div>
      @enderror
    </div>
    <div class="mb-3 col-md-6">
        <label for="formFile" class="form-label">Image</label>
        <img src="/image/{{ $course->image }}" alt="{{ $course->image }}" width="100" class="mb-3">
        <input class="form-control @error('image') is-invalid @enderror" type="file" id="formFile" name="image">
        @error('deskripsi')
        <div id="validationServer03Feedback" class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
    </div>


    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
