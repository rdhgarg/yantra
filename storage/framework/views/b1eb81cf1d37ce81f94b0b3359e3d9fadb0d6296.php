<?php $__env->startSection('title'); ?>
<title>Create Product</title>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('inlinecss'); ?>
<link type="text/css" rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/themes/ui-lightness/jquery-ui.css" />
<link href="<?php echo e(asset('admin/assets/multiselectbox/css/ui.multiselect.css')); ?>" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrum'); ?>
<h1 class="page-title">Create Product</h1>
<ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="#">Product</a></li>
    <li class="breadcrumb-item active" aria-current="page">Create</li>
</ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="app-content">
    <div class="side-app">

        <!-- PAGE-HEADER -->
        <?php echo $__env->make('admin.layouts.pagehead', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <!-- PAGE-HEADER END -->

        <!--  Start Content -->
    <form id="submitForm" class="row"  method="post" action="<?php echo e(route('product-save')); ?>" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <!-- COL END -->
							<div class="col-lg-12">
								<div class="card">
									<div class="card-header">
										<h3 class="card-title">Product Forms</h3>
									</div>
									<div class="card-body">
                                        <div class="row">
                                            <div class="form-group col-12">
                                                <label class="form-label">Name *</label>
                                                <input onblur="convertToSlug(this)" type="text" class="form-control" name="name" id="name" placeholder="Title..">
                                            </div>
                                            <div class="form-group col-12">
                                                <label class="form-label">Slug *</label>
                                                <input type="text" readonly="readonly" class="form-control" name="slug" id="slug" placeholder="Slug..">
                                            </div>
                                            <div class="form-group col-6">
                                                <label class="form-label">Category *</label>
                                                <select required="required" onchange="getName('category_id','category_name');getSubCategory(this,'get-subcategory','sub_category_id')" name="category_id" id="category_id" class="form-control">
                                                    <option value="">Select</option>
                                                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($val->id); ?>"><?php echo e($val->title); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>

                                            <div class="form-group col-6">
                                                <label class="form-label">Sub Category </label>
                                                <select name="sub_category_id" onchange="getName('sub_category_id','sub_category_name')" id="sub_category_id" class="form-control">
                                                    <option value="">Select</option>
                                                </select>
                                            </div>

                                            <div class="form-group col-12">
                                                <label  for="value"><b>Short Description</b></label>
                                                    <textarea maxlength="70" class="form-control" name="short_desc" id="short_desc"></textarea>
                                            </div>

                                            <div class="form-group col-12">
                                                <label  for="value"><b>Description</b></label>
                                                    <textarea class="Description" name="description" id="description"></textarea>
                                            </div>

                                            <div class=" col-lg-3 col-12">
                                                <label  for="value"><b>Product Weight</b></label>
                                                <input  name="product_weight" id="product_weight" type="text" oninput="this.value = this.value.replace(/[^A-Z a-z 0-9]/g, '').replace(/(\..*)\./g, '$1');" class="form-control" placeholder="">
                                            </div>

                                            <div class="col-lg-3 col-12">
                                                <label  for="value"><b>Mrp Price </b></label>
                                                <input  name="product_mrp_price" id="product_mrp_price"  type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="12" class="form-control" placeholder="">
                                            </div>

                                            <div class="col-lg-3 col-12">
                                                <label  for="value"><b>Selling Price </b></label>
                                                <input  name="product_sell_price" id="product_sell_price" type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="12" class="form-control"  placeholder="">
                                            </div>

                                            <div class=" col-lg-3 col-12">
                                                <label  for="value"><b>Product  Qty</b></label>
                                                <input  name="product_total_qty" id="product_total_qty" type="number" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*)\./g, '$1');" maxlength="12" class="form-control"  placeholder="">
                                            </div>
                                            
                                        <div class=" col-lg-3 col-12">
                                            
                                            <br>
                                                <label for="value"><b>Group_product :</b></label>
                                                <input type='checkbox' name='is_group' id='is_group' value='1' >
                                        </div>
                                        
                                        <div class='col-lg-3 sellingroup' style='display:none'>
                                            <label><b>Minimum Quantity:</b></label>
                                            <input type='text' id='min_price' name='min_price' class='form-control'>
                                        </div>
                                        
                                        <div class='col-lg-3 sellingroup' style='display:none'>
                                            <label><b>Price</b></label>
                                            <input type='text' name='min_quantity' id='min_quantity' class='form-control'>
                                        </div>

                                            <div class="form-group col-12">
                                                <div class="row">
                                                    <div class='col-md-1'>
                                                        <label style="margin-top: 12px;"><b>Main <br> Image:</b></label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <input id="image" accept='image/*' type="file" class="form-control align-middle custom-file-input" name="main_image" onchange="readURL(this, 'FileImg');">
                                                        <label class="text-dark mt-4 ml-2 custom-file-label" for="image">Choose file</label>
                                                    </div>
                                                    <div class="col-md-1 ">
                                                        <img id="FileImg" src="<?php echo e(url('/public/notfound.png')); ?>" style="width: 100px;height: 100px">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group col-12"  id="productText">
                                                <div class="row">
                                                    <div class="col-lg-1 col-12  d-flex align-items-center ">
                                                    <label><b>Side <br> Images:</b></label>
                                                    </div>
                                                    <div class="col-lg-10 col-12  d-flex align-items-center ">

                                                        <input type='file' accept='image/*' name='side_image[]' class='form-control'>
                                                    </div>
                                                    <div class="col-lg-1 col-12  d-flex align-items-center ">
                                                        <button onclick="addMoreProductVariations()" type="button" class="btn btn-success mt-2"><i class="fa fa-plus"></i></button>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="card-footer"></div>
                                            <div class="form-group col-12"  id="productText">
                                                <button type="submit" id="submitButton" class="btn btn-primary float-right"  data-loading-text="<i class='fa fa-spinner fa-spin '></i> Sending..." data-rest-text="Create">Create</button>
                                            </div>

                                        </div>
									</div>
								</div>
                                <input type="hidden" name="sub_category_name" id="sub_category_name" />
                                <input type="hidden" name="category_name" id="category_name" />
							</form>
        </div><!-- COL END -->
        <!--  End Content -->

    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('inlinejs'); ?>
