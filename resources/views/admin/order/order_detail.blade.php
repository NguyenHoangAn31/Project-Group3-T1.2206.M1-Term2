@extends('admin/layout/layout')
<link rel="stylesheet" href="{{asset('/css/mycode/admin/table.css')}}">
<link rel="stylesheet" href="{{asset('/css/mycode/admin/layouttitle.css')}}">

@section('mycss')
@endsection

@section('contents')

<div class="layouttitle">
    <section class="header">
        <div class="title">
            <h1>Order Detail List</h1>
            <span>IShopApple Admin Panel</span>
        </div>
    </section>
    <section class=body>
        <h3>Order Detail Lists</h3>
        <hr>
        <table border="1">
            <thead>
                <td>Id</td>
                <td>Order Id</td>
                <td>Customer Id</td>
                <td>Category Id</td>
                <td>Product Id</td>
                <td>Quantity</td>
                <td>Price</td>
                @if($order_status == 'processing')
                <th>action</th>
                @endif
            </thead>
            <tbody>
                @foreach($orderdetail as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->order_id}}</td>
                    <td>{{$item->orders->customer_id}}</td>
                    <td>{{$item->categories->name}}</td>
                    <td>{{$item->product_id}}</td>
                    <td>{{$item->quantity}}</td>
                    <td>${{$item->price}}</td>
                    @if($order_status == 'processing')
                    <th>
                        <form action="{{route('orderdetail.destroy',$item->id)}}" method="post" style="display:inline">
                            @csrf
                            @method("DELETE")
                            <button type="submit">
                                <i class="fa-solid fa-delete-left"></i>
                            </button>
                        </form>
                    </th>
                    @endif
                </tr>
                @endforeach
            </tbody>
            <tfoot>
            </tfoot>
        </table>
        @if($order_status == 'processing')
        <button class="confirm"><a href="{{route('confirm_order',$order_id)}}">Confirm</a></button>
        @endif
    </section>

</div>@endsection

@section('myjs')
@endsection