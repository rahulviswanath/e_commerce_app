@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Attribute List <a href="{{ route('attribute.create') }}" type="button" class="btn btn-primary">Add New</a></div>

                <div class="panel-body">
                    <table class="table">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Code</th>
                            <th scope="col">Type</th>
                            <th scope="col">Options</th>
                         </tr>
                        </thead>
                        <tbody>
                        @if(!$attributes->isEmpty())
                        @foreach($attributes as $key=>$attribute)
                            <tr>
                                <th>{{$key+1 }}</th>
                                <td>{{$attribute->title}}</td>
                                <td>{{$attribute->code}}</td>
                                <td>{{$attribute->type}}</td>
                                <td>{{$attribute->options}}</td>
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