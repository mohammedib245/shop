  <!-- Modal -->
  <div class="modal fade" id="productModalcreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
               
                    <div class="modal-content">
                        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="modal-header">
                            <h5 class="modal-title f-w-600" id="exampleModalLabel"> {{ trans('dashboard.product_create') }} </h5>
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
                                    <textarea name="description"  class="form-control" id="description" cols="10" rows="5"></textarea>
                                </div>                           
                                    
                                <div class="form-group">
                                    <label for="validationCustom01" class="mb-1">القسم</label>
                                    <select name="category_id" id="" class="form-control" required>
                                        <option value="">اختر القسم</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="price" class="mb-1 col-form-label">{{ trans('dashboard.price_mian') }} :</label>
                                    <input type="price" name="price"  class="form-control" id="price"  required />
                                </div>

                              

                                <div class="form-group">
                                    <label for="discount" class="col-form-label">
                                        {{ trans('dashboard.discount_mian') }}  </label>
                                    <input class="form-control" id="discount" type="text"
                                        name="discount">
                                </div>

                                
                                <div class="form-group">
                                    <label for="stock" class="mb-1">{{ trans('dashboard.stock') }} :</label>
                                    <input type="stock" name="stock"  class="form-control" id="stock"  required />
                                </div>
                               
                                <div class="form-group mb-0">
                                    <label for="validationCustom02" class="mb-1">{{ trans('dashboard.image') }} :</label>
                                    <input class="form-control dropify" id="validationCustom02" type="file"
                                        name="image">
                                </div>


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