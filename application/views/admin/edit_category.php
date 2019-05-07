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
              <li class="breadcrumb-item"><a href="<?php echo base_url(); ?>admin/category_list">Category</a></li>
              <li class="breadcrumb-item">Edit</li>
            </ol>
          </nav>

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Edit category:</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <div class="row">
            <div class="col-md-3">
              <?php if (!empty($category)): ?>
              <?php echo (isset($message))? $message: false; ?>
                <form action="<?php echo base_url(); ?>admin/edit_category/<?php echo $category->id; ?>" name="add_category_form" method="POST">
                <div class="form-group">
                  <label for="category_name" class="req">Category name:</label>
                  <input type="text" class="form-control" name="category_name" id="category_name" value="<?php if (isset($category)) echo $category->category_name; ?>">
                </div>
                <div class="form-group">
                  <label for="category_slug" class="req">Category slug:</label>
                  <input type="text" class="form-control qaisar-slug" name="category_slug" id="category_slug" value="<?php if (isset($category)) echo $category->category_slug; ?>">
                </div>
                <div class="form-group">
                  <label for="category_meta_title" class="req">Category meta title:</label>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control tcount" name="category_meta_title" id="category_meta_title" value="<?php if (isset($category)) echo $category->category_meta_title; ?>">
                    <div class="input-group-append">
                      <span class="input-group-text"><?php echo strlen($category->category_meta_title); ?></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="category_meta_description" class="req">Category meta description:</label>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control tcount" name="category_meta_description" id="category_meta_description" value="<?php if (isset($category->category_meta_description)) echo $category->category_meta_description; ?>">
                    <div class="input-group-append">
                      <span class="input-group-text"><?php echo strlen($category->category_meta_description); ?></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="category_meta_tags" class="req">Category meta keywords:</label>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control wcount" name="category_meta_tags" id="category_meta_tags"  value="<?php if (isset($category->category_meta_tags)) echo $category->category_meta_tags; ?>">
                    <div class="input-group-append">
                      <span class="input-group-text"><?php echo count(explode(',', $category->category_meta_tags)); ?></span>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-primary btn-sm" name="add_category" value="Submit">
                </div>
              </form>
              <?php else: ?>
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>Error!</strong> No category found with this id!
                </div>
              <?php endif; ?>
            </div>
          </div>
<?php $this->load->view('admin/includes/footer'); ?>