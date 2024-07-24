@extends('admin/layout/layout')


@section('mycss')
<link rel="stylesheet" href="{{asset('/css/mycode/admin/layouttitle.css')}}">
<link rel="stylesheet" href="{{asset('/css/mycode/admin/add_all_object.css')}}">
@endsection

@section('contents')
<div class="layouttitle">
    <section class="header">
        <div class="title">
            <h1>Edit Iphone</h1>
            <span>IShopApple Admin Panel</span>
        </div>
    </section>
    <section class="body">
        <h2>Iphone Information</h1>
            <p>Edit information name , category , color , ram , capacity , price , quantity of your iphone.</p>
            <form action="{{route('iphone.update',$iphone->id)}}" method="post">
                @csrf
                @method("PUT")
                <div>
                    <label for="categorydetail_id">Category</label><br>
                    <select name="categorydetail_id" id="">
                    <option value="{{$iphone->categorydetails->id}}">{{$iphone->categorydetails->name}}</option>
                        @foreach($categorydetail as $item)
                        @if($item->id != $iphone->categorydetails->id)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <input style="display: none;" type="text" name="category_id" value="1">

                <div>
                    <label for="color_id">Color</label><br>
                    <select name="color_id" id="">
                        <option value="{{$iphone->colors->id}}">{{$iphone->colors->name}}</option>

                        @foreach($color as $item)
                        @if($item->id != $iphone->colors->id)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="ram_ud">Ram</label><br>
                    <select name="ram_id" id="">
                    <option value="{{$iphone->rams->id}}">{{$iphone->rams->name}}</option>

                        @foreach($ram as $item)
                        @if($item->id != $iphone->rams->id)

                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="capacity_id">Capacity</label><br>
                    <select name="capacity_id" id="">
                    <option value="{{$iphone->capacities->id}}">{{$iphone->capacities->name}}</option>

                        @foreach($capacity as $item)
                        @if($item->id != $iphone->capacities->id)

                        <option value="{{$item->id}}">{{$item->name}}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div>
                    <label for="price">Price</label><br>
                    <input type="text" name="price" id="price" value="{{$iphone->price}}" required>
                </div>
                <div>
                    <label for="quantity">quantity</label><br>
                    <input type="text" name="quantity" id="quantity" value="{{$iphone->quantity}}" required>
                </div>

                <div>
                    <label for="description">Description</label><br>
                    <textarea name="description" id="" cols="50" rows="10">{{$iphone->description}}</textarea>
                </div>

                <button type="submit">Update</button>
            </form>
    </section>

</div>
@endsection

@section('myjs')

@end