@extends('admin.master')

@section('title', 'Trang quản trị')
@section('title-page', 'Trang quản lý Sản phẩm')

@section('main-content')
    <section class="content">
        <section class="content">

            <!-- Default box -->
           <div class="col-md-11">
                <!-- general form elements -->
                <div class="box box-primary">
                  <div class="box-header with-border">
                    <h3 class="box-title">Thêm mới Sản phẩm</h3>
                  </div>
                  <!-- /.box-header -->
                  <!-- form start -->
                  <form role="form" method="POST" enctype="multipart/form-data" action="{{route('product.store')}}">
                    @csrf
                    <div class="box-body">
                      <div class="row">
                        <div class="col-md-5">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Tên Sản phẩm</label>
                            <input type="text" class="form-control" id="productName" onkeyup="ChangeToSlug()" placeholder="Sản phẩm" name="name" value="{{old('name')}}">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                          </div>
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Đường dẫn</label>
                            <input type="text" class="form-control" id="slug"  name="slug" >
                          </div>
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Giá Sản phẩm</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Giá Sản phẩm" name="price" value="{{old('price')}}">
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                          </div>
                        </div>
                        <div class="col-md-5">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Giá KM</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Giá KM Sản phẩm" name="sale_price" value="{{old('sale_price')}}">
                            @error('sale_price')
                            <div class="alert alert-danger">{{ $message }}</div>
                           @enderror
                          </div>
                        </div>
                        <div class="col-md-7">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Chọn Danh mục</label>
                            <select name="category_id" id="input" class="form-control" >
                              <option value="">Chọn Danh mục</option>
                              {{ CategoryParent($cate)}}
                            </select>
                            @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                          @enderror
                          </div>
                        </div>
                        <div class="col-md-10">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Chọn Ảnh</label>
                            <div class="box pt-2">                        
                                <input type="file" name="photo" id="input " value="{{old('photo')}}" onchange="showImg(this,'img')">                                              
                            </div>
                            <div >
                              <img id="img" src="" alt="" width="300px">
                            </div>
                            @error('photo')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                          </div>
                        </div>
                        <div class="col-md-10">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Chọn Ảnh Mô tả</label>
                            <div class="box pt-2">                        
                                <input type="file" name="photos[]" id="input " multiple onchange="preview(this)">                                              
                            </div>
                            <div class="row" id="imgs">
                              
                            </div>
                            @error('photos')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Mô tả sản phẩm</label>
                        <textarea name="description" id="editor1" rows="10" cols="80">
                          This is my textarea to be replaced with CKEditor 4.
                      </textarea>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputEmail1">Featured</label>
                        <input type="checkbox" name="featured" value="1">
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

@section('custom-js')
<script src="{{asset('assets/ckeditor/ckeditor.js')}}"></script>
    <script>
      CKEDITOR.replace('editor1')


function ChangeToSlug()
{
    var productName, slug;
 
    //Lấy text từ thẻ input title 
    productName = document.getElementById("productName").value;
 
    //Đổi chữ hoa thành chữ thường
    slug = productName.toLowerCase();
 
    //Đổi ký tự có dấu thành không dấu
    slug = slug.replace(/á|à|ả|ạ|ã|ă|ắ|ằ|ẳ|ẵ|ặ|â|ấ|ầ|ẩ|ẫ|ậ/gi, 'a');
    slug = slug.replace(/é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ/gi, 'e');
    slug = slug.replace(/i|í|ì|ỉ|ĩ|ị/gi, 'i');
    slug = slug.replace(/ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ/gi, 'o');
    slug = slug.replace(/ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự/gi, 'u');
    slug = slug.replace(/ý|ỳ|ỷ|ỹ|ỵ/gi, 'y');
    slug = slug.replace(/đ/gi, 'd');
    //Xóa các ký tự đặt biệt
    slug = slug.replace(/\`|\~|\!|\@|\#|\||\$|\%|\^|\&|\*|\(|\)|\+|\=|\,|\.|\/|\?|\>|\<|\'|\"|\:|\;|_/gi, '');
    //Đổi khoảng trắng thành ký tự gạch ngang
    slug = slug.replace(/ /gi, "-");
    //Đổi nhiều ký tự gạch ngang liên tiếp thành 1 ký tự gạch ngang
    //Phòng trường hợp người nhập vào quá nhiều ký tự trắng
    slug = slug.replace(/\-\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-\-/gi, '-');
    slug = slug.replace(/\-\-\-/gi, '-');
    slug = slug.replace(/\-\-/gi, '-');
    //Xóa các ký tự gạch ngang ở đầu và cuối
    slug = '@' + slug + '@';
    slug = slug.replace(/\@\-|\-\@|\@/gi, '');
    //In slug ra textbox có id “slug”
    document.getElementById('slug').value = slug;
}

function showImg(input, target) {
        let file = input.files[0];
        let reader = new FileReader();

        reader.readAsDataURL(file);
        reader.onload = function() {
            let img = document.getElementById(target);
            // can also use "this.result"
            img.src = reader.result;
        }
    }

    function preview(elem, output = '') {
        const i = 0;
        Array.from(elem.files).map((file) => {
            const blobUrl = window.URL.createObjectURL(file)
            output +=
                `<div class="col-md-3" id="img-add">
                    
                    <div class="card text-left bg-white border-danger "> 
                        <img class="card-img-bottom" src=${blobUrl} alt="" width="100%" >
                    </div>
                </div>`
            })
            document.getElementById('imgs').innerHTML += output
        }


    </script>
@endsection