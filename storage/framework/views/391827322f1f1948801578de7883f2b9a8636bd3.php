

<?php $__env->startSection('content'); ?>
<style>
    .invest-heading{

    }
</style>
    <link rel="stylesheet"
        href="<?php echo e(asset('asset/admin/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.css')); ?>" />
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Set Deposit Commission</h1>
            </div>


            <div class="row">
                <div class="col-md-12 stretch-card">
                    <div class="card">
                        <div class="card-body">

                            <form action="<?php echo e(route('admin.set.dep.com.post')); ?>" method="post" enctype="multipart/form-data">

                                <?php echo csrf_field(); ?>

                                <div class="row">

                                    
                                    <div class="col-md-4">
                                        <label class="mt-3"><?php echo e(__('Level 1 Deposit Commission')); ?></label>
                                        <div class="input-group">
                                            <input type="number" name="dc_lvl_one" placeholder=""
                                               value="<?php echo e($general->dc_lvl_one); ?>" class="form-control form_control">
                                                <div class="input-group-append">
                                                <span class="input-group-text"
                                                    id="basic-addon2"><?php echo e(__('%')); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="mt-3"><?php echo e(__('Level 2 Deposit Commission')); ?></label>
                                        <div class="input-group">
                                            <input type="number" name="dc_lvl_two" placeholder=""
                                               value="<?php echo e($general->dc_lvl_two); ?>" class="form-control form_control">
                                                <div class="input-group-append">
                                                <span class="input-group-text"
                                                    id="basic-addon2"><?php echo e(__('%')); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="mt-3"><?php echo e(__('Level 3 Deposit Commission')); ?></label>
                                        <div class="input-group">
                                            <input type="number" name="dc_lvl_three" placeholder=""
                                               value="<?php echo e($general->dc_lvl_three); ?>" class="form-control form_control">
                                                <div class="input-group-append">
                                                <span class="input-group-text"
                                                    id="basic-addon2"><?php echo e(__('%')); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="mt-3"><?php echo e(__('Level 4 Deposit Commission')); ?></label>
                                        <div class="input-group">
                                            <input type="number" name="dc_lvl_four" placeholder=""
                                               value="<?php echo e($general->dc_lvl_four); ?>" class="form-control form_control">
                                                <div class="input-group-append">
                                                <span class="input-group-text"
                                                    id="basic-addon2"><?php echo e(__('%')); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label class="mt-3"><?php echo e(__('Level 5 Deposit Commission')); ?></label>
                                        <div class="input-group">
                                            <input type="number" name="dc_lvl_five" placeholder=""
                                               value="<?php echo e($general->dc_lvl_five); ?>" class="form-control form_control">
                                                <div class="input-group-append">
                                                <span class="input-group-text"
                                                    id="basic-addon2"><?php echo e(__('%')); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                    
                                     <div class="row">
                                        <div class="col-md-12">

                                            <h3 class="invest-heading mt-5 mb-3">Set Invest Commission</h3>
                                        </div>

                                        <div class="col-md-4">
                                            <label class="mt-3"><?php echo e(__('Level 1 Invest Commission')); ?></label>
                                            <div class="input-group">
                                                <input type="number" name="ic_lvl_one" placeholder=""
                                                   value="<?php echo e($general->ic_lvl_one); ?>" class="form-control form_control">
                                                    <div class="input-group-append">
                                                    <span class="input-group-text"
                                                        id="basic-addon2"><?php echo e(__('%')); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="mt-3"><?php echo e(__('Level 2 Invest Commission')); ?></label>
                                            <div class="input-group">
                                                <input type="number" name="ic_lvl_two" placeholder=""
                                                   value="<?php echo e($general->ic_lvl_two); ?>" class="form-control form_control">
                                                    <div class="input-group-append">
                                                    <span class="input-group-text"
                                                        id="basic-addon2"><?php echo e(__('%')); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="mt-3"><?php echo e(__('Level 3 Invest Commission')); ?></label>
                                            <div class="input-group">
                                                <input type="number" name="ic_lvl_three" placeholder=""
                                                   value="<?php echo e($general->ic_lvl_three); ?>" class="form-control form_control">
                                                    <div class="input-group-append">
                                                    <span class="input-group-text"
                                                        id="basic-addon2"><?php echo e(__('%')); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="mt-3"><?php echo e(__('Level 4 Invest Commission')); ?></label>
                                            <div class="input-group">
                                                <input type="number" name="ic_lvl_four" placeholder=""
                                                   value="<?php echo e($general->ic_lvl_four); ?>" class="form-control form_control">
                                                    <div class="input-group-append">
                                                    <span class="input-group-text"
                                                        id="basic-addon2"><?php echo e(__('%')); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="mt-3"><?php echo e(__('Level 5 Invest Commission')); ?></label>
                                            <div class="input-group">
                                                <input type="number" name="ic_lvl_five" placeholder=""
                                                   value="<?php echo e($general->ic_lvl_five); ?>" class="form-control form_control">
                                                    <div class="input-group-append">
                                                    <span class="input-group-text"
                                                        id="basic-addon2"><?php echo e(__('%')); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                     </div>
                                   </div>
                           
                                    <div class="form-group col-md-12">

                                        <button type="submit"
                                            class="btn btn-primary mt-5 "><?php echo e(__('Update General Setting')); ?></button>

                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>




