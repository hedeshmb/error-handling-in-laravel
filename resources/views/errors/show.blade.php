@extends('layouts.user_type.auth')

@section('content')

    <div class="row my-4">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7 h-auto">
                            <h6>Dear User,</h6>
                            <p class="text-sm">
                                <i class="fa fa-exclamation-triangle text-danger" aria-hidden="true"></i>
                                <span class="font-weight-bold ms-1">
                                    <strong>An error occurred in displaying the requested page.</strong>
                                </span>
                            </p>
                            <p>Please report to the system administrator.</p>
                            <p>Error code: {{$logId}}</p>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2 h-100">
                </div>
            </div>
        </div>
    </div>
@endsection

