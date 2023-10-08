@extends('admin.master')

@section('title', 'Trang quản trị')
@section('title-page', 'Trang quản lý Sản phẩm')

@section('main-content')
    <section class="content">
        <section class="content ">

            <!-- Default box -->
            <div class="col-lg-12 ">
                <div class="box">
                  <div class="box-header">
                 <a href="{{route('product.create')}}" class="btn btn-success">+Thêm mới Sản phẩm</a>
                 <a href="{{ route('product.trash') }}" class="btn btn-primary ml-5">Thung Rac <i class="fa fa-trash-o"></i></a>
                    <div class="box-tools">
                      <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">
      
                        <div class="input-group-btn">
                          <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                  @if ($message = Session::get('success'))
                  <div class="alert alert-success alert-block">

                      <button type="button" class="close" data-dismiss="alert">×</button>

                      <strong>{{ $message }}</strong>

                  </div>
              @endif
                  <!-- /.box-header -->
                  <div class="box-body table-responsive no-padding ">
                    <table class="table table-hover">
                      <tbody>
                        <tr>
                        <th>STT</th>
                        <th>Tên Sản phẩm</th>
                        <th>Giá sản phẩm</th>
                        <th>Ngày tạo</th>
                        <th>Danh mục</th>
                        <th>Image</th>
                        <th >Tùy chọn</th>
                      </tr>
                     
                        @foreach ($pro as $item)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->category->name}}</td>
                        <td ><img src="{{asset('storage/images')}}/{{$item->image}}" alt="" width="100px"></td>
                        <td><a href="{{route('product.edit',$item)}}" class="btn btn-success">Sửa</a>
                        </td> 
                        <td><a href="{{ route('product.restore', $item) }}" class="btn btn-success">Khoi Phuc</a>
                          <a href="{{ route('product.forceDelete', $item) }}" class="btn btn-danger" onclick="return confirm('Co chan chan muon xoa')">Xoa</a>
                      </td>        
                    </tr>    
                        @endforeach
                        
                      
                      
                    </tbody></table>
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </div>
            <!-- /.box -->
      
          </section>

    </section>
@endsection
<!-- Main content -->

<!-- /.content -->

<!-- /.content-wrapper -->
