@extends('admin.layouts.master')
@section('main')

<h3 class="text-primary invoice-logo">Vuexy</h3>
</div>
<p class="card-text mb-25">Office 149, 450 South Brand Brooklyn</p>
<p class="card-text mb-25">San Diego County, CA 91905, USA</p>
<p class="card-text mb-0">+1 (123) 456 7891, +44 (876) 543 2198</p>
</div>
<div class="invoice-number-date mt-md-0 mt-2">
<div class="d-flex align-items-center justify-content-md-end mb-1">
    <h4 class="invoice-title">Invoice</h4>
    <div class="input-group input-group-merge invoice-edit-input-group">
        <div class="input-group-text">
            <i data-feather="hash"></i>
        </div>
        <input type="text" class="form-control invoice-edit-input" placeholder="53634" />
    </div>
</div>
<div class="d-flex align-items-center mb-1">
    <span class="title">Date:</span>
    <input type="text" class="form-control invoice-edit-input date-picker" />
</div>
<div class="d-flex align-items-center">
    <span class="title">Due Date:</span>
    <input type="text" class="form-control invoice-edit-input due-date-picker" />
</div>
</div>
</div>
</div>
<!-- Header ends -->

<hr class="invoice-spacing" />

<!-- Address and Contact starts -->

<div class="mb-1">
    <label class="form-label" for="largeInput"></label>
    <input id="largeInput" class="form-control form-control-lg" type="text" placeholder="Nhập id danh mục" />
</div>
<div class="mb-1">
    <label class="form-label" for="largeInput"></label>
    <input id="largeInput" class="form-control form-control-lg" type="text" placeholder="Nhập tên danh mục" />
</div>

<div class="row mt-1">
<div class="col-12 px-0">
    <button type="button" class="btn btn-primary btn-sm btn-add-new" data-repeater-create>
        <i data-feather="plus" class="me-25"></i>
        <span class="align-middle">Add </span>
    </button>
</div>
</div>
</div>
@endsection