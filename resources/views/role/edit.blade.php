@extends('layouts.app')

@section('content')


    <div class="content-wrapper container-xxl p-0">
        <div class="content-header row">
        </div>
        <div class="content-body">


            <!-- Basic Vertical form layout section start -->
            <section id="basic-vertical-layouts">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">
                                   Roles
                                </h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ aurl('roles/'.$data->id) }}" method="post">
                                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                                    <input type="hidden" name="_method" value="put">
                                    <div class="row">


                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <div class="mb-1">
                                                <label class="form-label">Name</label>
                                                <input type="text" name="name" value="{{ $data->name }}" class="form-control" required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        @foreach($permissions as $i)

                                            <div class="col-md-3">
                                                <div class="form-check form-switch d-flex align-items-center mb-3 is-filled">
                                                    <input class="form-check-custom" type="checkbox" name="permission_id[]" value="{{ $i->id }}" {{ $data->hasPermissionTo($i) ? 'checked' : '' }} >
                                                    <label class="form-check-label mb-0 ms-3" for="rememberMe">
                                                        {{ $i->name }}
                                                    </label>
                                                </div>
                                            </div>

                                        @endforeach
                                    </div>
                                    <div class="row">

                                        <div class="col-md-10">
                                            <button type="submit" class="btn btn-success">Save</button>
                                        </div>

                                        <div class="col-md-2 text-right">
                                            <button type="button" class="btn btn-secondary" onclick="history.back()">Back</button>
                                        </div>

                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Basic Vertical form layout section end -->


        </div>
    </div>

@endsection


