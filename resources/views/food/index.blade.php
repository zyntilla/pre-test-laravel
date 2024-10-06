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
            <div class="card">
                <div class="card-header">All Foods</div>

                <div class="card-body">
                    
                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">No.</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Price</th>
                                <th scope="col">Category</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(count($foods)>0)
                            @foreach($foods as $key=>$food)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td><img src="{{asset('image')}}/{{$food->image}}" width="100"></td>
                                <td>{{$food->name}}</td>
                                <td>{{$food->description}}</td>
                                <td>{{$food->price}}</td>
                                <td>{{$food->category_id}}</td>
                                <td>
                                    <a href="{{route('food.edit', [$food->id])}}"><button class="btn btn-outline-success">Edit</button></a>
                                </td>
                                <td>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal{{$food->id}}">
                                    Delete
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal{{$food->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form action="{{ route('food.destroy', [$food->id]) }}" method="post">
                                            @csrf 
                                            {{method_field('DELETE')}}
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                Apakah anda yakin?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-outline-danger">Delete</button>
                                            </div>
                                            </div>
                                        </form>
                                    </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @else
                            <td>Tidak ada Kategori yang dapat ditampilkan</td>
                            @endif
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection