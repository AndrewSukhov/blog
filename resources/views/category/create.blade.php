@extends('layouts.app')
@section('title', 'Добавить категорию')

@section('content')
    <div class="row">
        <div class="col-lg-6 mx-auto">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{route('category.store')}}">
                @csrf
                <div class="form-group">
                    <label for="product-name">Название</label>
                    <input value="{{ old('name') }}" type="text" name="name"  class="form-control" id="product-name" placeholder="Название товара">
                </div>
                <div class="form-group">
                    <label for="post-parent_id">parent_id</label>
                    <input value="{{ old('parent_id') }}" type="text" name="parent_id"  class="form-control" id="post-description" placeholder="Описание товара">
                </div>
                <div class="form-group">
                    <label for="post-external_id">external_id</label>
                    <input value="{{ old('external_id') }}" type="text" name="external_id"  class="form-control" id="post-price" placeholder="Цена">
                </div>
                <button type="submit" class=" btn btn-success">Добавить товар</button>
            </form>
        </div>
    </div>
@endsection