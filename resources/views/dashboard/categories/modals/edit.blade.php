<!-- delete_modal_User -->
      <!-- Modal -->
      <div class="modal fade" id="categoryModaledit{{ $category->id }}" tabindex="-1" aria-labelledby="categoryModaledit" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="categoryModaledit">{{ trans('dashboard.category_edit') }}</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('categories.update','test') }}" method="post">
                @csrf
                @method('put')
                <div class="modal-body">

                    <input type="hidden" name="id" value="{{ $category->id }}">
                  
                    
                    <div class="mb-3">
                      <label for="name" class="mr-sm-2">{{ trans('dashboard.name') }}:</label>
                      <input type="text" class="form-control" value="{{ $category->name }}" name="name" required>
                  </div>

                
                    <div class="mb-3">
                      <label for="description" class="mr-sm-2">{{ trans('dashboard.type') }}:</label>
                        <textarea name="description" id="description"  class="form-control" cols="30" rows="10"> {{ $category->description }}</textarea>
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
    