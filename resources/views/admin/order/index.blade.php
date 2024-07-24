@extends('admin/layout/layout')


@section('mycss')
<link rel="stylesheet" href="{{asset('/css/mycode/admin/table.css')}}">
<link rel="stylesheet" href="{{asset('/css/mycode/admin/layouttitle.css')}}">
<link rel="stylesheet" href="{{asset('/css/mycode/admin/order.css')}}">
@endsection

@section('contents')
<div class="layouttitle">
    <section class="header">
        <div class="title">
            <h1>Order List</h1>
            <span>IShopApple Admin Panel</span>
        </div>
    </section>
    <section class=body>
        <h3>Order Lists</h3>
        <hr>
        <table border="1">
            <thead>
                <td>ID</td>
                <td>Image</td>
                <td>Name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Address</td>
                <td>Date</td>
                <td>Status</td>
                <td>Total</td>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach($order as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>
                        <img src="{{asset($item->customers->image)}}" alt="" width="50" height="50" style="border-radius:50%">
                
                    </td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->address}}</td>
                    <td>{{$item->date}}</td>
                    <td>
                        @if($item->status == 'complete')
                        <div class="success"></div>
                        @else
                        <div class="processing"></div>
                        @endif
                    </td>
                    <td>${{$item->total}}</td>
                    <td class="action">
                        <form action="{{route('order.destroy',$item->id)}}" method="post" style="display:inline">
                            @csrf
                            @method("DELETE")
                            <button type="submit">
                                <i class="fa-solid fa-delete-left"></i>
                            </button>
                        </form>
                        <button><a href="{{route('order.show',$item->id)}}" style="color:blue"><i class="fa-solid fa-circle-info"></i></a></button>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot></tfoot>
        </table>
    </section>

</div>@endsection

@section('myjs')
<script>
    $(document).ready(function() {
        $('.btn-search').on('click', function() {
            var valuesearch = $('.valuesearch').val();
            window.location.href = "{{ route('searchorder', ['valuesearch' => 'replacevaluesearch']) }}".replace('replacevaluesearch', valuesearch);
        });
    });
</script>
@endsection