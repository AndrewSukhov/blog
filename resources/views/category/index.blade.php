@extends('layouts.app')
@section('title', 'Категории')

@section('content')

    <a href="{{ route('category.create') }}" class="btn btn-success">Создание новой категории</a>

    @if(session()->get('success'))
        <div class="alert alert-success mt-3">
            {{ session()->get('success') }}
        </div>
    @endif

    <table class="table table-striped mt-3" >
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Название</th>
            <th scope="col">parent_id</th>
            <th scope="col">external_id</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($category as $item)
        <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->parent_id}}</td>
            <td>{{$item->external_id}}</td>

            <td style="text-align:right;">
            <a href="{{ route('category.show', $item->id) }}" class="btn btn-info">View</a>
            <a href="{{ route('category.edit', $item->id) }}" class="btn btn-success">Edit</a>
                <form method="post" action="{{ route('category.destroy', $item->id) }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit" >
                        <i class="fa fa-trash"></i>
                    </button>
                </form>
            </td>
        </tr>
            @endforeach
        </tbody>
    </table>
    <div> {{$category->links()}} </div>
@endsection