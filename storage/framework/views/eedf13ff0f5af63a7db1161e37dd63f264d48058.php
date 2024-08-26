<style>
    .nk-content-fluid {
        padding: 80px 0 50px 0 !important;
        height: 100vh;
        overflow: auto;
    }

    #invoice-POS {
        box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5);
        padding: 2mm;
        margin: 0 auto;
        width: 100%;
        background: #000000;
        border-radius: 10px;
    }

    #invoice-POS ::selection {
        background: #f31544;
        color: #fff;
    }

    #invoice-POS ::moz-selection {
        background: #f31544;
        color: #fff;
    }

    #invoice-POS h1 {
        font-size: 1.5em;
        color: #222;
    }

    #invoice-POS h2 {
        font-size: 0.9em;
    }

    #invoice-POS h3 {
        font-size: 1.2em;
        font-weight: 300;
        line-height: 2em;
    }

    #invoice-POS p {
        font-size: 0.7em;
        color: #a6ff00;
        line-height: 1.2em;
    }

    #invoice-POS #top,
    #invoice-POS #mid,
    #invoice-POS #bot {
        /* Targets all id with 'col-' */
        border-bottom: 1px solid #eeeeee33;
    }

    #invoice-POS #top {
        padding-bottom: 10px;
    }

    #invoice-POS #mid {
        min-height: 80px;
    }

    #invoice-POS #bot {
        min-height: 50px;
    }

    #invoice-POS #top .logo {
        height: 60px;
        width: 60px;
        background: url(https://cdn.dribbble.com/userupload/10543014/file/original-4703d0ba72b72f87fa49a618a24a1f6d.gif) no-repeat;
        background-size: 100% 100%;
        border-radius: 50%;
    }

    #invoice-POS .clientlogo {
        float: left;
        height: 60px;
        width: 60px;
        background: url(http://michaeltruong.ca/images/client.jpg) no-repeat;
        background-size: 60px 60px;
        border-radius: 50px;
    }

    #invoice-POS .info {
        display: block;
        margin-left: 0;
    }

    #invoice-POS .title {
        float: right;
    }

    #invoice-POS .title p {
        text-align: right;
    }

    #invoice-POS table {
        width: 100%;
        border-collapse: collapse;
    }

    #invoice-POS .tabletitle {
        font-size: 0.5em;
        background: #eee;
    }

    #invoice-POS .service {
        border-bottom: 1px solid #aef32d54;
    }

    #invoice-POS .item {
        width: 24mm;
    }

    #invoice-POS .itemtext {
        font-size: 9px;
    }

    #invoice-POS #legalcopy {
        margin-top: 5mm;
    }

    td,
    th,
    .tableitem {
        padding: 10px 5px !important;
    }

    .loader7 {
        width: auto;
        height: 16px;
        border: 1px solid #a6ff0052;
        border-radius: 5px;
        position: relative;
        overflow: hidden;
        background: #c8c8c800;
        margin: 0;
    }

    .loader7::after,
    .loader7::before {
        content: " ";
        position: absolute;
        height: 100%;
        left: 0;
        width: 10px;
        z-index: 1;
        background: linear-gradient(to right, rgba(170, 170, 170, 0) 0%, rgba(170, 170, 170, 0) 100%);
    }

    .loader7::after {
        left: auto;
        right: 0;
        background: linear-gradient(to right, rgba(170, 170, 170, 0) 0%, rgba(170, 170, 170, 0) 100%);
    }

    .loader7>span {
        content: " ";
        top: 0;
        z-index: 3;
        width: 100%;
        height: 100%;
        box-shadow: 0 0 1px #ffffff00 inset;
        position: absolute;
    }

    .loader7>span:before {
        content: " ";
        top: 0;
        width: 100%;
        height: 100%;
        position: absolute;
        top: 0;
        background: transparent;
    }

    .greenlight {
        width: 120px;
        top: -50%;
        height: 250%;
        position: absolute;
        animation: greenglow 3s linear infinite;
        -webkit-animation: greenglow 3s linear infinite;
        z-index: 2;
        mask-image: radial-gradient(ellipse at center, rgba(0, 0, 0, 1) 0%, rgba(0, 0, 0, 0) 70%, rgba(0, 0, 0, 0) 100%);
        background: rgba(0, 219, 49, 1);
    }

    @keyframes  greenglow {
        from {
            left: -120px;
        }

        to {
            left: 100%;
        }
    }

    body {
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
        font-family: 'Segoe UI', Arial, sans-serif;
    }

    a {
        color: #06c;
        text-decoration: none;
    }

    a:hover {
        color: #39f;
        text-decoration: underline;
    }
</style>

