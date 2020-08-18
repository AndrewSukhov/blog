@extends('layouts.app')
@section('title', 'Товары')

@section('content')
    <a href="{{ route('product.create') }}" class="btn btn-success">Создание нового товара</a>
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
            <th scope="col">Описание</th>
            <th scope="col">Дата создания</th>
            <th scope="col">Цена</th>
            <th scope="col">Остаток</th>
            <th scope="col">Категории</th>
            <th scope="col">external id</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $item)
        <tr>
            <th scope="row">{{$item->id}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->description}}</td>
            <td>{{$item->creation_at}}</td>
            <td>{{$item->price}}</td>
            <td>{{$item->quantity}}</td>
            <td>{{$item->category_id}}</td>
            <td>{{$item->external_id}}</td>

            <td class="table-buttons">
                <a href="{{ route('product.show', $item->id) }}" class="btn btn-success">
                    <i class="fa fa-eye"></i>
                </a>
                <a href="{{ route('product.edit', $item->id) }}" class="btn btn-primary">
                    <i class="fa fa-pencil"></i>
                </a>

                <form method="post" action="{{ route('product.destroy', $item->id) }}">
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
    <div>
        {{$products->links()}}
    </div>
@endsection