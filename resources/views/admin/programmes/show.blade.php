@extends('layouts.template')

@section('title', 'student administration')

@section('main')
    <h1>{{ $programme->name }}</h1>
    {{--    need to change this check if below check is found out!!!! !!!!--}}
    @if ( $programme->courses->count() == 0)
        <div class="alert alert-danger alert-dismissible fade show">
            No students enrolled in this programme!
        </div>
    @else
        <div>Courses:</div>
    @endif
    <ul>
        @foreach($programme->courses as $course)
            {{--            for the course set the enrolled students with the semester after it--}}
            <li >{{ $course->name }}</li>
        @endforeach
    </ul>
@endsection
