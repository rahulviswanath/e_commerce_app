@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Product Details</div>

                <div class="panel-body">
                    <form class="form-horizontal">
                    <div class="form-group">
                        <label class="col-md-4 control-label">Sku</label>
                        <div class="col-md-6">
                            {{ $product->sku }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Name</label>
                        <div class="col-md-6">
                            {{ $product->name }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Price</label>
                        <div class="col-md-6">
                            {{ $product->price }}
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Description</label>
                        <div class="col-md-6">
                            {{ $product->description }}
                        </div>
                    </div>
                    <h4>Attributes</h4>
                    @if($productAttributes)
                    @foreach($productAttributes as $productAttribute)
                    <div class="form-group">
                    <label class="col-md-4 control-label">{{ $productAttribute->attribute->title }}</label>
                        <div class="col-md-6">
                            {{ $productAttribute->value }}
                        </div>
                    </div>
                    @endforeach
                    @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection