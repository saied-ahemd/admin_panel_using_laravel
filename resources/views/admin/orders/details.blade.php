@extends('admin.layouts.master')

@section('page')
    Orders
@endsection

@section('content')
<div class="row">

    <div class="col-md-12">
        @include('admin.layouts.message')
        <div class="card">
            <div class="header">
                <h4 class="title">Order Detail</h4>
                <p class="category">Order Detail</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <tbody>

                        <tr>
                            <th>ID</th>
                            <td>{{$order->id}}</td>
                        </tr>

                        <tr>
                            <th>Date</th>
                            <td>{{$order->date}}</td>
                        </tr>

                        <tr>
                            <th>Quantity</th>
                            <td> 
                                @foreach ($order->orderItems as $item)
                                <ul>
                                    <li>{{$item->quantity}}</li>
                                </ul>
                                @endforeach
                            </td>
                        </tr>

                        <tr>
                            <th>Address</th>
                            <td>{{$order->address}}</td>
                        </tr>
                        <tr>
                            <th>price</th>
                            <td>
                                @foreach ($order->orderItems as $item)
                                   
                                <ul>
                                    <li>{{$item->price}}</li>
                                </ul>
                                @endforeach
                            </td>
                        </tr>

                        <tr>
                            <th>Status</th>
                            <td>
                                @if ($order->status)
                                <span class="label label-success">Confirmed</span>
                                @else
                                <span class="label label-warning">Pending</span>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th>Actions</th>
                            <td>
                                @if ($order->status)
                                <a class="btn btn-sm btn-warning"
                                title="Cancel Order" href="{{route('order.pending',$order->id)}}">pending</a>
                                @else
                                <a class="btn btn-sm btn-success"
                                title="confirm Order" href="{{route('order.confirm',$order->id)}}">confirm</a>
                                @endif
                            </td>
                        </tr>

                    </tbody>

                </table>

            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="header">
                <h4 class="title">User Detail</h4>
                <p class="category">User Detail</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <tbody>

                        <tr>
                            <th>ID</th>
                            <td>{{$order->user->id}}</td>
                        </tr>

                        <tr>
                            <th>Name</th>
                            <td>{{$order->user->name}}</td>
                        </tr>

                        <tr>
                            <th>Email</th>
                            <td>{{$order->user->email}}</td>
                        </tr>

                        <tr>
                            <th>Registed At</th>
                            <td>{{$order->user->created_at->diffForHumans()}}</td>
                        </tr>

                    </tbody>

                </table>

            </div>
        </div>

    </div>
    
    <div class="col-md-6">
        @include('admin.layouts.message')
        <div class="card">
            <div class="header">
                <h4 class="title"> Products Details</h4>
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
                        
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->product as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->price}}</td>
                            <td>{{$item->description}}</td>
                            <td><img src="../../uploads/{{$item->image}}" alt="image#" class="img-thumbnail"
                                     style="width: 50px"></td>
                            
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<a href="{{route('orders.index')}}" class="btn btn-success">Back To Orders</a>
    
@endsection