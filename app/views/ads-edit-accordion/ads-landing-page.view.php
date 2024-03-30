<form   enctype='multipart/form-data' class="accordion-body">
    <div class="card">

        <?php  csrf()?>
        
        <div class="card-body">

            <!--form-->
                
            <div class="row g-3">
                <div class="col-md-12 py-2">
                    <label for="inputName5" class="form-label"><b>Product Name</b></label>
                    <input name="title" value="<?php echo esc($row->title) ?>" oninput="save_changes()" type="text" class="form-control" id="inputName5">
                </div>

                <div class="col-md-4">
                    <div class="py-2"><b >Select category</b></div>
                    <select oninput="save_changes()" name="category_id"  id="inputState" class="form-select">
                        <option value='' selected="">Choose category...</option>
                          <?php if(!empty($categories)): ?>
                            <?php foreach ($categories as $category): ?>
                                <option <?php echo set_select('category_id', $category->id, $row->category_id)?>   value="<?php echo esc($category->id) ?>"><?php echo esc($category->category) ?></option>
                            <?php endforeach ?>
                         <?php endif ?>
                    </select>
                </div>
                <!-- <div class="col-md-4">
                    <div class="py-2"><b >Select Sub category</b></div>
                    <select oninput="save_changes()" name="sub_category_idk" id="inputState" class="form-select">
                        <option value=''  selected="">Choose sub-category...</option>
                        <option value=''>...</option>
                    </select>
                  
                </div> -->

                <div class="col-md-4">

                    <div class="py-2"><b >Select Price</b></div>
                   <!--  <select oninput="save_changes()"  name="price_id" id="inputState" class="form-select">
                        <option value='' selected="">Select price</option>
                           <?php if(!empty($prices)): ?>
                            <?php foreach ($prices as $price): ?>
                                <option  <?php echo set_select('category_id', $price->id, $row->price_id)?> value="<?php echo esc($price->id) ?>">
                                <?php echo esc($price->name) ?></option>
                            <?php endforeach ?>
                         <?php endif ?>
                    </select> -->
                      <input name="price" value="<?php echo esc($row->price) ?>" oninput="save_changes()" type="text" class="form-control" id="inputState">
                </div>


                <div class="col-md-12 py-2">
                    <div class="row" style="position:relative">
                        <div class="col-md-4">
                            <div class="image-container" >
                                <img src="<?php echo get_image($row->ad_image1) ?>" alt="" class="img-fluid editing-image" style="object-fit:contain; height:200px; width:100%;">
                            </div>

                            <div class="pt-2 d-flex">
                                <div>
                                 <label class="btn btn-primary btn-sm" title="Upload new profile image">
                                    <i class="bi bi-upload"></i>
                                    <input oninput="save_changes()" class="js-progress-input" onchange="load_image(this.files[0])"
                                        style="display:none;" type="file" name="image">
                                 </label>
                                </div>
                                <div class="px-1">            
                                    <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i
                                        class="bi bi-trash"></i></a>
                                </div>
                                <div class="px-3 name image-name">name</div>
                                <div onclick="ads_image_cancel_upload()" class="btn btn-success btn-sm cancel hide">Cancel</div>
                            </div>

                            <div class=" progress my-3">
                                <div class="progress-container progress-bar" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                            </div>





                        </div>
                        <!-- <div class="col-md-4">
                            <div class="image-container">
                                <img src="<?php echo get_image($row->ad_image2) ?>"  class="img-fluid editing-image" style="object-fit:contain; height:200px; width:100%;">
                            </div>
                            <div class="pt-2">
                                <label class="btn btn-primary btn-sm" title="Upload new profile image">
                                    <i class="bi bi-upload"></i>
                                    <input oninput="save_changes()" class="js-progress-input" onchange="load_image(this.files[0])"
                                        style="display:none;" type="file" name="image">
                                </label>
                                <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i
                                        class="bi bi-trash"></i></a>
                            </div>


                        



                        </div>
                        <div class="col-md-4">
                            <div class="image-container">
                                <img src="<?php echo get_image($row->ad_image2) ?>" alt="" class="img-fluid editing-image3" style="object-fit:contain; height:200px; width:100%;">
                            </div>
                            <div class="pt-2">
                                <label class="btn btn-primary btn-sm" title="Upload new profile image">
                                    <i class="bi bi-upload"></i>
                                    <input oninput="save_changes()" class="js-progress-input" onchange="load_image(this.files[0])"
                                        style="display:none;" type="file" name="image">
                                </label>
                                <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i
                                        class="bi bi-trash"></i></a>
                            </div>
                        </div> -->
                        <div class="spinner-border  text-warning" role="status" style="position:absolute; right:3rem; top:calc(100% - 70%);">
                            <span class="visually-hidden">Loading...</span>
                         </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <h4><b>Product description</b> </h4>
                    <div class="form-floating">
                        <textarea value="<?php echo esc($row->description) ?? '' ?>"  oninput="save_changes()" name="description" class="form-control" placeholder="Address"
                            id="floatingTextarea" style="height: 100px;"><?php echo set_value('description', esc($row->description)) ?></textarea>
                        <label for="floatingTextarea">product description</label>
                    </div>
                </div>


                  <div class="col-md-12">
                    <h4><b>Product Features</b> </h4>
                    <div class="form-floating">
                        <textarea value="<?php echo esc($row->features) ?? '' ?>"  oninput="save_changes()" name="features" class="form-control" placeholder="Address"
                            id="floatingTextarea" style="height: 100px;"><?php echo set_value('description', esc($row->features)) ?></textarea>
                        <label for="floatingTextarea">product description</label>
                    </div>
                </div>
            </div><!-- End No Labels Form -->
        </div>
    </div>
</form>