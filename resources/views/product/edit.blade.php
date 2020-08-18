@extends('layouts.app')
@section('title', 'Редактировать товар '.$product->id)

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

            <form method="post" action="{{ route('product.update', $product->id) }}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="product-name">Название</label>
                    <input value="{{ $product->name }}" type="text" name="name"  class="form-control" id="product-name" placeholder="Название товара">
                </div>
                <div class="form-group">
                    <label for="post-description">Описание</label>
                    <input value="{{ $product->description }}" type="text" name="description"  class="form-control" id="post-description" placeholder="Описание товара">
                </div>
                <div class="form-group">
                    <label for="post-creation_at">Дата создания</label>
                    <input value="{{ $product->creation_at }}" type="text" name="creation_at"  class="form-control" id="post-creation_at" placeholder="Дата создания">
                </div>
                <div class="form-group">
                    <label for="post-price">Цена</label>
                    <input value="{{ $product->price }}" type="text" name="price"  class="form-control" id="post-price" placeholder="Цена">
                </div>
                <div class="form-group">
                    <label for="post-quantity">Количество</label>
                    <input value="{{ $product->quantity }}" type="text" name="quantity"  class="form-control" id="post-quantity" placeholder="Количество">
                </div>
                <div class="form-group">
                    <label for="post-category_id">category_id</label>
                    <input value="{{ $product->category_id }}" type="text" name="category_id"  class="form-control" id="post-category_id" placeholder="category_id">
                </div>
                <div class="form-group">
                    <label for="post-external_id">external_id</label>
                    <input value="{{ $product->external_id }}" type="text" name="external_id"  class="form-control" id="post-external_id" placeholder="external_id">
                </div>
                <button type="submit" class=" btn btn-success">Редактировать товар</button>
            </form>
        </div>
    </div>
@endsection