@extends('admin.layouts.master')

@section('page')
    Products
@endsection

@section('content')
<div class="row">

    <div class="col-md-12">
        @include('admin.layouts.message')
        <div class="card">
            <div class="header">
                <h4 class="title">All Products</h4>
                <p class="category">List of all stock</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Desc</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                    <tr>
                        <td>{{$product->id}}</td>
                        <td>{{$product->name}}</td>
                        <td>${{$product->price}}</td>
                        <td>{{$product->description}}</td>
                        <td><img src="../../uploads/{{$product->image}}" alt="image#" class="img-thumbnail"
                                 style="width: 50px"></td>
                        <td>
                            {{-- DELETE --}}
                           <form action="{{route('products.destroy',$product->id)}}">
                            @csrf
                            {{-- edit --}}
                            <a class="btn btn-sm btn-info ti-pencil-alt"
                            title="Edit" type="button" href="{{route('products.edit',$product->id)}}"></a>

                            <button class="btn btn-sm btn-danger ti-trash" title="Delete" type="submit" onclick="return confirm('Are You sure You want to Delete This Item ?')"></button>

                            {{--  Details --}}

                           <a class="btn btn-sm btn-primary ti-view-list-alt"
                           title="Details" type="button" href="{{route('products.show',$product->id)}}"></a>
                           </form>
                        </td>
                    </tr>
                    @empty
                      <div class="alert alert-info text-center" style="font-size: 20px">
                          there is no item
                      </div>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection