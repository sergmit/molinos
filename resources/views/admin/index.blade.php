@extends('layouts.main')

@section('content')
    <h2>Admin</h2>
    @foreach($errors->all() as $error)
        <div class="alert alert-danger">{{ $error }}</div>
    @endforeach
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
                    <form method="post" class="form-inline"
                          action="{{ route('feedback.destroy', ['feedback' => $item]) }}">
                        @csrf
                        {{ method_field('DELETE') }}
                        <button class="btn btn-danger">Delete</button>
                    </form>
                    <button data-toggle="modal" data-target="#modalAnswer"
                            data-id="{{ $item->id }}" class="btn btn-info mt-1 answer">Answer</button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="modal fade" id="modalAnswer" data-keyboard="false" tabindex="-1"
         role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Answer</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="/admin/answer">
                        @csrf
                        <input type="hidden" name="feedbackId">
                        <div class="form-group">
                            <label for="answer">Answer</label>
                            <textarea name="answer" class="form-control" id="answer" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
