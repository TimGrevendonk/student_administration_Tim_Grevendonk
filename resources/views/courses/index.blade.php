@extends('layouts.template')

@section('title', 'title, student administration')

@section('css_after')
{{--    enter custom styles here--}}
@endsection

@section('main')
    <h1>Courses</h1>
{{--    import the search/filter bar--}}
    @include('courses.search')
    <div class="row">
{{--        go through each genre connected with the programmes--}}
        @foreach($courses as $course)
            <div class="col-sm-6 col-md-4 mb-3 d-flex">
                <div class="card flex-grow-1 d-flex">
                    <div class="card-body">
                        <h5 class="card-title">{{ $course->name }}</h5>
                        <p class="card-text">{{ $course->description }}</p>
                        <a href="{{ $course->programme->name }}">{{ $course->programme->name }}</a>
                    </div>
                    @auth
                    <div class="card-footer d-flex justify-content-between">
                        <a href="courses/{{ $course->id }}"
                           class="btn btn-primary btn-sm btn-block text-white">Manage students</a>
                    </div>
                    @endauth
                </div>
            </div>
        @endforeach
    </div>
@endsection

@section('script_after')
    <script>
        $(function () {
            // Add shadow to card on hover
            $('.card').hover(function () {
                $(this).addClass('shadow');
            }, function () {
                $(this).removeClass('shadow');
            });
            // submit form when leaving text field 'artist'
            $('#course').blur(function () {
                $('#searchForm').submit();
            });
            // submit form when changing dropdown list 'genre_id'
            $('#programme_id').change(function () {
                $('#searchForm').submit();
            });
        })
    </script>
@endsection
