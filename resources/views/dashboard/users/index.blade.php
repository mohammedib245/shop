@extends('dashboard.layout.layout')

@section('body')
    <div class="page-body">
        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="page-header-left">
                            <h3> {{  trans('dashboard.users') }} 
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
                            <li class="breadcrumb-item"> {{  trans('dashboard.dashboard') }}</li>
                            <li class="breadcrumb-item active"> {{  trans('dashboard.users') }}</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->

        <!-- Container-fluid starts-->
        <div class="container-fluid">
            <div class="row product-adding">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-header">
                            <h5> {{  trans('dashboard.users') }}</h5>

                            <form class="form-inline search-form search-box">
                            </form>
        
                            <button type="button" class="btn btn-primary mt-md-0 mt-2" data-bs-toggle="modal"
                                data-original-title="test" data-bs-target="#exampleModal">إضافة مستخدم جديد</button>    
                
                                
                        </div>

                        <div class="card-body">
                            @if(session()->has('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                        @if(count($users) > 0)  
                        <div class="table-responsive table-desi">
                            <table class="table all-package table-user " id="editableTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>الإسم</th>
                                        <th>البريد الإلكتروني</th>
                                        <th>نوع المتسخدم</th>
                                        <th>التاريخ</th>
                                        <th>إجراءات</th>
                                    </tr>
                                </thead>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>  <span class="badge badge-pill @if($user->type == 'user') badge-success @else badge-primary  @endif "> {{ $user->type }}</span></td>
                                            <td>{{ $user->created_at }}</td>
                                            <td>
                                                <button type="button" class="btn btn-success btn-sm mt-md-0 mt-2" data-bs-toggle="modal"
                                                data-original-title="test" data-bs-target="#userModaledit{{ $user->id }}"> <i class="fa fa-edit"></i> </button> 
                                                | 
                                                <button type="button" class="btn btn-primary btn-sm mt-md-0 mt-2" data-bs-toggle="modal"
                                                data-original-title="test" data-bs-target="#userModaldelete{{ $user->id }}"> <i class="fa fa-cut"></i> </button>  
                                            </td>
                                        </tr>

                                        @include('dashboard.users.modals.edit')
                                        @include('dashboard.users.modals.delete')
                                        
                                    @endforeach
        
                                <tbody>
        
                                </tbody>
                            </table>


                        </div>
                        @else
                            <div class="alert alert-info" role="alert">
                                <strong>{{ trans('dashboard.no_data_avalibale') }}</strong>
                            </div>
                        @endif
                               
                        </div>
                    </div>
                </div>


        
                @include('dashboard.users.modals.create')
              

            </div>
        </div>
        <!-- Container-fluid Ends-->
    </div>
@endsection
