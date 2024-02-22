@extends('main', ['title' => 'Бронирование'])

@section('content')
    <h1>Выберите подходящий вольер</h1>
    <p>
        Подробнее о типах размещений вы можете прочитать на странице
        <a href="/about#rooms">"О нас"</a>
    </p>
    <rooms-list :rooms="{{ $rooms->toJson() }}"/>
@endsection
