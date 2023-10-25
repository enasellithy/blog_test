@extends('layouts.app')

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row dataTables_wrapper">
            <h4 class="py-3 mb-4"><span class="text-muted fw-light">Home /</span>
                Users
            </h4>

            <div class="nav-align-top mb-4">
                <div class="card-header flex-column flex-md-row mb-5">
                    <div class="head-label text-center"><h5 class="card-title mb-0"></h5></div>
                    @include('users.add-button')
                    <!-- DataTable with Buttons -->
                </div>
                <div class="tab-content dataTables_wrapper">

                    <div class="card">
                        <livewire:user-table theme="bootstrap-4" />
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
