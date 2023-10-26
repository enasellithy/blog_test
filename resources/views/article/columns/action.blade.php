<a class="btn btn-secondary" href="{{ aurl('articles/'.$row->id) }}">
    <i class="ti ti-eye me-1"></i>
    Show
</a>

<button
    class="btn btn-primary"
    type="button"
    data-bs-toggle="offcanvas"
    data-bs-target="#offcanvasEnd"
    aria-controls="offcanvasEnd">
    <i class="ti ti-pencil me-1"></i>
    Edit
</button>
<div
    class="offcanvas offcanvas-end"
    tabindex="-1"
    id="offcanvasEnd"
    aria-labelledby="offcanvasEndLabel">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title" id="exampleModalLabel">Edit</h5>
        <button
            type="button"
            class="btn-close text-reset"
            data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body flex-grow-1">
        <form class="add-new-record pt-0 row g-2"
              action="{{ aurl('articles/'.$i->id) }}" method="post">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="_method" value="put">
            <div class="col-sm-12">
                <label class="form-label" for="basicPost">
                    Title
                </label>
                <div class="input-group input-group-merge">
                    <span id="basicPost2" class="input-group-text"><i class="ti ti-pencil"></i></span>
                    <input
                        type="text"
                        id="basicPost"
                        name="title" value="{{ $row->title }}"
                        class="form-control @error('title') is-invalid @enderror" placeholder="title" />
                </div>
            </div>
            <div class="col-sm-12">
                <label class="form-label" for="basicPost">
                    Description
                </label>
                <div class="input-group input-group-merge" >
                    <span id="basicPost2" class="input-group-text"><i class="ti ti-pencil"></i></span >
                    <textarea name="description" id="description"
                              class="form-control" placeholder="description">
                        {{ $row->description }}
                    </textarea>
                </div>
            </div>
            @if(!getRole('User'))
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            @else
                <div class="col-sm-12">
                    <label class="form-label" for="basicPost">
                        User
                    </label>
                    <div class="input-group input-group-merge">
                        <span id="basicPost2" class="input-group-text"><i class="ti ti-tag"></i></span>
                        <select class="form-control" name="user_id">
                            <option selected disabled>...</option>
                            @foreach(\App\Models\User::get() as $i)
                                <option value="{{ $i->id }}" {{ $row->user_id == $i->id ? 'selected' : '' }} >
                                    {{ $i->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            @endif
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1">Save</button>
                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
            </div>
        </form>
    </div>
</div>

<button
    class="btn btn-primary"
    type="button"
    data-bs-toggle="offcanvas"
    data-bs-target="#offcanvasEnd"
    aria-controls="offcanvasEnd">
    <i class="ti ti-trash me-1"></i>
    Remove
</button>
<div
    class="offcanvas offcanvas-end"
    tabindex="-1"
    id="offcanvasEnd"
    aria-labelledby="offcanvasEndLabel">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title" id="exampleModalLabel">Remove</h5>
        <button
            type="button"
            class="btn-close text-reset"
            data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
    </div>
    <div class="offcanvas-body flex-grow-1">
        <form class="add-new-record pt-0 row g-2"
              action="{{ aurl('articles.destroy'.$row->id) }}" method="delete">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-primary data-submit me-sm-3 me-1">Save</button>
                <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="offcanvas">Cancel</button>
            </div>
        </form>
    </div>
</div>

@push('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ), {
                language: {
                    // The UI will be English.
                    ui: 'en',

                    // But the content will be edited in Arabic.
                    content: 'ar'
                },
                toolbar: [ 'heading', '|', 'bold', 'italic', 'bulletedList', 'numberedList', 'blockQuote' ],
                heading: {
                    options: [
                        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    ]
                }
            } )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush
