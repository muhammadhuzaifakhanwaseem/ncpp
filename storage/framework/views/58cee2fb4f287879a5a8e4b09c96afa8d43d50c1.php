<?php $__env->startSection('content2'); ?>
    <div class="container-fluid">
        <div class="row align-items-center page-title">
            <div class="nk-block-head-content w-100">
                <form action="" method="post">
                    <?php echo csrf_field(); ?>
                    <div class="card-header px-0">
                        <h5 class="mb-3 mt-5 text-white">
                            <?php echo e(__('Current Balance: ')); ?> <span
                                class="color-change"><?php echo e(number_format(auth()->user()->balance, 2) . ' ' . $general->site_currency); ?></span>
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-0">
                            <label for=""><?php echo e(__('Withdraw Method')); ?></label>
                            <select name="method" id=""
                                class="select form-select rounded-0 bg-transparent text-white border border-light">
                                <option class="text-black" value="" selected><?php echo e(__('Select Method')); ?></option>
                                <?php $__currentLoopData = $withdraws; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $withdraw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option class="text-black" value="<?php echo e($withdraw->id); ?>"
                                        data-url="<?php echo e(route('user.withdraw.fetch', $withdraw->id)); ?>">
                                        <?php echo e($withdraw->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        <div class="row appendData p-3"></div>
                    </div>
                </form>
                <div class="col-xxl-4 col-lg-6 withdraw-ins">
                    <div class="site-card">
                        <div class="card-body">
                            <p class="instruction"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $(function() {
            'use strict'

            $('select[name=method]').on('change', function() {
                if ($(this).val() == '') {
                    $('.appendData').addClass('d-none');
                    $('.instruction').text('');
                    return;
                }
                $('.appendData').removeClass('d-none');
                getData($('select[name=method] option:selected').data('url'))
            })

            $(document).on('keyup', '.amount', function() {
                const withdraw_charge_type = $('.withdraw_charge_type').text();

                if ($(this).val() == '') {
                    $('.final_amo').val(0);
                    return
                }

                const charge = $('.charge').val();

                if (withdraw_charge_type.localeCompare("percent") == 1) {
                    let percentAmount = Number.parseFloat($(this).val()) + Number.parseFloat((charge * $(
                        this).val()) / 100);

                    $('.final_amo').val(percentAmount.toFixed(2));
                    return
                }
                if (withdraw_charge_type.localeCompare("fixed") == 1) {

                    let totalAmount = Number.parseFloat($(this).val()) + Number.parseFloat(charge);

                    $('.final_amo').val(totalAmount).toFixed(2);
                }
            })

            function getData(url) {
                $.ajax({
                    url: url,
                    method: "GET",
                    success: function(response) {

                        $('.instruction').html(response.withdraw_instruction)
                        let html = `

                                <div class="col-md-12 p-0 mb-3 mt-3">
                                    <h5 class="mb-3 text-white"><?php echo e(__('Withdraw Instruction')); ?></h5>
                                    <label for=""><?php echo e(__('Withdraw Amount')); ?> <span class="sp_text_danger">*</span></label>
                                    <input type="text" name="amount" class="form-control amount rounded-0 bg-transparent text-white border border-light" required>
                                    <p class="text-small color-change mb-0 mt-1 text-white"><span><?php echo e(__('Min Amount & ')); ?>  ${Number.parseFloat(response.min_amount).toFixed(2)}</span>
                                     <span><?php echo e(__('Max Amount')); ?> ${Number.parseFloat(response.max_amount).toFixed(2)}</span></p>
                                </div>

                                <div class="col-md-12 p-0 mb-3">
                                    <label><?php echo e(__('Withdraw Charge')); ?></label>
                                    <div class="input-group">
                                        <input type="text" class="form-control charge rounded-0 bg-transparent text-white border border-light" value="${Number.parseFloat(response.charge).toFixed(2)}" required disabled>
                                        <div class="input-group-text rounded-0 bg-transparent border border-light">
                                            <span class="text-white withdraw_charge_type">${response.charge_type}<span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 p-0 mb-3">
                                    <label for=""><?php echo e(__('Final Withdraw Amount')); ?> <span class="sp_text_danger">*</span></label>
                                    <input type="text" name="final_amo" class="form-control final_amo rounded-0 bg-transparent text-white border border-light" required readonly>
                                </div>

                                <div class="col-md-12 p-0 mb-3">
<label for=""><?php echo e(__('Account Holder Name and Account Number')); ?></label>
                                   <textarea class="form-control rounded-0 bg-transparent text-white border border-light" name="account_information" row="5"></textarea>
                                </div>


                                <div class="p-0">
                                   <button class="btn rounded-0 w-100 mt-3 bg-green-main mb-2" type="submit"><?php echo e(__('Withdraw Now')); ?></button>
                                </div>
                   `;

                        $('.appendData').html(html);
                    }
                })
            }
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make(template() . 'layout.master2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ncp\resources\views/theme4/user/withdraw/index.blade.php ENDPATH**/ ?>