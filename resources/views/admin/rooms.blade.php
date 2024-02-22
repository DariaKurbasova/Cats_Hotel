@extends('main', ['title' => 'Вольеры'])

@section('content')
    <h1>Вольеры</h1>

    <admin-rooms :rooms="{{ $rooms->toJson() }}"/>
@endsection
