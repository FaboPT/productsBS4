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
    
        <div class="col-md-10">
            <h2 style="text-align: center; ">
                Products
                <small>List</small>
            </h2>
        </div>
    
        <div class="col-md-2">
            <h2>
                <a href="{{route('product_create')}}" class="btn btn-success float-right">
                    <i class="fas fa-plus"></i> create new product
                </a> 
            </h2>
        </div>

    </div>

    <div class="card card-success">
       {{-- <div class="card-header">
        </div>--}}
        <!-- /.box-header -->
        <div class="card-body">
            <table class="table table-bordered table-striped datatables">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody>

                @foreach($products as $product)
                    <tr>
                
                        <td><a href="{{route('product_show',$product->id)}}">{{$product->name}}</a></td>
                        <td>{{$product->cost ? : ''}}</td>
                    
                    </tr>
                @endforeach

                </tbody>
                <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
   <script>
        $('.datatables').dataTable({
            stateSave: true,
            responsive:true,
        });
   </script>

@endsection


