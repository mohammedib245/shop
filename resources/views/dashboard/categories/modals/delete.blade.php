 {{-- delete --}}
 <div class="modal fade" id="categoryModaldelete{{ $category->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ Route('categories.destroy','test') }}" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">{{ trans('dashboard.category_delete') }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                <div class="modal-body">
                    
                    <div class="form-group">

                        <input type="hidden" name="id" value="{{ $category->id }}">
                        <div class="mb-3">
                            <p class="lead text-danger"> {{ trans('dashboard.confirm_delete') }} {{ $category->name  }}</p>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">{{ trans('dashboard.close') }}</button>
                    <button type="submit" class="btn btn-danger">{{ trans('dashboard.delete') }} </button>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
{{-- delete --}}