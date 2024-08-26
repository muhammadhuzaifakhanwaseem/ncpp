@extends(template() . 'layout.auth')

@section('content')
@push('seo')
    <meta name='description' content="{{ @$general->seo_description }}">
@endpush
<!-- time and temperature -->
<div class="row h-100 justify-content-center">
    <!-- <div class="col-12 mb-auto">
        <div class="row text-white my-2">
            <div class="col">
                <p class="display-3 mb-0"><span id="time"></span><small><span class="h4 text-uppercase"
                            id="ampm"></span></small></p>
                <p class="lead fw-normal" id="date"></p>
            </div>
            <div class="col-auto text-end">
                <p class="display-3 mb-0">
                    <span id="temperature">46</span><span class="h4 text-uppercase"> <sup>0</sup>C</span>
                </p>

                <a href="javascript:void()" class="btn btn-link text-white dd-arrow-none dropdown-toggle p-0"
                    id="selectCity" data-bs-toggle="dropdown" aria-expanded="false">
                    <span class="h5 fw-normal" id="citymy">New York</span> <i
                        class="bi bi-pencil-square small fw-light"></i>
                </a>
            </div>
        </div>
    </div> -->
    <!-- time and temperature ends -->
    <div class="col-12 align-self-center py-5">
        <div class="row align-items-center justify-content-center">
            <div class="col-10 col-sm-8 col-md-6 col-lg-5  text-center text-white py-3 border border-light">
                <h3 class="mb-3 mb-lg-4">Create Account</h3>

                <form action="" class="mb-4 text-start" method="post">
                    @csrf
                    @if (isset(request()->reffer))
                        <label for="formGroupExampleInput">{{ __('Reffered By') }}</label>
                        <input type="text" class="form-control form-control-lg" value="{{ request()->reffer }}"
                            name="reffered_by" placeholder="{{ __('Reffered By') }}" readonly>
                    @endif
                    <!-- alert messages -->
                    <div class="alert alert-danger fade show d-none mb-2 global-alert text-start" role="alert">
                        <div class="row">
                            <div class="col"><strong>Requierd!</strong> Please enter valid data.</div>
                        </div>
                    </div>
                    <div class="alert alert-success fade show d-none mb-2 global-success text-start" role="alert">
                        <div class="row">
                            <div class="col-auto align-self-center">
                                <div class="spinner-border spinner-border-sm text-success me-2" role="status">
                                    <span class="visually-hidden">Loading...</span>
                                </div>
                            </div>
                            <div class="col ps-0 align-self-center">
                                <strong>Awesome!</strong> Taking you to the next page.
                            </div>
                        </div>
                    </div>
                    <!-- Form elements -->
                    <div class="mb-2 text-dark">
                        <div class="form-group mb-2 position-relative check-valid is-valid">
                            <div class="input-group input-group-lg border border-light rounded-0">
                                <div class="form-floating">
                                    <input type="text" name="fname" value="{{ old('fname') }}" id="name"
                                        placeholder="Enter first name"
                                        class="form-control text-white bg-transparent border-start-0">
                                    <label>First Name</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2 text-dark">
                        <div class="form-group mb-2 position-relative check-valid is-valid">
                            <div class="input-group input-group-lg border border-light rounded-0">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-start-0 bg-transparent text-white"
                                        id="lname" placeholder="Enter last name" name="lname"
                                        value="{{ old('lname') }}">
                                    <label>Last Name</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2 text-dark">
                        <div class="form-group mb-2 position-relative check-valid is-valid">
                            <div class="input-group input-group-lg border border-light rounded-0">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-start-0 bg-transparent text-white"
                                        placeholder="Enter Username" name="username" value="{{ old('username') }}">
                                    <label>Username</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2 text-dark">
                        <div class="form-group mb-2 position-relative check-valid is-valid">
                            <div class="input-group input-group-lg border border-light rounded-0">
                                <div class="form-floating">
                                    <input type="number" class="form-control border-start-0 bg-transparent text-white"
                                        placeholder="Enter Phone" name="phone" value="{{ old('phone') }}">
                                    <label>Phone</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2 text-dark">
                        <div class="form-group mb-2 position-relative check-valid is-valid ">
                            <div class="input-group input-group-lg border border-light rounded-0">
                                <div class="form-floating ">
                                    <input type="text" class="form-control border-start-0 bg-transparent text-white"
                                        placeholder="Enter Phone" name="email" value="{{ old('email') }}">
                                    <label>Email Address</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-dark">
                        <div class="form-group mb-2 position-relative check-valid">
                            <div class="input-group input-group-lg border border-light rounded-0">
                                <div class="form-floating">
                                    <input type="text" class="form-control border-start-0 bg-transparent text-white"
                                        placeholder="Enter Phone" name="password" id="password"
                                        placeholder="{{ __('Enter Password') }}">
                                    <label for="password1">Password</label>

                                </div>
                                <span class="input-group-text text-white bg-transparent border-end-0"
                                    id="viewpassword"><i class="bi bi-eye"></i></span>
                            </div>
                        </div>
                        <div class="feedback mb-3">
                            <div class="row">
                                <div class="col">
                                    <div class="check-strength" id="checksterngthdisplay">
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                        <div></div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <span class="small" id="textpassword"></span>
                                    <i class="bi bi-info-circle text-white ms-1" data-bs-trigger="hover"
                                        data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top"
                                        data-bs-content="Password should contain atleast 1 capital, 1 alphanumeric & min. 8 characters"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-dark">
                        <div class="form-group mb-2 position-relative check-valid">
                            <div class="input-group input-group-lg border border-light rounded-0">
                                <span class="input-group-text text-white border-end-0 bg-transparent text-white"><i
                                        class="bi bi-key"></i></span>
                                <div class="form-floating">
                                    <input type="text" class="form-control border-start-0 bg-transparent"
                                        placeholder="Enter Phone" name="password_confirmation"
                                        id="password_confirmation" placeholder="{{ __('Confirm Password') }}">
                                    <label for="confirm_password">Confirm Password</label>
                                    {{-- <div class="invalid-feedback">Please enter valid input</div> --}}

                                </div>
                                <span class="input-group-text text-white bg-transparent  border-end-0"
                                    id="viewpassword2"><i class="bi bi-eye"></i></span>
                            </div>
                        </div>
                        {{-- <div class="invalid-feedback">Please enter valid input</div> --}}
                        <div class="valid-feedback">Woooh! Entered password matched </div>
                    </div>
                    @if (@$general->allow_recaptcha == 1)
                        <script src="https://www.google.com/recaptcha/api.js"></script>
                        <div class="g-recaptcha" data-sitekey="{{ @$general->recaptcha_key }}"
                            data-callback="verifyCaptcha"></div>
                        <div id="g-recaptcha-error"></div>
                    @endif
                    <input type="checkbox" class="custom-control-input" name="check" id="checkbox"><label
                        class="custom-control-label" for="checkbox">I agree to Spark-x <a class="text-white"
                            tabindex="-1" href="#">Privacy
                            Policy</a> &amp; <a class="text-white" tabindex="-1" href="#"> Terms.</a></label>
                    <div class="mt-auto mb-4">
                        <!-- submit button -->
                        <div class="d-flex justify-content-center w-100">
                         <button
                                class="btn btn-lg bg-green-main text-dark rounded-0 top-0 end-0 z-index-5 mt-4"
                                type="submit">Register
                                <i class="bi bi-arrow-right"></i></button>
                        </div>
                    </div>
                </form>

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