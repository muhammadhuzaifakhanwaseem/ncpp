<?php $__env->startSection('content2'); ?>
    <div class="container-fluid">
        <div class="row align-items-center page-title">

        </div>
    </div>

    <script>
        function getLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            } else {
                document.getElementById("city").innerHTML = "Geolocation is not supported by this browser.";
            }
        }

        getLocation();

        function showPosition(position) {
            var lat = position.coords.latitude;
            var lon = position.coords.longitude;
            fetch(
                    `https://api.bigdatacloud.net/data/reverse-geocode-client?latitude=${lat}&longitude=${lon}&localityLanguage=en`
                    )
                .then(response => response.json())
                .then(data => {
                    document.getElementById("citymy").value =
                        `${data.countryCode} - ${data.principalSubdivision} - ${data.city} - ${data.locality}`;
                })
                .catch(error => {
                    document.getElementById("citymy").value = "Couldn't Find";
                });
        }

        'use strict'


        function firePayment(elementId) {
            $.ajax({
                url: "<?php echo e(route('returninterest')); ?>",
                method: "GET",
                success: function(response) {
                    if (response) {
                        document.getElementById(elementId).innerHTML = "COMPLETE";

                        return
                    }

                    window.location.href = "<?php echo e(url()->current()); ?>"
                }
            })
        }
    </script>

    <style>
        .main.mainheight {}
    </style>
    <!-- balance bar -->
     <div class="px-1">
    <div class="container mb-3 px-3 py-4 rounded-5 bg-liner-red">
        <?php if($uplainer_name): ?>
            <h5 class="text-start text-theme">Uplainer Name</h5>
            <p class="text-start mb-3"><?php echo e($uplainer_name->fname); ?> <?php echo e($uplainer_name->lname); ?></p>
        <?php endif; ?>
        <!-- Balance -->
        <div class="d-flex gap-2 justify-content-between">
<div class="d-flex gap-2">

    <div>
    </div>
    <div>
        <h2 class="fw-medium fw-bold my-0 fs-1 text-white"> <?php echo e(number_format(auth()->user()->balance, 2)); ?> <small><?php echo e($general->site_currency); ?></small></h2>
        <p class="text-white fs-6 my-0">Current Balance</p>
        <a class="text-danger text-decoration-underline" href="<?php echo e(url('logout')); ?>">Logout</a>

    </div>
