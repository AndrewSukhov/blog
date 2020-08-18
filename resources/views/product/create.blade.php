@extends('layouts.app')
@section('title', 'Добавить товар')

{{--@section('sidebar')--}}
{{--@parent--}}

{{--<p>This is appended to the master sidebar.</p>--}}
{{--@endsection--}}

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
            <form method="post" action="{{route('product.store')}}">

                @csrf

                <div class="form-group">
                    <label for="product-name">Название</label>
                    <input value="{{ old('name') }}" type="text" name="name"  class="form-control" id="product-name" placeholder="Название товара">
                </div>
                <div class="form-group">
                    <label for="post-description">Описание</label>
                    <input value="{{ old('description') }}" type="text" name="description"  class="form-control" id="post-description" placeholder="Описание товара">
                </div>
                <div class="form-group">
                    <label for="post-price">Цена</label>
                    <input value="{{ old('price') }}" type="text" name="price"  class="form-control" id="post-price" placeholder="Цена">
                </div>
                <div class="form-group">
                    <label for="post-quantity">Количество</label>
                    <input value="{{ old('quantity') }}" type="text" name="quantity"  class="form-control" id="post-quantity" placeholder="Количество">
                </div>
                <div class="form-group">
                    <label for="post-category_id">category_id</label>
                    <input value="{{ old('category_id') }}" type="text" name="category_id"  class="form-control" id="post-category_id" placeholder="category_id">
                </div>
                <div class="form-group">
                    <label for="post-external_id">external_id</label>
                    <input value="{{ old('external_id') }}" type="text" name="external_id"  class="form-control" id="post-external_id" placeholder="external_id">
                </div>
                <button type="submit" class=" btn btn-success">Добавить товар</button>
            </form>
        </div>
    </div>
@endsection