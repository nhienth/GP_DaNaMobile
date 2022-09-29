@extends('admin.layouts.master')
@section('main')

<h2>Thêm bài viết</h2>
<div class="form-group">
    <div class="row">
        <div class="col">
            <label for="exampleInputPassword1">Tiêu Đề</label>
            <input type="text" class="form-control" name="" placeholder="Nhập tiêu đề">
        </div>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail3">Tóm Tắt</label>
        <textarea class="form-control" name="" id="exampleTextarea1" rows="2"></textarea>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail3">Mô Tả</label>
        <textarea class="form-control" name="" id="exampleTextarea1" cols="10" rows="6"></textarea>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-12 mb-1 mb-sm-0">
            <label for="formFile" class="form-label">Thêm Ảnh</label>
            <input class="form-control" type="file" id="formFile" />
        </div>
    </div>
    
    <div class="row">
        <div class="col">
            <label for="exampleInputPassword1">Tác Giả</label>
            <input class="form-control" name=""
                placeholder="Nhập tác giả">
        </div>
    </div>
    <div class="row">
        <div class="col">
            <label for="exampleInputPassword1">Trạng Thái</label>
            <input  class="form-control" name=""
                placeholder="Nhập trạng thái">
        </div>
    </div>
   


</div>

<div class="row mt-1">
    <div class="col-12 px-0">
        <button type="button" class="btn btn-primary btn-sm btn-add-new" data-repeater-create>
            <i data-feather="plus" class="me-25"></i>
            <span class="align-middle">Add </span>
        </button>
    </div>
    </div>
@endsection