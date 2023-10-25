{{--<div class="col-md-12" style="width: 992px; margin: auto">--}}
{{--    @if(session()->has('success'))--}}
{{--        <div class="alert alert-dismissible bg-success d-flex flex-column flex-sm-row p-5 mb-10" role="alert">--}}
{{--                                            <span class="text-sm">--}}
{{--                                                {{session()->get('success')}}--}}
{{--                                            </span>--}}
{{--            <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">×</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--    @if($errors->any())--}}
{{--        <div class="alert alert-dismissible bg-danger d-flex flex-column flex-sm-row p-5 mb-10" role="alert">--}}
{{--                                        <span class="text-sm">--}}
{{--                                            {{ $errors->first() }}--}}
{{--                                        </span>--}}
{{--            <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">--}}
{{--                <span aria-hidden="true">×</span>--}}
{{--            </button>--}}
{{--        </div>--}}
{{--    @endif--}}
{{--</div>--}}

<div class="col-12" style="width: 992px; margin: auto">
    @if(session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <div class="alert-body">
                {{session()->get('success')}}
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if($errors->any())
        @if($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <div class="alert-body">
                    {{ $errors->first() }}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
    @endif

</div>

{{--@include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])--}}
