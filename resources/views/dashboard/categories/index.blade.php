@extends('dashboard.layout.layout')

@section('body')
    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3>أقسام المنتجات
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
                            <li class="breadcrumb-item">Digital</li>
                            <li class="breadcrumb-item active">Sub Category</li>
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
                                data-original-title="test" data-bs-target="#categoryModalcreate">إضافة قسم جديد</button>    
                        </div>

                        <div class="card-body">

                        @include('dashboard.layout.messages')
                        @include('dashboard.layout.errors')

                        <div class="table-responsive table-desi">
                            <table class="table all-package table-category " id="editableTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>الصورة</th>
                                        <th>الإسم</th>
                                        <th>الوصف</th>
                                        <th> المنتجات</th>
                                        <th>التاريخ</th>
                                        <th>الإجراء</th>

                                    </tr>
                                </thead>
                                @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>
                                        @if($category->image)
                                        <img src="{{ url($category->image) }}"
                                        style="height: 100px; width: 150px;">
                                        @else 
                                            No Image
                                        @endif 
                                    </td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->description }}</td>
                                    <td> 
                                        <a href="{{ route('categories.show',["category"=> $category->id]) }}"
                                            class="btn btn-success btn-sm mt-md-0 mt-2"
                                            >{{ trans('dashboard.show') }}  <i class="fa fa-eye"></i> 
                                        </a>
                                        </td>
                                        <td>{{ $category->created_at }}</td>
                                        <td>
                                        <button type="button" class="btn btn-success btn-sm mt-md-0 mt-2" data-bs-toggle="modal"
                                                data-original-title="test" data-bs-target="#categoryModaledit{{ $category->id }}"> <i class="fa fa-edit"></i>
                                        </button> 
                                        | 
                                        <button type="button" class="btn btn-primary btn-sm mt-md-0 mt-2" data-bs-toggle="modal"
                                                data-original-title="test" data-bs-target="#categoryModaldelete{{ $category->id }}"> <i class="fa fa-cut"></i> 
                                        </button>  
                                    </td>
                                </tr>

                                @include('dashboard.categories.modals.edit')
                                @include('dashboard.categories.modals.delete')
                                
                            @endforeach
                                <tbody>

                                </tbody>
                            </table>
                        </div>


                        @include('dashboard.categories.modals.create')




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
    {{-- <script type="text/javascript">
        $(function() {
            var table = $('#editableTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ Route('categories.getall') }}",
                columns: [

                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'image',
                        name: 'image'
                    },
                    {
                        data: 'parent',
                        name: 'parent'
                    },
                    {
                        data: 'action',
                        name: 'action',
                    }
                ]
            });

        });

        $('#editableTable tbody').on('click', '#deleteBtn', function(argument) {
            var id = $(this).attr("data-id");
            console.log(id);
            $('#deletemodal #id').val(id);
        })
    </script> --}}
@endpush
