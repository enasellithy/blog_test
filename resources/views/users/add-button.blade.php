<button
    class="btn btn-primary"
    type="button"
    data-bs-toggle="offcanvas"
    data-bs-target="#offcanvasEnd"
    aria-controls="offcanvasEnd">
    Create
</button>
<div
    class="offcanvas offcanvas-end"
    tabindex="-1"
    id="offcanvasEnd"
    aria-labelledby="offcanvasEndLabel">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title" id="exampleModalLabel">New</h5>
        <button
            type="button"
            class="btn-close text-reset"
            data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body flex-grow-1">
        <form class="add-new-record pt-0 row g-2"
              action="{{ aurl('users') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-sm-12">
                <label class="form-label" for="basicPost">
                    Name
                </label>
                <div class="input-group input-group-merge">
                    <span id="basicPost2" class="input-group-text"><i class="ti ti-pencil"></i></span>
                    <input
                        type="text"
                        id="basicPost"
                        name="name" value="{{ old('name') }}"
                        class="form-control @error('name') is-invalid @enderror" placeholder="name" />
                </div>
            </div>
            <div class="col-sm-12">
                <label class="form-label" for="basicPost">
                    Email
                </label>
                <div class="input-group input-group-merge">
                    <span id="basicPost2" class="input-group-text"><i class="ti ti-mail"></i></span>
                    <input
                        type="email"
                        id="basicPost"
                        name="email" value="{{ old('email') }}"
                        class="form-control @error('email') is-invalid @enderror" placeholder="Email" />
                </div>
            </div>
            <div class="col-sm-12">
                <label class="form-label" for="basicPost">
                    Password
                </label>
                <div class="input-group input-group-merge">
                    <span id="basicPost2" class="input-group-text"><i class="ti ti-key"></i></span>
                    <input
                        type="password"
                        id="basicPost"
                        name="password"
                        class="form-control @error('password') is-invalid @enderror" placeholder="password" />
                </div>
            </div>
            <div class="col-sm-12">
                <label class="form-label" for="basicPost">
                    Role
                </label>
                <div class="input-group input-group-merge">
                    <span id="basicPost2" class="input-group-text"><i class="ti ti-tag"></i></span>
                    <select class="form-control" name="role_id">
                        <option selected disabled>...</option>
                        @foreach(\Spatie\Permission\Models\Role::get() as $i)
                            <option value="{{ $i->id }}" {{ old('role_id') == $i->id ? 'selected' : '' }} >
                                {{ $i->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1">Save</button>
                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
            </div>
        </form>
    </div>
</div>
