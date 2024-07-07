      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">{{ trans('dashboard.users_create') }}</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('users.store') }}" method="post">
              @csrf
              <div class="modal-body">

                <div class="mb-3">
                  <label for="name" class="form-label">{{ trans('dashboard.name') }}</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="{{ trans('dashboard.name') }}">
                </div>

                <div class="mb-3">
                  <label for="email" class="form-label">{{ trans('dashboard.email') }}</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                </div>

                <div class="mb-3">
                  <label for="password" class="form-label">{{ trans('dashboard.password') }}</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="********">
                </div>

                <div class="mb-3">
                  <label for="type" class="form-label">{{ trans('dashboard.type') }}</label>
                  <select name="type" id="" class="form-control">
                    <option value="user">{{ trans('dashboard.user') }}</option>
                    <option value="admin">{{ trans('dashboard.admin') }}</option>
                  </select>
                </div>

                             
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">{{ trans('dashboard.close') }}</button>
                <button type="submit" class="btn btn-success">{{ trans('dashboard.save') }}</button>
              </div>
            </form>

          </div>
        </div>
      </div>
    