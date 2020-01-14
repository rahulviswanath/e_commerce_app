@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add New Product</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('product.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('sku') ? ' has-error' : '' }}">
                            <label for="sku" class="col-md-4 control-label">Sku<span>*</span></label>

                            <div class="col-md-6">
                                <input id="sku" type="text" class="form-control" name="sku" value="{{ old('sku') }}" required autofocus>

                                @if ($errors->has('sku'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sku') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name<span>*</span></label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                            <label for="price" class="col-md-4 control-label">Price<span>*</span></label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control" name="price" value="{{ old('price') }}" required>

                                @if ($errors->has('price'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                            <label for="description" class="col-md-4 control-label">Description<span>*</span></label>

                            <div class="col-md-6">
                                
                                <textarea type="text" class="form-control" id="description" name="description"></textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <h4>Attributes</h4>
                        @foreach($attributes as $key=>$attribute)
                        <div class="form-group{{ $errors->has($attribute->title) ? ' has-error' : '' }}">
                        <label for="{{ $attribute->title }}" class="col-md-4 control-label">{{ $attribute->title }}</label>

                            <div class="col-md-6">
                            @if($attribute->type == "TEXT")
                            <input id="{{ $attribute->title }}" type="text" class="form-control" name="attribute[{{ $attribute->id }}]" value="{{ old($attribute->title) }}">
                            @else
                            <select class="form-control" name="attribute[{{ $attribute->id }}]">
                                @foreach(explode(',', $attribute->options) as $option) 
                                    <option>{{$option}}</option>
                                @endforeach
                            </select>
                            @endif
                                @if ($errors->has($attribute->name))
                                    <span class="help-block">
                                        <strong>{{ $errors->first($attribute->name) }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        @endforeach

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection