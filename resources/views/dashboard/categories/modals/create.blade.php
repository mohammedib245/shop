  <!-- Modal -->
  <div class="modal fade" id="categoryModalcreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
               
                    <div class="modal-content">
                        <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="modal-header">
                            <h5 class="modal-title f-w-600" id="exampleModalLabel"> {{ trans('dashboard.category_create') }} </h5>
                            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">

                            <div class="form">

                                <div class="form-group">
                                    <label for="validationCustom01" class="mb-1">{{ trans('dashboard.name') }} :</label>
                                    <input class="form-control" id="validationCustom01" type="text" name="name">
                                </div>

                                <div class="form-group">
                                    <label for="description" class="mb-1">{{ trans('dashboard.description') }} :</label>
                                    <textarea name="description"  class="form-control" id="description" cols="30" rows="10"></textarea>
                                </div>

                               
                                    
                               
                                {{-- <div class="form-group">
                                    <label for="validationCustom01" class="mb-1">القسم الرئيسي </label>
                                    <select name="parent_id" id="" class="form-control">
                                        <option value="">قسم رئيسي</option>
                                        @foreach ($mainCategories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}

                               
                                {{-- <div class="form-group mb-0">
                                    <label for="validationCustom02" class="mb-1">الصورة :</label>
                                    <input class="form-control dropify" id="validationCustom02" type="file"
                                        name="image">
                                </div> --}}


                            </div>
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-primary" type="submit">{{ trans('dashboard.save') }}</button>
                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">{{ trans('dashboard.close') }}</button>
                        </div>
                    </form>

                    </div>
                   
            </div>
        </div>