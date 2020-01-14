@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Product List <a href="{{ route('product.create') }}" type="button" class="btn btn-primary">Add New</a></div>

                <div class="panel-body">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Sku</th>
                            <th scope="col">Name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Description</th>
                            <th scope="col"></th>
                         </tr>
                        </thead>
                        <tbody>
                        @if(!$products->isEmpty())
                        @foreach($products as $key=>$product)
                            <tr>
                                <th>{{$key+1 }}</th>
                                <td>{{$product->sku}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->description}}</td>
                                <th><a href="{{ route('product.show',['id'=>$product->id]) }}"  role="button" aria-expanded="false">
                                    View Details
                                    </a></th>
                            </tr>
                        @endforeach
                        @else
                        <tr col-span="5" style="text-align:center">
                            <th>No Data</th>
                        </tr>
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection