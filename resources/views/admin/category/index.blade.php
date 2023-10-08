@extends('admin.master')

@section('title', 'Trang quản trị')
@section('title-page', 'Trang quản lý Danh Mục')

@section('main-content')
    <section class="content">
        <section class="content ">

            <!-- Default box -->
            <div class="col-lg-12 ">
                <div class="box">
                    <div class="box-header">
                        <div class="d-flex ">
                        <a href="{{ route('category.create') }}" class="btn btn-success mr-5">+Thêm mới Danh mục</a>
                       
                       
                            <a href="{{ route('category.trash') }}" class="btn btn-primary ml-5">Thung Rac <i class="fa fa-trash-o"></i></a>
                        
                            
                        </div>
                        
                        <div class="box-tools">
                            
                            <div class="input-group input-group-sm" style="width: 150px;">
                               
                                <input type="text" name="table_search" class="form-control pull-right"
                                    placeholder="Search">
                                
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
                                    <th>Tên Danh mục</th>
                                    <th>Ngày tạo</th>
                                    <th>Danh muc cha</th>
                                    <th>Trạng thái</th>
                                    <th colspan="2">Tùy chọn</th>
                                </tr>

                                @foreach ($cate as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <td>{{$item->parent->name??'Null'}}</td>
                                        <td><span
                                                class="label {{ $item->status ? 'label-success' : 'label-danger' }}">{{ $item->status ? 'Hiện' : 'Ẩn hiện' }}</span>
                                        </td>
                                        <td><a href="{{ route('category.edit', $item) }}" class="btn btn-success">Sửa</a></td>
                                        <td>
                                          <form action="{{ route('category.destroy', $item) }}" method="POST">
                                          @csrf
                                          @method('DELETE')
                                          <button type="submit" class="btn btn-danger">Xóa </button>
                                          </form></td>
                                    </tr>
                                @endforeach



                            </tbody>
                        </table>
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
