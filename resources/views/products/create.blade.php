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


    {{ Form::open([
        'route'=>'product_store',
        'class' => 'form-horizontal',
        'accept-charset'=>'UTF-8',
        'method' => 'post'])
    }}

    <div class="row">
        <div class="col-md-12">
            <h2 style="text-align: center">
                <a href="{{route('product_index')}}"> Create a new product </a>
            </h2>
        </div>
    </div>

    <div class="card card-success">
        <div class="card-body">

            <div class="form-group row">
                {{Form::label('name','Name:',array('class'=>'col-sm-1 col-form-label'))}}
                <div class="col-sm-11">
                    {{Form::text('name',null, ['class'=>'form-control','required','placeholder'=>'Name'])}}
                </div>
            </div>

            <div class="form-group row">
                {{Form::label('cost','Price:',array('id'=>'','class'=>'col-sm-1 col-form-label'))}}
                <div class="col-sm-11">
                    {{Form::text('cost',null, ['class'=>'form-control','required','placeholder'=>'Price'])}}
                </div>
            </div>


            {{Form::submit('create product', ['class'=>'btn btn-success float-right'])}}

        </div>

    </div>

    {{ Form::close()}}
@stop
