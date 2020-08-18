@extends('layouts.app')
@section('title', 'Редактировать категорию '.$category->id)

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

            <form method="post" action="{{ route('category.update', $category->id) }}">
                @csrf
                @method('PATCH')
                <div class="form-group">
                    <label for="product-name">Название</label>
                    <input value="{{ $category->name }}" type="text" name="name"  class="form-control" id="product-name" placeholder="Название товара">
                </div>
                <div class="form-group">
                    <label for="post-parent_id">parent_id</label>
                    <input value="{{ $category->parent_id }}" type="text" name="parent_id"  class="form-control" id="post-description" placeholder="Описание товара">
                </div>
                <div class="form-group">
                    <label for="post-creation_at">external_id</label>
                    <input value="{{ $category->external_id }}" type="text" name="external_id"  class="form-control" id="post-creation_at" placeholder="Дата создания">
                </div>
                <button type="submit" class=" btn btn-success">Редактировать категорию</button>
            </form>
        </div>
    </div>
@endsection