@extends('admin.layouts.master')

@section('page')
   User Order Details
@endsection

@section('content')
<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title">{{$orders[0]->user->name}} Orders Details</h4>
                <p class="category">List of all registered users</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Product name</th>
                        <th>Address</th>
                        <th>Quantity</th>
                        <td>Total Price</td>
                        <td>Order Date</td>
                        <td>Status</td>
                        
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->product[0]->name}}</td>
                            <td>{{$order->address}}</td>
                            <td>{{$order->orderItems[0]->quantity}}</td>
                            <td>{{$order->orderItems[0]->price}}</td>
                            <td>{{$order->date}}</td>
                            <td>
                                @if ($order->status)
                                <span class="label label-success">Confirmed</span>
                                @else
                                <span class="label label-warning">Pending</span>
                                @endif
                                
                            </td>
                        </tr>
                        @empty
                            <div class="alert alert-info">
                                there is no orders
                            </div>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection