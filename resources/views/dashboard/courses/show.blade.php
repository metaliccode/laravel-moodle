@extends('dashboard.layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Detail Courses</h1>
    <a href="{{ route('courses.index') }}" class="btn btn-primary">Back</a>
</div>

<div class="card" style="width: 18rem;">
<img src="/image/{{ $course->image }}" class="card-img-top" alt="{{ $course->image }}">
<div class="card-body">
    <h5 class="card-title">{{ $course->coursename }}</h5>
    <p class="card-text">{{ $course->deskripsi }}</p>
</div>
</div>
@endsection
