@extends('layouts.app')
@section('title', 'Просмотр товара '.$product->id)

@section('content')
    <div class="card">
        <div class="card-body">
            <h3>id: {{$product->id}}</h3>
            <p>Название: {{$product->name}}</p>
            <p>Описание: {{$product->description}}</p>
            <p>Дата создания: {{$product->creation_at}}</p>
            <p>Цена: {{$product->price}}</p>
            <p>Количество: {{$product->quantity}}</p>
            <p>category_id: {{$product->category_id}}</p>
            <p>external_id: {{$product->external_id}}</p>
        </div>
    </div>
@endsection