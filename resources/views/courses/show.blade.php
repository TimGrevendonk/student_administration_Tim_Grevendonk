@extends('layouts.template')

@section('title', 'student administration')

@section('main')
    <h1>{{ $courses->name }}</h1>
    <p>{{ $courses->description }}</p>
{{--    need to change this check if below check is found out!!!! !!!!--}}
    @if ( $courses->studentCourses->count() == 0)
        <div class="alert alert-danger alert-dismissible fade show">
            No students enrolled!
        </div>
    @else
        <div>List of students enrolled:</div>
    @endif
    <ul>
        @foreach($studentCourses as $studentCourse)
{{--            for the course set the enrolled students with the semester after it--}}
            <li >{{ $studentCourse->student->first_name }}
                {{ $studentCourse->student->last_name }}
                (semester {{ $studentCourse->semester }})</li>
        @endforeach
    </ul>
@endsection
