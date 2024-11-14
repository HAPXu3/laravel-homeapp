@extends('layouts.main')

@section('content')
    <div class="row justify-content-center mt-5">
        <form class="col-3" method="POST">
            <div class="mb-3">
                <label for="nickname" class="form-label">Никнейм</label>
                <input class="form-control" id="nickname" type="text" name="nickname">
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input class="form-control" id="password" type="password" name="password" aria-describedby="passwordHelp">
                <div id="passwordHelp" class="form-text">
                    Пароль должен состоять минимум из 255 символов, включать буквы, цифры, специальные символы, иероглифы, старославянский алфавит
                </div>
            </div>

            <button class="btn btn-primary w-100" type="submit">Зарегистрироваться</button>
            @csrf
        </form>
    </div>
@endsection
