@extends('layouts.template')

@section('title', 'Edit programme')

@section('main')
    <h1>Edit programme: {{ $programme->name }}</h1>
    <form action="/admin/programmes/{{ $programme->id }}" method="post">
        @method('put')
        @include('admin.programmes.form')

    </form>
@endsection
