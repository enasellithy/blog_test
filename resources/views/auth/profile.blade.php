@extends('admin.layouts.app')

@section('content')

    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-bottom">
                            <h4 class="card-title">
                                بيانات شخصيه
                            </h4>
                        </div>
                        <div class="card-body py-2 my-25">

                            <!-- form -->
                            <form class="validate-form mt-2 pt-50" action="{{ aurl('updateProfile') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-sm-4 mb-1">
                                        <label class="form-label" for="accountFirstName">
                                            الاسم
                                        </label>
                                        <div class="input-group input-group-merge">
                                            <span id="basicFullname2" class="input-group-text"><i class="ti ti-user"></i></span>
                                            <input type="text" class="form-control" id="accountFirstName" name="name"
                                                   value="{{ auth()->user()->name }}" data-msg="Please enter name" />
                                            @if ($errors->has('name'))
                                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4 mb-1">
                                        <label class="form-label" for="accountFirstName">
                                            البريد الالكترونى
                                        </label>
                                        <div class="input-group input-group-merge">
                                            <span id="basicFullname2" class="input-group-text"><i class="ti ti-mail"></i></span>
                                            <input type="email" class="form-control" id="accountFirstName" name="email"
                                                   value="{{ auth()->user()->email }}" data-msg="Please enter email" />
                                            @if ($errors->has('email'))
                                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-4 mb-1">
                                        <label class="form-label" for="accountFirstName">
                                            كلمه المرور
                                        </label>
                                        <div class="input-group input-group-merge">
                                            <span id="basicFullname2" class="input-group-text"><i class="ti ti-lock"></i></span>
                                            <input type="password" class="form-control" id="accountFirstName" name="password"
                                                   data-msg="Please enter password" />
                                            @if ($errors->has('password'))
                                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div id="buttons" style="float:left;">
                                            <button type="submit" class="btn btn-primary mt-1 me-1">حفظ</button>
                                            <a href="{{ aurl('') }}" class="btn btn-outline-secondary mt-1">عوده</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>

@endsection


