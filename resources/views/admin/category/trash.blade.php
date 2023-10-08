@extends('admin.master')




@section('main-content')
    <section class="content">
        <section class="content ">

            <!-- Default box -->
            <div class="col-lg-12 ">
                <div class="box">
                    <div class="box-header">
                        <div class="d-flex ">
                        <a href="{{ route('category.create') }}" class="btn btn-success mr-5">+Thêm mới Danh mục</a> 
                            
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
                                        <td>{{$item->parent_id}}</td>
                                        <td>
                                            <span  class="label {{ $item->status ? 'label-success' : 'label-danger' }}">{{ $item->status ? 'Hiện' : 'Ẩn hiện' }}</span>
                                        </td>
                                        <td><a href="{{ route('category.restore', $item) }}" class="btn btn-success">Khoi Phuc</a>
                                            <a href="{{ route('category.forceDelete', $item) }}" class="btn btn-danger" onclick="return confirm('Co chan chan muon xoa')">Xoa</a>
                                        </td>
                                       
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
