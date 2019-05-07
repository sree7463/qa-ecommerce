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
              <li class="breadcrumb-item">Category</li>
            </ol>
          </nav>

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Category list:</h1>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
          </div>

          <div class="row">
            <div class="col-md-6">
              <?php if (isset($message)) echo $message; ?>
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th>Name</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th colspan="2">Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(!empty($categories)): ?>
                    <?php foreach($categories as $category): ?>
                      <tr>
                        <td><?php echo $category->category_name; ?></td>
                        <td><?php echo $category->category_slug; ?></td>
                        <td><?php echo $category->category_meta_title; ?></td>
                        <td>
                          <a href="<?php echo base_url(); ?>admin/edit_category/<?php echo $category->id; ?>" class="btn btn-primary btn-circle btn-sm">
                            <i class="fas fa-edit"></i>
                          </a>
                        </td>
                        <td>
                          <a href="<?php echo base_url(); ?>admin/admin/delete_category/<?php echo $category->id; ?>" class="btn btn-danger btn-circle btn-sm delete_item">
                            <i class="fas fa-trash"></i>
                          </a>
                        </td>
                      </tr>
                    <?php  endforeach; ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="4"><i>No category saved yet!</i></td>
                    </tr>
                  <?php endif; ?>
                  <!-- <tr>
                    <td colspan="4"><i>No categories added yet!</i></td>
                  </tr> -->
                </tbody>
              </table>
            </div>

            <div class="col-md-6">
              <div class="row">
                <div class="col-md-5">
                  <div class="dd" id="nestable_categories" style="width: 100%;">
                    <ol class="dd-list">
                    <?php foreach ($categories as $category): ?>
                      <li class="dd-item" data-name='<?php echo $category->category_name; ?>' data-id="<?php echo $category->id; ?>">
                        <div class="dd-handle">
                         <?php echo $category->category_name; ?>
                        </div>
                        <div class="dd-handle-plus"><i class="fa fa-plus text-primary"></i></div>
                      </li>
                    <?php endforeach; ?>
                    </ol>
                  </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-5">
                  <div class="dd" id="nestable" style="width: 100%;">
                    <ol class="dd-list">

                      <?php foreach ($sorted_categories as $category): ?>
                      <li class="dd-item" data-name="<?php echo $category->name; ?>" data-id="<?php echo $category->id; ?>">
                        <div class="dd-handle"><?php echo $category->name; ?> </div>
                        <div class="dd-handle-trash"><i class="fa fa-trash text-danger"></i></div>
                        <?php if (property_exists($category, 'children')): ?>
                          <ol class="dd-list">
                            <?php foreach ($category->children as $child): ?>
                              <li class="dd-item" data-name="<?php echo $child->name; ?>" data-id="<?php echo $child->id; ?>">
                                <div class="dd-handle"><?php echo $child->name; ?></div>
                                <div class="dd-handle-trash"><i class="fa fa-trash text-danger"></i></div>
                                <?php if (property_exists($child, 'children')): ?>
                                  <ol class="dd-list">
                                    <?php foreach ($child->children as $child): ?>
                                      <li class="dd-item" data-name="<?php echo $child->name; ?>" data-id="<?php echo $child->id; ?>">
                                        <div class="dd-handle"><?php echo $child->name; ?></div>
                                        <div class="dd-handle-trash"><i class="fa fa-trash text-danger"></i></div>
                                        <?php if (property_exists($child, 'children')): ?>
                                          <ol class="dd-list">
                                            <?php foreach ($child->children as $child): ?>
                                              <li class="dd-item" data-name="<?php echo $child->name; ?>" data-id="<?php echo $child->id; ?>">
                                                <div class="dd-handle"><?php echo $child->name; ?></div>
                                                <div class="dd-handle-trash"><i class="fa fa-trash text-danger"></i></div>
                                              </li>
                                            <?php endforeach; ?>
                                          </ol>
                                        <?php endif; ?>
                                      </li>
                                    <?php endforeach; ?>
                                  </ol>
                                <?php endif; ?>
                              </li>
                            <?php endforeach; ?>
                          </ol>
                        <?php endif; ?>
                      </li>
                      <?php endforeach; ?>
                    </ol>
                  </div>
                  <!-- SAVE NESTED CATEGORIES -->
                  <button class="btn btn-primary btn-sm float-right" id="save_sorted_categories">Save</button>
                </div>
              
              </div>
              <div class="row">
                <div class="col-md-11">
                  
                </div>
              </div>
            </div>

          </div>
<?php $this->load->view('admin/includes/footer'); ?>