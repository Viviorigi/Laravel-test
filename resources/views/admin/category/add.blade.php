@extends('admin.master')

@section('title', 'Trang quản trị')
@section('title-page', 'Trang quản lý Danh mục')

@section('main-content')
    <section class="content">
        <section class="content">

            <!-- Default box -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Thêm mới Danh mục</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('category.store') }}">
                        @csrf
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Danh mục</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Danh mục"
                                    name="name" value="{{old('name')}}">
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                          
                              <div class="form-group">
                                  <label for="">Chon danh muc cha</label>
                                  <select class="form-control" name="parent_id" id="">
                                    <option value="">Chon danh muc cha</option>
                                     {{ CategoryParent($cate)}}
                                  </select>
                              </div>
                        
                            <div class="form-group">
                                <label for="exampleInputEmail1">Chọn trạng thái</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="status" id="input" value="1"
                                            checked="checked">
                                        Hiện
                                    </label>
                                    <label>
                                        <input type="radio" name="status" id="input" value="0">
                                        Ẩn
                                    </label>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </div>
                    </form>
                </div>

                <!-- /.box -->

            </div>
            <!-- /.box -->

        </section>


    </section>
@endsection
