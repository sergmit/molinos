@extends('layouts.main')

@section('content')
    <div class="row">
        <div class="col-md-8 offset-md-2 ">
            @foreach($errors->all() as $error)
                <div class="alert alert-danger">{{ $error }}</div>
            @endforeach
            <div class="card mt-5">
                <div class="card-header">
                    Форма обратной связи
                </div>
                <div class="card-body">
                    <form action="/feedback" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="question">Вопрос</label>
                            <input class="form-control" name="question"
                                   type="text" id="question" value="">
                        </div>
                        <div class="form-group">
                            <label for="name">Имя</label>
                            <input class="form-control" name="name" id="name" type="text" value="">
                        </div>
                        <div class="form-group">
                            <label for="email">Почта</label>
                            <input class="form-control" name="email" id="email" type="email" value="">
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="files[]" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Выбирете файл</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="files[]" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Выбирете файл</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="files[]" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Выбирете файл</label>
                            </div>
                        </div>
                        <button class="btn btn-primary">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
