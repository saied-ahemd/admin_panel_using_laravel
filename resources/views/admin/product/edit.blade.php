@extends('admin.layouts.master')

@section('page')
    Edit PRODUCTS
@endsection

@section('content')

<div class="row">
    <div class="col-lg-10 col-md-10">
        @include('admin.layouts.message')
        <div class="card">
            <div class="header">
                <h4 class="title">Edit Product</h4>
            </div>
            <div class="content">
                {{-- @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger">
                        {{$error}}
                    </div>
                @endforeach
                @endif --}}
                
                

              <form action="{{route('products.update',$product->id)}}" method="POST"  files="true" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Product Name:</label>
                                <input type="text" class="form-control border-input" placeholder="Macbook pro" name="name" value="{{$product->name}}">
                            </div>

                            <div class="form-group">
                                <label>Product Price:</label>
                                <input type="text" class="form-control border-input  @error('price') is-invalid @enderror " placeholder="$2500" name="price" required value="{{$product->price}}">

                                @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong> {{ $message }}</strong>
                                </span>
                                @enderror
                                
                            </div> 

                            <div class="form-group">
                                <label>Product Description:</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control border-input" placeholder="Product Description" required > {{$product->description}} </textarea>
                            </div>

                            <div class="form-group">
                                <label>Product Image:</label>
                                <input type="file" class="form-control border-input" name="image"  id="image"> 
                                <div id="thumb-output" style="padding:10px ">
                                    <img src="../../uploads/{{$product->image}}" alt="Product image" class="thumb"></td>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                    <div >
                        <button type="submit" class="btn btn-info btn-fill btn-wd">Update Product</button>
                    </div>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection