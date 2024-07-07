<!-- delete_modal_User -->
      <!-- Modal -->
      <div class="modal fade" id="userModaledit{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">{{ trans('dashboard.user_edit') }}</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('users.update',['user' => $user->id ]) }}" method="post">
                @csrf
                @method('put')
                <div class="modal-body">

                    <input type="hidden" name="id" value="{{ $user->id }}">
                  
                    
                    <div class="mb-3">
                      <label for="name" class="mr-sm-2">{{ trans('dashboard.name') }}:</label>
                      <input type="text" class="form-control" value="{{ $user->name }}" name="name" required>
                  </div>

                     <div class="mb-3">
                      <label for="email" class="mr-sm-2">{{ trans('dashboard.email') }}:</label>
                      <input type="email" class="form-control" value="{{ $user->email }}" name="email" required>
                  </div>

                     <div class="mb-3">
                      <label for="password" class="mr-sm-2">{{ trans('dashboard.password') }}:</label>
                      <input type="password" class="form-control" value="{{ $user->password }}" name="password" required>
                  </div>

                     <div class="mb-3">
                      <label for="type" class="mr-sm-2">{{ trans('dashboard.type') }}:</label>
                      <select name="type"  class="form-control" >
                          @if($user->type == 'user')
                          <option value="user" selected>{{ trans('dashboard.user') }}</option>
                          <option value="admin" >{{ trans('dashboard.admin') }}</option>
                          @else
                          <option value="user" >{{ trans('dashboard.user') }}</option>
                          <option value="admin" selected>{{ trans('dashboard.admin') }}</option>
                          @endif
                      </select>
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
    