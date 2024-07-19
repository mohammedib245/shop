@extends('dashboard.layout.layout')

@section('body')
    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3> المنتجات
                            </h3>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ol class="breadcrumb pull-right">
                            <li class="breadcrumb-item">
                                <a href="index.html">
                                    <i data-feather="home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item">{{ trans('dashboard.dashboard') }}</li>
                            <li class="breadcrumb-item active">{{ trans('dashboard.products') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <form class="form-inline search-form search-box">
                            </form>

                            <button type="button" class="btn btn-primary mt-md-0 mt-2" data-bs-toggle="modal"
                                data-original-title="test" data-bs-target="#productModalcreate">إضافة منتج جديد</button>    
                        </div>

                        <div class="card-body">

                        @include('dashboard.layout.messages')
                        @include('dashboard.layout.errors')

                        <div class="table-responsive table-desi">
                            <table class="table all-package table-product " id="editableTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>الصورة</th>
                                        <th>الإسم</th>
                                        <th>القسم</th>
                                        {{-- <th>القسم الرئيسي</th> --}}
                                        <th>الوصف</th>
                                        <th>{{ trans('dashboard.price_main') }}</th>
                                        <th>{{ trans('dashboard.discount_main') }}</th>
                                        <th>التاريخ</th>
                                        <th>الإجراء</th>

                                    </tr>
                                </thead>
                                @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if($product->image)
                                        <img src="{{ url($product->image) }}"
                                        style="height: 100px; width: 150px;">
                                        @else 
                                            No Image
                                        @endif 
                                    </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>{{ Str::limit($product->description, 50) }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->discount }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm mt-md-0 mt-2" data-bs-toggle="modal"
                                                data-original-title="test" data-bs-target="#productModaledit{{ $product->id }}"> <i class="fa fa-edit"></i>
                                        </button> 
                                        | 
                                        <button type="button" class="btn btn-primary btn-sm mt-md-0 mt-2" data-bs-toggle="modal"
                                                data-original-title="test" data-bs-target="#productModaldelete{{ $product->id }}"> <i class="fa fa-cut"></i> 
                                        </button>  
                                    </td>
                                </tr>

                                @include('dashboard.products.modals.edit')
                                @include('dashboard.products.modals.delete')
                                
                            @endforeach
                                <tbody>

                                </tbody>
                            </table>
                        </div>


                        @include('dashboard.products.modals.create')




                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->



       


    </div>

    </div>

@endsection


@push('javascripts')
@endpush
