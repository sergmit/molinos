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
                            <input required class="form-control" name="question"
                                   type="text" id="question" value="">
                        </div>
                        <div class="form-group">
                            <label for="name">Имя</label>
                            <input required class="form-control" name="name" id="name" type="text" value="">
                        </div>
                        <div class="form-group">
                            <label for="email">Почта</label>
                            <input required class="form-control" name="email" id="email" type="email" value="">
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="files[]" class="custom-file-input" id="file1">
                                <label class="custom-file-label" for="file1">Выбирете файл</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="files[]" class="custom-file-input" id="file2">
                                <label class="custom-file-label" for="file2">Выбирете файл</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" name="files[]" class="custom-file-input" id="file3">
                                <label class="custom-file-label" for="file3">Выбирете файл</label>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! html_entity_decode(captcha_img()) !!}
                        </div>
                        <div class="form-group">
                            <label for="captcha">Captcha</label>
                            <input required class="form-control" name="captcha" id="captcha" type="text">
                        </div>
                        <button class="btn btn-primary">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