<?php $__env->startSection('content2'); ?>
    <script>
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
                    // window.location.href = "<?php echo e(url()->current()); ?>"
                }
            })
        }

        function getCountDown(elementId, seconds) {
            var times = seconds;

            var x = setInterval(function() {
                var distance = times * 1000;

                if (distance < 0) {
                    clearInterval(x);
                    firePayment(elementId);
                    return
                }
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                document.getElementById(elementId).innerHTML = days + "d " + hours + "h " + minutes + "m " +
                    seconds + "s ";
                times--;
            }, 1000);
        }
    </script>
    <div class="nk-content nk-content-fluid">
        <div class="container-xl wide-xl">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="components-preview px-2">
                        <div class="nk-block-head nk-block-head-lg wide-sm">
                            <div class="card-header d-flex flex-wrap justify-content-between align-items-center">
                                <h5 class="mb-sm-0 mb-2"><?php echo e(__('Trade Log')); ?></h5>
                                <form action="" method="get" class="d-inline-flex">
                                    <input type="text" name="trx" class="form-control form-control-sm me-2"
                                        placeholder="transaction id">
                                    <input type="date" class="form-control form-control-sm me-3"
                                        placeholder="Search User" name="date">
                                    <button type="submit" class="btn main-btn btn-sm"><?php echo e(__('Search')); ?></button>
                                </form>
                            </div>
                        </div>
                        <?php $__empty_1 = true; $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $transaction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="card w-100">
                                <div id="invoice-POS">
                                    <div id="bot">
                                        <div id="table">
                                            <table>
                                                <tr class="service">
                                                    <td class="tableitem">
                                                        <p class="itemtext">
                                                            <?php echo e(__('Trade ID')); ?>

                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="itemtext">
                                                            <?php echo e($transaction->transaction_id); ?>

                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr class="service">
                                                    <td class="tableitem">
                                                        <p class="itemtext">
                                                            <?php echo e(__('Amount')); ?>

                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="itemtext">
                                                            <?php echo e($transaction->amount); ?>

                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr class="service">
                                                    <td class="tableitem">
                                                        <p class="itemtext">
                                                            <?php echo e(__('Currency')); ?>

                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="itemtext">
                                                            <?php if($transaction->gateway_id == 0): ?>
                                                                <?php echo e($general->site_currency); ?>

                                                            <?php else: ?>
                                                                <?php echo e($transaction->gateway->gateway_parameters->gateway_currency); ?>

                                                            <?php endif; ?>
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr class="service">
                                                    <td class="tableitem">
                                                        <p class="itemtext">
                                                            <?php echo e(__('Date')); ?>

                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="itemtext">
                                                            <?php echo e($transaction->created_at->format('Y-m-d')); ?>

                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr class="service">
                                                    <td class="tableitem">
                                                        <p class="itemtext">
                                                            <?php echo e(__('Initial Pair Price')); ?>

                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="itemtext">
                                                            <?php echo e($transaction->pair_price); ?>

                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr class="service">
                                                    <td class="tableitem">
                                                        <p class="itemtext text-warning">
                                                            <?php echo e(__('Ending Pair Price')); ?>

                                                        </p>
                                                    </td>
                                                    <td class="itemtext text-warning">
                                                        <?php if($transaction->next_payment_date != null): ?>
                                                            <div class="loader7">
                                                                <span></span>
                                                                <div class="greenlight"></div>
                                                            </div>
                                                        <?php else: ?>
                                                            <p class="itemtext text-warning">
                                                                <?php echo e($transaction->pair_price * 1.002); ?>

                                                            </p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <tr class="service">
                                                    <td class="tableitem">
                                                        <p class="itemtext">
                                                            <?php echo e(__('Trading Pair')); ?>

                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="itemtext">
                                                            <?php echo e($transaction->pair_name); ?>

                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr class="service">
                                                    <td class="tableitem">
                                                        <p class="itemtext text-warning">
                                                            <?php echo e(__('Profit Amount')); ?>

                                                        </p>
                                                    </td>
                                                    <td>
                                                        <?php if($transaction->next_payment_date != null): ?>
                                                            <div class="loader7">
                                                                <span></span>
                                                                <div class="greenlight"></div>
                                                            </div>
                                                        <?php else: ?>
                                                            <p class="itemtext text-warning">
                                                                $<?php echo e($transaction->interest_amount - ($transaction->interest_amount * 0.5) / 100); ?>

                                                            </p>
                                                        <?php endif; ?>
                                                    </td>
                                                </tr>
                                                <tr class="service">
                                                    <td class="tableitem">
                                                        <p class="itemtext">
                                                            <?php echo e(__('Boot Fee')); ?>

                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p class="itemtext">
                                                            <?php echo e(($transaction->interest_amount * 0.5) / 100); ?>%
                                                        </p>
                                                    </td>
                                                </tr>
                                                <tr class="service">
                                                    <td class="tableitem">
                                                        <p class="itemtext">
                                                            <?php echo e(__('Upcoming Payment')); ?>

                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p data-caption="<?php echo e(__('Upcoming Payment')); ?>"
                                                            id="count_<?php echo e($loop->iteration); ?>" class="p-0 m-0 itemtext">
                                                            <?php if($transaction->next_payment_date == null): ?>
                                                                <?php echo e(__('Complete')); ?>

                                                            <?php endif; ?>
                                                        </p>
                                                        <script>
                                                            <?php if($transaction->next_payment_date != null): ?>
                                                                getCountDown("count_<?php echo e($loop->iteration); ?>",
                                                                    "<?php echo e(now()->gt($transaction->next_payment_date) ? 0 : now()->diffInSeconds($transaction->next_payment_date)); ?>"
                                                                )
                                                            <?php endif; ?>
                                                        </script>
                                                    </td>
                                                </tr>
                                            </table>


                                          
                                            <?php if($transactions->hasPages()): ?>
                        <?php echo e($transactions->links()); ?>

                    <?php endif; ?>
                                        </div><!--End Table-->
                                    </div><!--End InvoiceBot-->
                                </div><!--End Invoice-->
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <h4>NO INVESTMENT FOUND</h4>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make(template() . 'layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\quantum-trade\resources\views/theme4/user/invest_log.blade.php ENDPATH**/ ?>