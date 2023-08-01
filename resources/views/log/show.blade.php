@extends('layouts.user_type.auth')

@section('content')

    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">Log Information of <strong>{{  $log->id }}</strong></h6>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <ul class="list-group">
                            <li class="list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm">User Info</h6>
                                    <span class="mb-2 text-xs">User Id: <span class="text-dark font-weight-bold ms-sm-2">{{ $log->user_id }}</span></span>
                                    <span class="mb-2 text-xs">Username: <span class="text-dark ms-sm-2 font-weight-bold">{{ $log->user->name }}</span></span>
                                    <span class="text-xs">User Email: <span class="text-dark ms-sm-2 font-weight-bold">{{ $log->user->email }}</span></span>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm">Log Action</h6>
                                    <span>
                                        {{ $log->action }}
                                    </span>
                                </div>
                            </li>
                            <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">
                                <div class="d-flex flex-column">
                                    <h6 class="mb-3 text-sm">Log Content</h6>
                                    <span  class="text-sm">
                                        {{ $log->error_content }}
                                    </span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

