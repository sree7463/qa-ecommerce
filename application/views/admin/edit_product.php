<?php $this->load->view('admin/includes/header'); ?>
  <!-- Page Wrapper -->
  <div id="wrapper">
<?php $this->load->view('admin/includes/sidebar'); ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
<?php $this->load->view('admin/includes/navigation'); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/product_list">Product</a></li>
              <li class="breadcrumb-item">Edit</li>
            </ol>
          </nav>

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit product:</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <div class="row">
            <div class="col-md-12">
              <?php
                if (isset($message)) {
                  echo $message;
                }
              ?>
              <form action="<?php echo base_url(); ?>admin/admin/edit_product/<?php echo $product->product_id; ?>" name="add_product_form" method="POST" enctype="multipart/form-data">
                <div class="row">
                  <div class="col-6">
                    <div class="form-group">
                      <label for="product_name" class="req">Product name:</label>
                      <input type="text" class="form-control" name="product_name" id="product_name" value="<?php echo $product->product_name; ?>">
                    </div>
                    <div class="form-group">
                      <label for="product_slug" class="req">Product slug:</label>
                      <input type="text" class="form-control qaisar-slug" name="product_slug" id="product_slug" value="<?php echo $product->product_slug; ?>">
                    </div>
                    <div class="form-group">
                      <label for="product_meta_title" class="req">Product meta title:</label>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control tcount" name="product_meta_title" id="product_meta_title" value="<?php echo $product->product_meta_title; ?>">
                        <div class="input-group-append">
                          <span class="input-group-text"><?php echo strlen($product->product_meta_title); ?></span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="product_meta_description" class="req">Product meta description:</label>
                      <div class="input-group mb-3">
                        <textarea type="text" name="product_meta_description" class="form-control tcount" id="product_meta_description" data-count="text"><?php echo $product->product_meta_description; ?></textarea>
                        <div class="input-group-append">
                          <span class="input-group-text">0</span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="product_meta_keywords" class="req">Product meta keywords:</label>
                      <div class="input-group mb-3">
                        <input type="text" class="form-control wcount" name="product_meta_keywords" id="product_meta_keywords" value="<?php echo $product->product_meta_keywords; ?>">
                        <div class="input-group-append">
                          <span class="input-group-text"><?php echo count(explode(',', $product->product_meta_keywords)); ?></span>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Product Tag</label>
                        <select name="product_tag" class="form-control">
                          <!-- <option value="">Select Tag</option> -->
                          <option value="">No Tag</option>
                          <option value="New" 
                          <?php if($product->product_tag == 'New') echo "selected"; ?> >New</option>
                          <option value="Hot" 
                          <?php if($product->product_tag == 'Hot') echo "selected"; ?> >Hot</option>
                          <option value="Sale" 
                          <?php if($product->product_tag == 'Sale') echo "selected"; ?> >Sale</option>
                          <option value="Deal" 
                          <?php if($product->product_tag == 'Deal') echo "selected"; ?> >Deal</option>
                          <option value="Special" 
                          <?php if ($product->product_tag == 'Special') echo "selected"; ?> >Special</option>
                          <option value="Premium" 
                          <?php if($product->product_tag == 'Premium') echo "selected"; ?> >Premium</option>
                          <option value="Featured" 
                          <?php if($product->product_tag == 'Featured') echo "selected"; ?> >Featured</option>
                          <option value="Used" 
                          <?php if($product->product_tag == 'Used') echo "selected"; ?> >Used</option>
                        </select>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="product_new_price" class="req">Product new price:</label>
                          <input type="number" class="form-control" name="product_new_price" id="product_new_price" value="<?php echo $product->product_new_price; ?>">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="product_old_price">Product old price:</label>
                          <input type="number" class="form-control" name="product_old_price" id="product_old_price" value="<?php echo $product->product_old_price; ?>">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="product_category" class="req">Product category:</label>
                      <div class="row">
                        <?php foreach($categories as $category): ?>
                        <div class="col-3">
                          <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="category_<?php echo $category->id; ?>" name="category[]" value="<?php echo $category->id; ?>" <?php
                              if (in_array($category->id, explode(',', $product->product_category))) echo "checked='checked'"
                             ?>>
                            <label class="custom-control-label" for="category_<?php echo $category->id; ?>"><?php echo $category->category_name; ?></label>
                          </div>
                        </div>
                        <?php endforeach; ?>
                      </div>
                    </div>
                    <!-- <div class="form-group">
                      <label for="product_meta_tags">Product tag:</label>
                      <input type="text" class="form-control" name="product_meta_tags" data-role="tagsinput" id="product_meta_tags" value="<?php if (isset($product_meta_tags)) echo $product_meta_tags; ?>">
                    </div> -->
                    <!-- <div class="form-group">
                      <label for="product_price">Product price:</label>
                      <input type="number" class="form-control" name="product_price" id="product_price" value="<?php if (isset($product_price)) echo $product_price; ?>">
                    </div> -->
                    
                    <div class="form-group">
                      <label for="publish_post">Publish product:</label>
                        <label class="switch">
                          <input type="checkbox" name="publish"  <?php if ($product->publish == 1) echo "checked"; ?> >
                          <span class="slider round"></span>
                        </label>
                    </div>

                    <div class="form-group">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="display_on_homepage" name="display_on_homepage" <?php if ($product->display_on_homepage == 1) echo "checked"; ?> >
                        <label class="custom-control-label" for="display_on_homepage">Display on homepage</label>
                      </div>
                    </div>

                    <label>Upload Images</label>
                      <input type="file" name="product_images[]" id="file" class="inputfile" multiple="multiple" accept="image/x-png,image/gif,image/jpeg" />
                      <label for="file">Choose a file</label>
                  </div>   
                </div>
                <div class="row mb-4 mt-4">
                  <div class="col-lg-12">
                    <?php
                    $product_images = explode(',', $product->product_images);
                    if ($product_images[0] != ""):
                      foreach ($product_images as $image):
                    ?>
                    <div class="img-wrap">
                      <span class="close" data-image-id-name="<?php echo $product->product_id . ':' . $image; ?>">&times;</span>
                      <input type="hidden" name="product_old_images[]" value="<?php echo $image; ?>">
                      <img src="<?php echo base_url(); ?>Assets/images/products/thumbnails/<?php echo $image; ?>" width="150" title="<?php echo $product->product_name; ?>" alt="<?php echo $product->product_name; ?>">
                    </div>
                    <?php 
                      endforeach;
                    else:
                    ?>
                    <i>No image uploaded yet!</i>
                    <?php endif;?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <div class="form-group">
                      <label for="product_detail" class="req">Product detail:</label>
                      <textarea name="product_detail"  style="height:300px;" class="oneditor" id="#product_detail"><?php echo $product->product_detail; ?></textarea>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-6">
                    <input type="submit" class="btn btn-primary btn-sm" name="add_product" value="Submit">
                  </div>
                </div>

              </form>
            </div>
          </div>

<?php $this->load->view('admin/includes/footer'); ?>