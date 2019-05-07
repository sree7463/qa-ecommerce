<h5 class="my-4">Categories</h5>
<div class="list-group">
  <?php foreach($categories as $category): ?>
    <a href="<?php echo base_url() . $category->category_slug . "-1" . $category->id; ?>" class="list-group-item"><?php echo $category->category_name; ?></a>
  <?php endforeach; ?>
  <!-- <a href="#" class="list-group-item">Category 2</a>
  <a href="#" class="list-group-item">Category 3</a> -->
</div>