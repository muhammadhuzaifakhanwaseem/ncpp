<?php $__env->startSection('content'); ?>

<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1><?php echo e(__($pageTitle)); ?></h1>
      </div>

    <div class="row">

        <div class="col-12 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="" method="post" enctype="multipart/form-data">

                        <?php echo csrf_field(); ?>

                        <div class="row">

                            <div class="form-group col-md-3">
                                <label class="col-form-label"><?php echo e(__('Bank Image')); ?></label>

                                <div id="image-preview" class="image-preview"
                                    style="background-image:url(<?php echo e(getFile('gateways' , @$gateway->gateway_image)); ?>);">
                                    <label for="image-upload" id="image-label"><?php echo e(__('Choose File')); ?></label>
                                    <input type="file" name="bank_image" id="image-upload" />
                                </div>

                            </div>

                            <div class="col-md-9">

                                <div class="row">

                                    <div class="form-group col-md-6">

                                        <label for=""><?php echo e(__('Bank Name')); ?></label>
                                        <input type="text" name="name"  class="form-control"
                                            value="<?php echo e(@$gateway->gateway_parameters->name); ?>">

                                    </div>

                                    <div class="form-group col-md-6">

                                        <label for=""><?php echo e(__('Bank Account Number')); ?></label>
                                        <input type="text" name="account_number"
                                            class="form-control"
                                            value="<?php echo e(@$gateway->gateway_parameters->account_number); ?>">

                                    </div>



                                    <div class="form-group col-md-6">

                                        <label for=""><?php echo e(__('Bank Routing Number')); ?></label>
                                        <input type="text" name="routing_number" 
                                            class="form-control"
                                            value="<?php echo e(@$gateway->gateway_parameters->routing_number); ?>">

                                    </div>

                                    <div class="form-group col-md-6">

                                        <label for=""><?php echo e(__('Bank Branch Name')); ?></label>
                                        <input type="text" name="branch_name" 
                                            class="form-control" value="<?php echo e(@$gateway->gateway_parameters->branch_name); ?>">

                                    </div>

                                    <div class="form-group col-md-6">

                                        <label for=""><?php echo e(__('Gateway Currency')); ?></label>
                                        <input type="text" name="gateway_currency" class="form-control site-currency"
                                            
                                            value="<?php echo e(@$gateway->gateway_parameters->gateway_currency ?? ''); ?>">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label><?php echo e(__('Conversion Rate')); ?></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <?php echo e("1 ".@$general->site_currency.' = '); ?>

                                                </div>
                                            </div>
                                            <input type="text" class="form-control currency" name="rate"  value="<?php echo e(number_format(@$gateway->rate,4) ?? 0); ?>">

                                            <div class="input-group-append">
                                                <div class="input-group-text append_currency">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
                                    
                                    <div class="form-group col-md-6">
                                        <label><?php echo e(__('Charge')); ?></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <?php echo e(@$general->site_currency); ?>

                                                </div>
                                            </div>
                                            <input type="text" class="form-control currency" name="charge"  value="<?php echo e(number_format(@$gateway->charge,4) ?? 0); ?>">

                                            
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6">

                                        <label for=""><?php echo e(__('Allow as payment method')); ?></label>

                                        <select name="status" id="" class="form-control selectric">

                                            <option value="1" <?php echo e(@$gateway->status ? 'selected' : ''); ?>><?php echo e(__('Yes')); ?>

                                            </option>
                                            <option value="0" <?php echo e(@$gateway->status ? '' : 'selected'); ?>><?php echo e(__('No')); ?>

                                            </option>


                                        </select>

                                    </div>
                                </div>

                            </div>

                            <div class="col-md-12">
                                <div class="card">

                                    <div class="card-header bg-primary">

                                        <h6 class="text-white"><?php echo e(__('User Proof Requirements')); ?></h6>

                                        <button type="button" class="btn btn-success ml-auto payment"> <i
                                                class="fa fa-plus text-white"></i>
                                            <?php echo e(__('Add Payment Requirements')); ?></button>

                                    </div>

                                    <div class="card-body">

                                        <div class="row payment-instruction">

                                            <div class="col-md-12 user-data">
                                                <div class="row">


                                                    <?php if(@$gateway->user_proof_param != null): ?>


                                                        <?php $__currentLoopData = $gateway->user_proof_param; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $param): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
                                                            <div class="col-md-12 user-data">
                                                                <div class="form-group">
                                                                    <div class="input-group mb-md-0 mb-4">
                                                                        <div class="col-md-4">
                                                                            <label><?php echo e(__('Field Name')); ?></label>
                                                                            <input
                                                                                name="user_proof_param[<?php echo e($key); ?>][field_name]"
                                                                                class="form-control form_control"
                                                                                type="text"
                                                                                value="<?php echo e($param['field_name']); ?>"
                                                                                required >
                                                                        </div>
                                                                        <div class="col-md-3 mt-md-0 mt-2">
                                                                            <label><?php echo e(__('Field Type')); ?></label>
                                                                            <select
                                                                                name="user_proof_param[<?php echo e($key); ?>][type]"
                                                                                class="form-control selectric">
                                                                                <option value="text"
                                                                                    <?php echo e($param['type'] == 'text' ? 'selected' : ''); ?>>
                                                                                    <?php echo e(__('Input Text')); ?>

                                                                                </option>
                                                                                <option value="textarea"
                                                                                    <?php echo e($param['type'] == 'textarea' ? 'selected' : ''); ?>>
                                                                                    <?php echo e(__('Textarea')); ?>

                                                                                </option>
                                                                                <option value="file"
                                                                                    <?php echo e($param['type'] == 'file' ? 'selected' : ''); ?>>
                                                                                    <?php echo e(__('File upload')); ?>

                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                        <div class="col-md-3 mt-md-0 mt-2">
                                                                            <label><?php echo e(__('Field Validation')); ?></label>
                                                                            <select
                                                                                name="user_proof_param[<?php echo e($key); ?>][validation]"
                                                                                class="form-control selectric">
                                                                                <option value="required"
                                                                                    <?php echo e($param['validation'] == 'required' ? 'selected' : ''); ?>>
                                                                                    <?php echo e(__('Required')); ?>

                                                                                </option>
                                                                                <option value="nullable"
                                                                                    <?php echo e($param['validation'] == 'nullable' ? 'selected' : ''); ?>>
                                                                                    <?php echo e(__('Optional')); ?>

                                                                                </option>
                                                                            </select>
                                                                        </div>
                                                                        <div
                                                                            class="col-md-2 text-right my-auto ">

                                                                            <button
                                                                                class="btn btn-danger btn-lg remove w-100 mt-4"
                                                                                type="button">
                                                                                <i class="fa fa-times"></i>
                                                                            </button>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                                    <?php endif; ?>
                                                </div>

                                            </div>


                                        </div>

                                    </div>

                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary w-100">
                                <?php echo e(__('Update Bank Information')); ?></button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>


    </div>
    </section>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>



    <script>
        $(function() {
            'use strict'

            var i = <?php echo e(count($gateway->user_proof_param ?? [])); ?>;

            $('.payment').on('click', function() {

                var html = `
                <div class="col-md-12 user-data">
                    <div class="form-group">
                        <div class="input-group mb-md-0 mb-4">
                            <div class="col-md-4">
                                <label><?php echo e(__('Field Name')); ?></label>
                                <input name="user_proof_param[${i}][field_name]" class="form-control form_control" type="text" value="" required >
                            </div>
                            <div class="col-md-3 mt-md-0 mt-2">
                                <label><?php echo e(__('Field Type')); ?></label>
                                <select name="user_proof_param[${i}][type]" class="form-control selectric">
                                    <option value="text" > <?php echo e(__('Input Text')); ?> </option>
                                    <option value="textarea" > <?php echo e(__('Textarea')); ?> </option>
                                    <option value="file"> <?php echo e(__('File upload')); ?> </option>
                                </select>
                            </div>
                            <div class="col-md-3 mt-md-0 mt-2">
                                <label><?php echo e(__('Field Validation')); ?></label>
                                <select name="user_proof_param[${i}][validation]"
                                        class="form-control selectric">
                                    <option value="required"> <?php echo e(__('Required')); ?> </option>
                                    <option value="nullable">  <?php echo e(__('Optional')); ?> </option>
                                </select>
                            </div>
                            <div class="col-md-2 text-right my-auto">
                              
                                    <button class="btn btn-danger btn-lg remove w-100 mt-4" type="button">
                                        <i class="fa fa-times"></i>
                                    </button>
                                
                            </div>
                        </div>
                    </div>
                </div>`;
                $('.payment-instruction').append(html);

                i++;

            })

            $(document).on('click', '.remove', function() {
                $(this).closest('.user-data').remove();
            });

            $.uploadPreview({
                input_field: "#image-upload", // Default: .image-upload
                preview_box: "#image-preview", // Default: .image-preview
                label_field: "#image-label", // Default: .image-label
                label_default: "<?php echo e(__('Choose File')); ?>", // Default: Choose File
                label_selected: "<?php echo e(__('Update Image')); ?>", // Default: Change File
                no_label: false, // Default: false
                success_callback: null // Default: null
            });

             $('.site-currency').on('keyup',function(){
            $('.append_currency').text($(this).val())
        })

        $('.append_currency').text($('.site-currency').val())
        })
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ncp\resources\views/backend/gateways/bank.blade.php ENDPATH**/ ?>