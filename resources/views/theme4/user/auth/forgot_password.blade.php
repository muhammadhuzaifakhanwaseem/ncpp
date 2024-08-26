@extends(template() . 'layout.auth')

@section('content')
@push('seo')
    <meta name='description' content="{{ @$general->seo_description }}">
@endpush

<div class="nk-wrap nk-wrap-nosidebar d-flex justify-content-center align-items-center">
    <div class="nk-content col-lg-4 col-md-6 col-10">
        <div class="nk-split nk-split-page nk-split-lg border p-3">
            <div class="nk-split-content nk-block-area nk-block-area-column nk-auth-container w-lg-45">
                <div class="nk-block nk-block-middle nk-auth-body">
                    <div class="nk-block-head">
                        <h5 class="text-center text-white fs-4 my-4">{{ __('Request For Reset Password') }}</h5>
                    </div>
                    <form action="{{ route('user.forgot.password') }}" method="POST">
                        @csrf
                        <input class="bg-transparent" type="hidden" name="email" value="">
                        <div class="">
                            <div class="form-label-group"><label class="form-label"
                                    for="default-01">{{ __('Email Address') }}</label></div>
                            <div class="form-control-wrap border my-3"><input type="email"
                                    class="form-control bg-transparent form-control-lg text-white" name="email" id="email"
                                    placeholder="{{ __('Enter Email') }}"></div>
                        </div>
                        @if (@$general->allow_recaptcha == 1)
                            <div class="mb-3">
                                <script src="https://www.google.com/recaptcha/api.js"></script>
                                <div class="g-recaptcha" data-sitekey="{{ @$general->recaptcha_key }}"
                                    data-callback="verifyCaptcha"></div>
                                <div id="g-recaptcha-error"></div>
                            </div>
                        @endif
                        <div class="d-flex justify-content-center"><button id="recaptcha" class="btn bg-green-main rounded-0 btn-block"
                                type="submit">{{ __('Send Verification Code') }}</button></div>
                    </form>
                    <div class="form-note-s2 py-3 text-center"><a class="text-white" href="{{ route('user.login') }}"><strong>Return to
                                login</strong></a></div>
                </div>
            </div>
            <div class="nk-split-content nk-split-stretch bg-lighter d-flex toggle-break-lg toggle-slide toggle-slide-right"
                data-toggle-body="true" data-content="athPromo" data-toggle-screen="lg" data-toggle-overlay="true">
                <div class="w-100 w-max-550px m-auto">
                    <div class="nk-feature nk-feature-center">
                        <div class="nk-feature-img"><img class="round" src="../../images/slides/promo-a.png"
                                srcset="/demo6/images/slides/promo-a2x.png 2x" alt=""></div>
                        <div class="nk-feature-content">
                            <h4 class="text-white">Spark-X</h4>
                            <p class="text-white">You can start to create your products easily with its user-friendly design &
                                most completed responsive layout.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('script')
    <script>
        "use strict";

        function submitUserForm() {
            var response = grecaptcha.getResponse();
            if (response.length == 0) {
                document.getElementById('g-recaptcha-error').innerHTML =
                    "<span class='sp_text_danger'>{{__('Captcha field is required.')</span>";
                return false;
            }
            return true;
        }

        function verifyCaptcha() {
            document.getElementById('g-recaptcha-error').innerHTML = '';
        }
    </script>
@endpush