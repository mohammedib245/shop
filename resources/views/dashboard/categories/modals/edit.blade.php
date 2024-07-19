<!-- delete_modal_User -->
      <!-- Modal -->
      <div class="modal fade" id="categoryModaledit{{ $category->id }}" tabindex="-1" aria-labelledby="categoryModaledit" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="categoryModaledit">{{ trans('dashboard.category_edit') }}</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('categories.update',['category'=> $category->id]) }}" method="post"  enctype="multipart/form-data" >
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

                  <div class="mb-3">
                    <label for="image" class="mb-1">الصورة :</label>
                    @if($category->image)
                    <img src="{{ url($category->image) }}"
                    style="height: 100px; width: 150px;">
                    @else 
                    No Image
                    @endif 
                    <input class="form-control" id="image" type="file"  name="image"  required 
                          {{-- data-show-loader="false"  --}}
                          {{-- data-allowed-file-extensions="jpg png jpeg gif" --}}
                            >
                    {{-- data-default-file="{{ url($category->image) }}" --}}
                    {{-- dropify --}}
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
    