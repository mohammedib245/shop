<!-- delete_modal_User -->
      <!-- Modal -->
      <div class="modal fade" id="productModaledit{{ $product->id }}" tabindex="-1" aria-labelledby="productModaledit" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="productModaledit">{{ trans('dashboard.product_edit') }}</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('products.update','test') }}" method="post">
                @csrf
                @method('put')
                <div class="modal-body">

                    <input type="hidden" name="id" value="{{ $product->id }}">
                  
                    
                    <div class="mb-3">
                      <label for="name" class="mr-sm-2">{{ trans('dashboard.name') }}:</label>
                      <input type="text" class="form-control" value="{{ $product->name }}" name="name" required>
                  </div>

                  <div class="form-group">
                    <label for="description" class="mb-1">{{ trans('dashboard.description') }} :</label>
                    <textarea name="description"  class="form-control" id="description" cols="10" rows="5">{{ $product->description }}</textarea>
                </div>                           
                    
                <div class="form-group">
                    <label for="validationCustom01" class="mb-1">القسم</label>
                    <select name="category_id" id="" class="form-control" required>
                        <option value="">اختر القسم</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if($category->id == $product->category_id)  selected @lse  @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="price" class="mb-1">{{ trans('dashboard.price') }} :</label>
                    <input type="price" name="price"  class="form-control" id="price"  value="{{ $product->price }}" required />
                </div>

                
                <div class="form-group">
                    <label for="stock" class="mb-1">{{ trans('dashboard.stock') }} :</label>
                    <input type="stock" name="stock"  class="form-control" id="stock" value="{{ $product->stock }}"  required />
                </div>
               
                <div class="form-group mb-0">
                    <label for="validationCustom02" class="mb-1">{{ trans('dashboard.image') }} :</label>
                    <input class="form-control dropify" id="validationCustom02" type="file"
                        name="image">
                </div>

              
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">{{ trans('dashboard.close') }}</button>
                    <button type="submit" class="btn btn-success">{{ trans('dashboard.update') }}</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    