@extends('layouts.app')
@section('title', 'Просмотр товара '.$category->id)

@section('content')
    <div class="card">
        <div class="card-body">
            <h3>id: {{$category->id}}</h3>
            <p>Название: {{$category->name}}</p>
            <p>parent_id: {{$category->parent_id}}</p>
            <p>external_id: {{$category->external_id}}</p>
        </div>
    </div>
@endsection