<script type="text/javascript">
        var cnt=0;

            function addMoreProductVariations(){
                cnt++;
                html='';
                html+='<div class="row pb-2 pt-2">';

                html+='<div class="col-lg-1 col-12 d-flex align-items-center ">';
                html+='<label><b>Side image:</b></label>';
                html+='</div>';

                html+='<div class="col-lg-10 col-12 d-flex align-items-center ">';
                html+='<input type="file" accept="image/*" name="side_image[]" class="form-control">';
                html+='</div>';

                html+='<div class="col-lg-1 col-12 d-flex align-items-center ">';
                html+='<button type="button" class=" removethis btn btn-danger mt-2"><i class="fa fa-trash"></i></button>';
                html+='</div>';

                html+='</div>';

                $("#productText").append(html);
            }

            $(document).on('click','.removethis',function(){
                $(this).parent().parent().remove();
            });

            function RemoveMoreProductVariations(id){$("#ROW-"+id).remove();}
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#icon_image_select').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $('.js-example-basic-multiple').select2();
            $('.Description').summernote({ height:250 });

        $(function () {
           $('#submitForm').submit(function(){

            var $this = $('#submitButton');
            buttonLoading('loading', $this);
            $('.is-invalid').removeClass('is-invalid state-invalid');
            $('.invalid-feedback').remove();

            $.ajax({
                url: $('#submitForm').attr('action'),
                type: "POST",
                processData: false,  // Important!
                contentType: false,
                cache: false,
                data: new FormData($('#submitForm')[0]),
                success: function(data) {
                    if(data.status){
						var btn = '<a href="<?php echo e(route('product-list')); ?>" class="btn btn-info btn-sm">GoTo List</a>';
                        successMsg('Create product', data.msg, btn);
                        //$('#submitForm')[0].reset();
                    }else{
                        $.each(data.errors, function(fieldName, field){
                            $.each(field, function(index, msg){
                                $('#'+fieldName).addClass('is-invalid state-invalid');
                               errorDiv = $('#'+fieldName).parent('div');
                               errorDiv.append('<div class="invalid-feedback">'+msg+'</div>');
                            });
                        });
                        errorMsg('Create product','Input error');
                    }
                    buttonLoading('reset', $this);
                },
                error: function() {
                    errorMsg('Create product', 'There has been an error, please alert us immediately');
                    buttonLoading('reset', $this);
                }

            });
            return false;

           });

           });
            
            $(document).on('click','#is_group',function(){
                var this_div=$(this);
                var is_check=this_div.prop('checked');
                if(is_check){
                    $('#min_quantity').attr('required','required');
                    $('#min_price').attr('required','required');
                    $('.sellingroup').show();                    
                }else{
                    $('#min_quantity').removeAttr('required');
                    $('#min_price').removeAttr('required');
                    $('.sellingroup').hide();
                }

            });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin/layouts/default', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/androidhiker/public_html/stichspares/resources/views/admin/product/product-create.blade.php ENDPATH**/ ?>