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
                <h4 class="title">Orders</h4>
                <p class="category">List of all orders</p>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>User</th>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->user->name}}</td>
                            <td>
                                @foreach ($order->product as $item)
                                  <ul>
                                      <li>{{$item->name}}</li>
                                  </ul>
                                @endforeach
                            </td>
                            <td>
                                @foreach ($order->orderItems as $item)
                                  <ul>
                                      <li>{{$item->quantity}}</li>
                                  </ul>
                                @endforeach
                            </td>
                            </td>
                            <td>{{$order->address}}</td>

                            <td>
                                @if ($order->status)
                                <span class="label label-success">Confirmed</span>
                                @else
                                <span class="label label-warning">Pending</span>
                                @endif
                                
                            </td>
                            <td>

                                @if ($order->status)
                                <a class="btn btn-sm btn-warning"
                                title="Cancel Order" href="{{route('order.pending',$order->id)}}">pending</a>
                                @else
                                <a class="btn btn-sm btn-success"
                                title="confirm Order" href="{{route('order.confirm',$order->id)}}">confirm</a>
                                @endif
                               

                                    
    
                                <a class="btn btn-sm btn-primary ti-view-list-alt"
                                        title="Details" href="{{route('orders.show',$order->id)}}"></a>
                            </td>
                        </tr>
                        @empty
                            
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection