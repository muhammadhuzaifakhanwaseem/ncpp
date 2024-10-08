@extends(template() . 'layout.master2')
<style>
    .dashboard-body-part {
        background: transparent !important;
        padding: 50px 0;
    }

    h5 {
        color: #fff !important;
    }

    .list-group {
        margin-top: 10px;
    }

    .list-group-item {
        border-top-left-radius: inherit;
        !important border-top-right-radius: inherit !important;
        background: transparent !important;
        border: 0 !important;
        padding: 6px !important;
        border-bottom: 1px solid gray;
    }

    .list-group-item span {
        color: #fff !important;
    }
</style>

@section('content2')
<div class="dashboard-body-part">

    <div class="row gy-4 justify-content-center">
        <div class="col-xl-6 col-10">
            <div class="site-card">
                <div class="card-header">
                    <h5 class="mb-0">{{ __('Bank Payment Information') }}</h5>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item text-white d-flex justify-content-between">
                            <span class="fw-medium ">{{ __('Company Bank Name') }}</span>
                            <span>{{ $gateway->gateway_parameters->name }}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-medium">{{ __('Company Account Number') }}</span>
                            <span>{{ $gateway->gateway_parameters->account_number }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-medium">{{ __('Company Account Holder Name') }}</span>
                            <span>Muhammad Tahir imran</span>
                        </li>

                        {{-- <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-medium">{{ __('Routing Number') }}</span>
                            <span>{{ $gateway->gateway_parameters->routing_number }}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-medium">{{ __('Branch Name') }}</span>
                            <span>{{ $gateway->gateway_parameters->branch_name }}</span>
                        </li> --}}

                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-medium">{{ __('Method Currency') }}</span>
                            <span>{{ $gateway->gateway_parameters->gateway_currency }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-10">
            <div class="site-card">
                <div class="card-header">
                    <h5 class="mb-0">{{ __('Payment Information') }}</h5>
                </div>

                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-medium">{{ __('Gateway Name') }}:</span>
                            <span>{{ $deposit->gateway->gateway_name }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-medium">{{ __('Amount') }}:</span>
                            <span>{{ number_format($deposit->amount, 2) . ' ' . @$general->site_currency }}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-medium">{{ __('Charge') }}:</span>
                            <span>{{ number_format($deposit->charge, 2) . ' ' . @$general->site_currency }}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-medium">{{ __('Conversion Rate') }}:</span>
                            <span>{{ '1 ' . @$general->site_currency . ' = ' . number_format($deposit->rate, 2) }}</span>
                        </li>

                        <li class="list-group-item d-flex justify-content-between">
                            <span class="fw-medium">{{ __('Total Payable Amount') }}:</span>
                            <span>{{ number_format($deposit->final_amount, 2) . ' ' . @$general->site_currency }}</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-10">
            <div class="site-card">
                <div class="card-header">
                    <h5 class="mb-0">{{ __('Payment Proof') }}</h5>
                </div>
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            @foreach ($gateway->user_proof_param as $proof)
                                @if ($proof['type'] == 'text')
                                    <div class="form-group p-0 col-md-12">
                                        <label for="" class="mb-2 mt-2">{{ __($proof['field_name']) }}</label>
                                        <input type="text" name="{{ strtolower(str_replace(' ', '_', $proof['field_name'])) }}"
                                            class="form-control" {{ $proof['validation'] == 'required' ? 'required' : '' }}>
                                    </div>
                                @endif
                                @if ($proof['type'] == 'textarea')
                                    <div class="form-group p-0 col-md-12">
                                        <label for="" class="mb-2 mt-2">{{ __($proof['field_name']) }}</label>
                                        <textarea name="{{ strtolower(str_replace(' ', '_', $proof['field_name'])) }}"
                                            class="form-control" {{ $proof['validation'] == 'required' ? 'required' : '' }}></textarea>
                                    </div>
                                @endif

                                @if ($proof['type'] == 'file')
                                    <div class="form-group p-0 col-md-12">
                                        <label for="" class="mb-2 mt-2">{{ __($proof['field_name']) }}</label>
                                        <input type="file" name="{{ strtolower(str_replace(' ', '_', $proof['field_name'])) }}"
                                            class="form-control" {{ $proof['validation'] == 'required' ? 'required' : '' }}>
                                    </div>
                                @endif
                            @endforeach
                            <div class="form-group p-0">
                                <button class="btn bg-warning text-dark"
                                    type="submit"><span>{{ __('Send Proof For Payment ') }}</span></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
