@extends('layouts.main')

@section('content')
    <h2>Admin</h2>
    <table class="table">
        <thead>
        <tr>
            <th>
                №
            </th>
            <th style="width: 25%;">
                Question
            </th>
            <th>
                Name
            </th>
            <th>
                Email
            </th>
            <th>
                Files
            </th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($feedback as $item)
            <tr>
                <td>
                    {{ $item->id }}
                </td>
                <td>
                    {{ $item->question }}
                </td>
                <td>
                    {{ $item->name }}
                </td>
                <td>
                    {{ $item->email }}
                </td>
                <td>
                    <ul class="list-group">
                        @foreach($item->files as $file)
                            <li class="list-group-item">
                                <a href="/files/{{ $file->id }}">File {{ $loop->iteration }}</a>
                            </li>
                        @endforeach
                    </ul>
                </td>
                <td>
                    <form method="post" class="form-inline" action="{{ route('feedback.destroy', ['feedback' => $item]) }}">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger" href=")">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
