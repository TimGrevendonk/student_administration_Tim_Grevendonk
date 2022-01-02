@extends('layouts.template')

@section('title', 'Programmes')

@section('main')
    <h1>Programmes</h1>
    @include('shared.alert')
    <p>
        <a href="/admin/programmes/create" class="btn btn-outline-success">
            <i class="fas fa-plus-circle mr-1"></i>Create new programme
        </a>
    </p>
    <div class="table-responsive">
        <ul class="list-group">
            @foreach($programmes as $programme)
                <li class="list-group-item">
                    <div class="row">
                        <a href="/admin/programmes/{{ $programme->id }}/show" class="col-10">{{ $programme->name }}</a>
                        <form action="/admin/programmes/{{ $programme->id }}" method="post" class="col-2">
                            @csrf
                            @method('delete')
                            <div class="btn-group btn-group-sm">
                                <a href="/admin/programmes/{{ $programme->id }}/edit" class="btn btn-outline-success"
                                   data-toggle="tooltip"
                                   title="Edit {{ $programme->name }}">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" class="btn btn-outline-danger deleteProgramme"
                                        data-toggle="tooltip"
                                        data-records="{{ $programme->courses->count() }}"
                                        data-name="{{$programme->name}}"
                                        title="Delete {{ $programme->name }}">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
        @endsection

        @section('script_after')
            <script>
                $('.deleteProgramme').click(function () {
                    const records = $(this).data('records');
                    let msg = `Delete this programme?`;
                    if (records > 0) {
                        msg += `\nThe ${records} courses of this programme will also be deleted!`
                    }
                    if (confirm(msg)) {
                        $(this).closest('form').submit();
                    }
                })
            </script>
@endsection
