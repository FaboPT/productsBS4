@extends('main')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {{ Form::model($product, [
        'route' => ['product_update', $product->id],
        'class' => 'form-horizontal',
        'accept-charset'=>'UTF-8',
        'method' => 'PUT'])
    }}

    <div class="row">
        <div class="col-md-12">
            <h2 style="text-align: center">
                <a href="{{route('product_index')}}"> Edit a product:{{$product->name}} </a>
            </h2>
        </div>
    </div>

    <div class="card card-success">
        <div class="card-body">

            <div class="form-group">
                {{Form::label('name','Name:',array('id'=>'','class'=>'col-lg-1 control-label'))}}
                <div class="col-lg-11">
                    {{Form::text('name',null, ['class'=>'form-control','required','placeholder'=>'Name'])}}
                </div>
            </div>

            <div class="form-group">
                {{Form::label('cost','Price:',array('id'=>'','class'=>'col-lg-1 control-label'))}}
                <div class="col-lg-11">
                    {{Form::text('cost',null, ['class'=>'form-control','required','placeholder'=>'Price'])}}
                </div>
            </div>


            {{Form::submit('save', ['class'=>'btn btn-success float-right'])}}

        </div>

    </div>

    {{ Form::close()}}
@stop
