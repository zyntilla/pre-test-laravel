@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif
            <form action="{{route('food.store')}}" method="post" enctype="multipart/form-data">
                @csrf
            <div class="card">
                <div class="card-header">Add new food</div>

                <div class="card-body">
                    <div class="form-group">
                        <label for="name">name</label>
                        <input type="text" name="name" class="form-control @error('name')is-invalid @enderror">
                        @error('name')
                        <span class="invalid-feedback" role "alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">description</label>
                        <input type="text" name="description" class="form-control @error('description')is-invalid @enderror">
                        @error('description')
                        <span class="invalid-feedback" role "alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">price</label>
                        <input type="text" name="price" class="form-control @error('price')is-invalid @enderror">
                        @error('price')
                        <span class="invalid-feedback" role "alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category">Category</label>
                        <select name="category" class="form-control @error('category')is-invalid @enderror">
                        <option value="">-- choose category --</option>
                            @foreach(App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <span class="invalid-feedback" role "alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">image</label>
                        <input type="file" name="image" class="form-control @error('image')is-invalid @enderror">
                        @error('image')
                        <span class="invalid-feedback" role "alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <br>
                    <div class="form-group">
                        <button class="btn btn-outline-primary" type="submit">submit</button>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
@endsection