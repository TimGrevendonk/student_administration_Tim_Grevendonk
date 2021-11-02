@extends('layouts.template')

@section('title', 'title, student administration')

@section('main')
    <h1>Courses</h1>
    <p>You selected the course with id: {{$id}}</p>
    <p>list of students enrolled</p>
@endsection