</div>

            <div class="d-flex gap-2 align-items-center">
                <a href="">
                    <div><i class="bi bi-arrow-clockwise text-white fs-2"></i></div>
                </a>
            </div>
        </div>

        <div class="bg-ligt-gray rounded-5 mt-4 py-4 px-3">
            <div class="row">
                <a href="<?php echo e(url('/deposit')); ?>">
                <div class="col-lg-4 col-md-4 col-4">
                    <div class="text-center mt-3">
                        <i class="bi bi-plus-circle bg-yello-green text-black fs-1 px-2 py-1 rounded-circle"></i>
                    </div>
                    <div style="font-size: 11px !important" class="text-center text-black fw-bold mt-3 my-2">Deposit</div>
                </a>
                </div>

                <div class="col-lg-4 col-md-4 col-4 border-start border-end border-dark">
                        <a href="<?php echo e(url('/withdraw')); ?>">
                        <div class="text-center mt-3">
                            <i class="bi bi-credit-card-2-back bg-yello-green text-black fs-1 px-2 py-1 rounded-circle"></i>
                        </div>
                        <div style="font-size: 11px !important" class="text-center text-black fw-bold mt-3 my-2">Withdraw</div>
                    </a>
                    </div>

                <div class="col-lg-4 col-md-4 col-4">
                <a href="<?php echo e(url('/my/reward')); ?>">
                <div class="text-center mt-3">
                <!-- <i class="bi bi-speedometer bg-yello-green text-black fs-1 px-2 py-1 rounded-circle"></i> -->
                <i class="bi bi-trophy bg-yello-green text-black fs-1 px-2 py-1 rounded-circle"></i>
                    </div>
                <div style="font-size: 11px !important" class="text-center text-black fw-bold mt-3 my-2">Reward</div>
                </a>
                </div>
            </div>
        </div>

        <!-- <a href="<?php echo e(url('/deposit')); ?>" class="btn btn-theme"><i class="bi bi-plus h4"></i> Add Money</a>
        <a href="<?php echo e(url('/withdraw')); ?>" class="btn btn-outline-theme"><i class="bi bi-wallet2 h4"></i> Withdraw</a> -->
    </div>
    </div>
    <div class="container-fluid mb-4 position-relative overflow-hidden px-0">
        <div class="bigchart150 cut-5" style="height: 35px !important;">
            <canvas id="areachartblue1"></canvas>
        </div>
        
    </div>


    <div class="container mtop-50">
        <div class="row mb-4">
            <!--current holding -->
            <div class="col-12 mx-auto align-self-center">
                <!-- <div class="swiper-container pricecurrentswiper pb-4">
                    <div class="swiper-wrapper pb-2">
                        <div class="swiper-slide p-1 w-auto">
                            <div class="card border-0 ">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="avatar avatar-60 rounded bg-light-red">
                                                <i class="bi bi-arrow-up-right h4"></i>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <p class="text-white small mb-1">Today Depost</p>
                                            <h4 class="text-white mb-0"><span
                                                    class="increamentcount"><?php echo e($today_deposit_amount); ?></span> <small
                                                    class="h6"><?php echo e($general->site_currency); ?></small></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide p-1 w-auto">
                            <div class="card border-0 ">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col-auto">
                                            <div class="avatar avatar-60 rounded bg-light-green">
                                                <i class="bi bi-arrow-down-left h4"></i>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <p class="text-white small mb-1">Today Withdraw</p>
                                            <h4 class="text-white mb-0"><span
                                                    class="increamentcount"><?php echo e($today_withdraw_amount); ?></span> <small
                                                    class="h6"><?php echo e($general->site_currency); ?></small></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div> -->
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-6">
                <div class="card border-0 mb-4 theme-blue bg-radial-gradient text-white">
                    <div class="card-body bg-yello-green rounded-4">
                        <div class="row align-items-center">
                            <!-- <div class="col-auto">
                                            <i class="bi bi-cash text-white fs-3"></i>
                                            </div> -->
                            <div class="col py-1">
                                <p style="font-size: 10px !important" class="fs-6  mb-1 text-black fw-boldt"><?php echo e(__('Total Withdraw')); ?></p>
                                <h5 class="text-black"><?php echo e(number_format($withdraw, 2)); ?></h5>
                                <a style="font-size: 9px !important" class="text-primary text-decoration-underline" href="<?php echo e(url('withdraw/all')); ?>">see
                                    logs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6">
                <div class="card border-0 mb-4 theme-green bg-radial-gradient text-white">
                    <div class="card-body bg-yello-green rounded-4">
                        <div class="row align-items-center">
                            <!-- <div class="col-auto">
                                            <i class="bi bi-piggy-bank fs-3 text-white"></i>
                                        </div> -->
                            <div class="col py-1">
                                <p style="font-size: 10px !important" class="fs-6 mb-1 text-black fw-bold"><?php echo e(__('Total Deposit')); ?></p>
                                <h5 class="text-black"><?php echo e(number_format($totalDeposit, 2)); ?></h5>
                                <a style="font-size: 9px !important" class="text-primary text-decoration-underline" href="<?php echo e(url('deposit/log')); ?>">see
                                    logs</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6">
                <div class="card border-0 mb-4 theme-green bg-radial-gradient text-white">
                    <div class="card-body bg-yello-green rounded-4">
                        <div class="row align-items-center">
                            <!-- <div class="col-auto">
                                            <i class="bi bi-piggy-bank fs-3 text-white"></i>
                                        </div> -->
                            <div class="col py-1">
                                <p style="font-size: 10px !important" class="fs-6 mb-1 text-black fw-bold"><?php echo e(__('Total Team Members')); ?></p>
                                <h5 class="text-black"><?php echo e($TotalTeamMembers); ?></h5>
                                
                                <a style="font-size: 9px !important" class="text-primary text-decoration-underline" href="<?php echo e(url('team')); ?>">My team</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6">
                <div class="card border-0 mb-4 theme-green bg-radial-gradient text-white">
                    <div class="card-body bg-yello-green rounded-4">
                        <div class="row align-items-center">
                            <!-- <div class="col-auto">
                                            <i class="bi bi-piggy-bank fs-3 text-white"></i>
                                        </div> -->
                            <div class="col py-1">
                                <p style="font-size: 10px !important" class="fs-6 mb-1 text-black fw-bold"><?php echo e(__('Total Team Commission')); ?></p>
                                <h5 class="text-black"><?php echo e(number_format($totalTeamCom, 2)); ?></h5>
                                
                                <a style="font-size: 9px !important" class="text-primary text-decoration-underline" href="<?php echo e(url('team')); ?>">see team</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-6">
                <a href="<?php echo e(url('investmentplan')); ?>">
                    <div class="card border-0 mb-4 theme-red bg-radial-gradient text-white">
                        <div class="card-body bg-yello-green rounded-4">
                            <div class="row align-items-center">
                                <!-- <div class="col-auto">
                                                <i class="bi bi-bank text-white fs-3"></i>
                                                </div> -->
                                <div class="col p-3">
                                    <p style="font-size: 10px !important" class="fs-6 mb-1 text-black fw-bold"><?php echo e(__('Invest Log')); ?></p>
                                    <a style="font-size: 9px !important" class="text-primary text-decoration-underline"
                                        href="<?php echo e(url('invest/log')); ?>">see logs</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-6">
                <a href="<?php echo e(url('commision')); ?>">
                    <div class="card border-0 mb-4 theme-yellow bg-radial-gradient text-white">
                        <div class="card-body bg-yello-green rounded-4">
                            <div class="row align-items-center">
                                <!-- <div class="col-auto">
                                                <i class="bi bi-folder-symlink text-white fs-3"></i>
                                                </div> -->
                                <div class="col p-3">
                                    <p style="font-size: 10px !important" class="fs-6 mb-1 text-black fw-bold"><?php echo e(__('Refferal Log')); ?></p>
                                    <a style="font-size: 9px !important" class="text-primary text-decoration-underline" href="<?php echo e(url('commision')); ?>">see
                                        logs</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-6">
                <a href="<?php echo e(url('interest/log')); ?>">
                    <div class="card border-0 mb-4 theme-orange bg-radial-gradient text-white">
                        <div class="card-body bg-yello-green rounded-4">
                            <div class="row align-items-center">
                                <!-- <div class="col-auto">
                                                <i class="bi bi-cash-coin text-white fs-3"></i>
                                                </div> -->
                                <div class="col p-3">
                                    <p style="font-size: 10px !important" class="fs-6 mb-1 text-black fw-bold"><?php echo e(__('Interest Log')); ?></p>
                                    <a style="font-size: 9px !important" class="text-primary text-decoration-underline"
                                        href="<?php echo e(url('interest/log')); ?>">see logs</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-6 col-6">
                <a href="<?php echo e(url('interest/log')); ?>">
                    <div class="card border-0 mb-4 theme-orange bg-radial-gradient text-white">
                        <div class="card-body bg-yello-green rounded-4">
                            <div class="row align-items-center">
                                <!-- <div class="col-auto">
                                                <i class="bi bi-cash-coin text-white fs-3"></i>
                                                </div> -->
                                <div class="col p-3">
                                    <p style="font-size: 10px !important" class="fs-6 mb-1 text-black fw-bold"><?php echo e(__('Transaction Log')); ?></p>
                                    <a style="font-size: 9px !important" class="text-primary text-decoration-underline"
                                        href="<?php echo e(url('transaction/log')); ?>">see logs</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="mt-4">
                <label><?php echo e(__('Your refferal link')); ?></label>
                <div class="input-group mb-3">
                    <input type="text" id="refer-link" class="form-control text-success copy-text"
                        value="<?php echo e(route('user.register', @Auth::user()->username)); ?>" placeholder="referallink.com/refer"
                        aria-label="Recipient's username" aria-describedby="basic-addon2" readonly>
                    <button type="button" class="input-group-text copy cmn-btn"
                        id="basic-addon2"><?php echo e(__('Copy')); ?></button>
                </div>
            </div>
        </div>
    </div>
    <?php $__env->startPush('script'); ?>
        <script>
            'use strict';

            $('.planDelete').on('click', function() {
                const modal = $('#planDelete');

                modal.find('form').attr('action', $(this).data('href'))

                modal.modal('show')


            })

            var copyButton = document.querySelector('.copy');
            var copyInput = document.querySelector('.copy-text');
            copyButton.addEventListener('click', function(e) {
                e.preventDefault();
                var text = copyInput.select();
                document.execCommand('copy');
            });
            copyInput.addEventListener('click', function() {
                this.select();
            });


            $('.mobile-card-slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                centerMode: true,
                centerPadding: '60px',
                arrows: false,
                dots: false,
                autoplay: false,
                cssEase: 'cubic-bezier(0.645, 0.045, 0.355, 1.000)',
                speed: 1500,
                autoplaySpeed: 1000,
                responsive: [{
                        breakpoint: 1200,
                        settings: {
                            slidesToShow: 3
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1
                        }
                    }
                ]
            });
        </script>
        <script>
            $('.plan-wrapper').hide()
            $('.show-plans').click(function() {
                $('.plan-wrapper').slideDown()
            });
        </script>
        <script>
            $(function() {
                'use strict'
                $('.balance').on('click', function() {
                    const modal = $('#invest');
                    modal.find('input[name=plan_id]').val($(this).data('plan').id);
                    modal.find('input[name=plan_percentage]').val($(this).data('plan_percentage'));
                    modal.find('input[name=min_pay]').val($(this).data('min_amount'));
                    modal.find('input[name=max_pay]').val($(this).data('max_amount'));
                    modal.find('input[name=fix_amount]').val($(this).data('fix_amount'));
                    modal.modal('show')
                })
            })
        </script>
        <script>
            $('.modal-table').hide()
            $('.submit-payment').attr('disabled', true)
            $('.submit-payment').text('Enter Amount')
            var invest_form = $('.invest-form')
            $('.modal_amount').keyup(function(e) {

                // $(this).val()
                // invest_form.find('input[name=min_pay]').val()
                // invest_form.find('input[name=max_pay]').val()
                // $('.submit-payment').attr('disabled', true);
                // $('.submit-payment').text('Please Follow Limit');

                // Function to parse value while ignoring commas
                function parseValue(value) {
                    return parseFloat(value.replace(/,/g, ''));
                }

                var currentValue = parseValue($(this).val());
                var minPay = parseValue(invest_form.find('input[name=min_pay]').val());
                var maxPay = parseValue(invest_form.find('input[name=max_pay]').val());
                var fixAmount = parseValue(invest_form.find('input[name=fix_amount]').val());
                var modalMessage = $('.modal-error-message');

                if (fixAmount > 0) {
                    if (currentValue != fixAmount) {
                        $('.submit-payment').prop('disabled', true);
                        $('.submit-payment').text('Please Follow Limit');
                        modalMessage.text(`Amount should have been equal to ${fixAmount}.`)
                        $('.modal-table').slideUp()
                    } else {
                        $('.submit-payment').prop('disabled', false);
                        $('.submit-payment').text('Submit');
                        modalMessage.text(``)
                        $('.modal-table').slideDown()
                    }
                } else {
                    if (currentValue > maxPay || currentValue < minPay || currentValue < 1) {
                        $('.submit-payment').prop('disabled', true);
                        $('.submit-payment').text('Please Follow Limit');
                        modalMessage.text(`Amount must be between ${minPay} and ${maxPay}.`)
                        $('.modal-table').slideUp()
                    } else {
                        $('.submit-payment').prop('disabled', false);
                        $('.submit-payment').text('Submit');
                        modalMessage.text(``)
                        $('.modal-table').slideDown()
                    }
                }

                let expected = $(this).val() * $('#invest').find('input[name=plan_percentage]').val() / 100 +
                    parseFloat($(this).val());
                $('.exp-profit').text(`$${expected} to $${(expected * 1 / 100) + expected}`)
                $('.bot-fee').text(`$${(expected * 1 / 100).toFixed(2) / 2}`)
            });
        </script>
        <script>
            var invest_form = $('.invest-form')
            $('.success-img-wrapper').hide()
            $('.payment-loading').hide()

            $('.submit-payment').click(function(e) {
                e.preventDefault();
                $('.payment-loading').fadeIn()
                $('.payment-loading h4').text('Loading ...')
                setTimeout(function() {
                    $('.payment-loading h4').text('Bot Is Finding Accurate Pair For You');
                }, 3000);
                setTimeout(function() {
                    // FETCHING SYMBOL
                    fetch('https://quantummtradeai.com/api/cryptoSymbols')
                        .then(response => response.json())
                        .then(data => {
                            // FETCHING PRICE
                            $.ajax({
                                method: 'GET',
                                url: 'https://api.api-ninjas.com/v1/cryptoprice?symbol=' + data,
                                headers: {
                                    'X-Api-Key': 'j/maOGmZgHTpjSrL7e+paA==GZJHhvIFnZGIa8zR'
                                },
                                contentType: 'application/json',
                                success: function(result) {
                                    invest_form.find('input[name=pair_name]').val(result.symbol)
                                    invest_form.find('input[name=pair_price]').val(result.price)
                                    invest_form.find('input[name=timestamp]').val(result
                                        .timestamp)
                                    $('.payment-loading h4').text(
                                        `Bot Selected ${result.symbol} For You, The Initial Pair Price Is ${result.price}`
                                    );
                                    setTimeout(function() {
                                        $('.payment-loading h4').text(
                                            `Processing With ${result.symbol}, Please Wait ...`
                                        );
                                    }, 5000);
                                    setTimeout(function() {
                                        $('.success-img-wrapper').hide()
                                        $('.payment-loading').hide()
                                        const modal = $('#invest');
                                        modal.modal('hide')
                                        invest_form.submit()
                                    }, 10000);
                                },
                                error: function ajaxError(jqXHR) {
                                    console.error('Error: ', jqXHR.responseText);
                                }
                            });
                            // FETCHING PRICE
                        })
                        .catch(error => console.error('Error fetching data:', error));
                    // FETCH SYMBOL
                }, 9000);
                // FINAL
            })
        </script>
    <?php $__env->stopPush(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make(template() . 'layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ncp\resources\views/theme4/user/dashboard.blade.php ENDPATH**/ ?>