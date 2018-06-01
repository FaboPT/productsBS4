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
    <div class="row">
        <div class="col-md-12">

            <h2 style="text-align: center">
               <a href="{{route('product_index')}}"> Product</a>
                <small>{{$product->name ? :''}}</small>
            </h2>
        </div>
    </div>

    <div class="card card-success">
        <div class="card-header"></div>
        <!-- /.box-header -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Created</th>
                        <th>Updated</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>{{$product->name ? :''}}</td>
                        <td>{{$product->cost ? :''}}</td>
                        <td>{{$product->created_at ? :''}}</td>
                        <td>{{$product->updated_at ? :''}}</td>
                        <td>
                            <a href="{{route('product_edit',$product->id)}}" class="btn btn-primary btn-sm">
                                <i class="far fa-edit"></i>
                            </a>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteProductModal">
                                <i class="far fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <!-- Delete Product Modal -->
    <div class="modal" id="deleteProductModal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> {{$product->name}}</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <h5>You are about to remove this product!</h5>
                    <h5>Are you sure ?</h5>

                    <div class="modal-footer">
                        {!! Form::open(['route' => ['product_delete',$product->id],'method'=>'DELETE', 'class'=>'form-horizontal']) !!}

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">remove</button>
                        {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>

@endsection
