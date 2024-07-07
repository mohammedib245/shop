<!-- delete_modal_User -->
      <!-- Modal -->
      <div class="modal fade" id="userModaldelete{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">{{ trans('dashboard.user_delete') }}</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('users.destroy','test') }}" method="post">
                @csrf
                @method('DELETE')
                <div class="modal-body">

                    <input type="hidden" name="id" value="{{ $user->id }}">
                    <div class="mb-3">
                        <p class="lead text-danger"> {{ trans('dashboard.confirm_delete') }} {{ $user->name  }}</p>
                    {{-- <label for="name" class="form-label">Name</label> --}}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">{{ trans('dashboard.close') }}</button>
                    <button type="submit" class="btn btn-success">{{ trans('dashboard.delete') }}</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    