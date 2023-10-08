@extends('admin.master')

@section('title', 'Trang quản trị')
@section('title-page', 'Trang quản lý ')

@section('main-content')
    <section class="content">
        <section class="content">

            <!-- Default box -->
            <div class="col-md-8">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sửa Danh mục</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" method="POST" action="{{ route('category.update', $category) }}">
                        @method('PUT')
                        @csrf
                        <input type="hidden" name="id" value="{{$category->id}}" id="">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Danh mục</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Danh mục"
                                    name="name" value="{{ $category->name }}">
                                    @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            {{-- <div class="form-group">
                        <label for="exampleInputEmail1">Chọn Ảnh</label>
                        <div class="radio">
                          <label>
                            <input type="file" name="photo" id="input " value="" >
                            
                          </label>
                        </div>
                      </div> --}}
                          <div class="form-group">
                            <label for="">Chon danh muc cha</label>
                            <select class="form-control" name="parent_id" id="">
                              <option value="">Chon danh muc cha</option>
                                {{CategoryParent($cate,$category->parent_id)}}
                            </select>
                        </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Chọn trạng thái</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" name="status" id="input" value="1"
                                            {{ $category->status ? 'checked' : '' }}>
                                        Hiện
                                    </label>
                                    <label>
                                        <input type="radio" name="status" id="input" value="0"
                                            {{ !$category->status ? 'checked' : '' }}>
                                        Ẩn
                                    </label>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </form>
                </div>

                <!-- /.box -->

            </div>
            <!-- /.box -->

        </section>


    </section>
@endsection