<?php $__env->startPush('style'); ?>
    <style>
        .sp-replacer {
            padding: 0;
            border: 1px solid rgba(0, 0, 0, .125);
            border-radius: 5px 0 0 5px;
            border-right: none;
        }

        select.form-control:not([size]):not([multiple]) {
            height: calc(2.25rem + 9px);
        }

        .sp-preview {
            width: 100px;
            height: 46px;
            border: 0;
        }

        .sp-preview-inner {
            width: 110px;
        }

        .sp-dd {
            display: none;
        }

        .select2-container .select2-selection--single {
            height: 44px;
        }

        .select2-container--default .select2-selection--single .select2-selection__rendered {
            line-height: 43px;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 43px;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startPush('script'); ?>
    <script src="<?php echo e(asset('asset/admin/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js')); ?>"></script>
    <script>
        $(function() {

            'use strict'

            $('#cp1').colorpicker();
            $('#cp2').colorpicker();

            $.uploadPreview({
                input_field: "#image-upload",
                preview_box: "#image-preview",
                label_field: "#image-label",
                label_default: "Choose File",
                label_selected: "Update Image",
                no_label: false,
                success_callback: null
            });

            $.uploadPreview({
                input_field: "#image-upload-icon",
                preview_box: "#image-preview-icon",
                label_field: "#image-label-icon",
                label_default: "Choose File",
                label_selected: "Update Image",
                no_label: false,
                success_callback: null
            });

            $.uploadPreview({
                input_field: "#image-upload-login",
                preview_box: "#image-preview-login",
                label_field: "#image-label-login",
                label_default: "Choose File",
                label_selected: "Update Image",
                no_label: false,
                success_callback: null
            });

            $.uploadPreview({
                input_field: "#image-upload-login_image",
                preview_box: "#image-preview-login_image",
                label_field: "#image-label-login_image",
                label_default: "Choose File",
                label_selected: "Update Image",
                no_label: false,
                success_callback: null
            });

            $.uploadPreview({
                input_field: "#image-upload-breadcrumbs",
                preview_box: "#image-preview-breadcrumbs",
                label_field: "#image-label-breadcrumbs",
                label_default: "Choose File",
                label_selected: "Update Image",
                no_label: false,
                success_callback: null
            });

            $.uploadPreview({
                input_field: "#image-upload-main",
                preview_box: "#image-preview-main",
                label_field: "#image-label-main",
                label_default: "Choose File",
                label_selected: "Update Image",
                no_label: false,
                success_callback: null
            });

            $.uploadPreview({
                input_field: "#image-upload-whitelogo",
                preview_box: "#image-preview-whitelogo",
                label_field: "#image-label-whitelogo",
                label_default: "Choose File",
                label_selected: "Update Image",
                no_label: false,
                success_callback: null
            });
        })
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ncpp\resources\views/backend/setting/dep_commision.blade.php ENDPATH**/ ?>