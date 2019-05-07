        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="<?php echo base_url(); ?>admin/logout">Logout</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>Assets/admin/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>Assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>Assets/admin/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>Assets/admin/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <!-- <script src="<?php echo base_url(); ?>Assets/admin/vendor/chart.js/Chart.min.js"></script> -->

  <!-- Page level custom scripts -->
  <!-- <script src="<?php echo base_url(); ?>Assets/admin/js/demo/chart-area-demo.js"></script> -->
  <!-- <script src="<?php echo base_url(); ?>Assets/admin/js/demo/chart-pie-demo.js"></script> -->
  
  <!-- TAGSINPUT JS -->
  <script src="<?php echo base_url(); ?>Assets/admin/js/tagsinput.js"></script>

  <!-- JQUERY SORT JS -->
  <script src="<?php echo base_url(); ?>Assets/admin/js/jquery.nestable.js"></script>

  <!-- SWEET ALERT JS -->
  <script src="<?php echo base_url(); ?>Assets/js/sweetalert.min.js"></script>

  <!-- TINYMCE MIN JS -->
  <script src="<?php echo base_url(); ?>Assets/admin/js/tinymce/tinymce.min.js"></script>
  <script src="<?php echo base_url(); ?>Assets/admin/js/tinymce/init-tinymce.js"></script>

<script>
const URL = '<?php echo base_url(); ?>';
</script>

<script>
$(document).ready(function() {
  /* 
    JQUERY PLUGINS
  */

  /*
    TINYMCE CODE
  */
  /*
    MYFUNCTIONS
  */
  function convertToSlug(Text) {
    return Text
        .toLowerCase()
        .replace(/ +/g,'-')
        .replace(/[^\w-]+/g,'')
        ;
  }

  $('input.qaisar-slug').keyup(function() {
    var text = $(this).val();
    if (text.slice(1) == '-') {
      text = text.slice(1);
    }
    text = text.toLowerCase().replace(/ +/g,'-').replace(/-+/g,'-').replace(/[^\w-]+/g,'');
    // update
    var length = text.length;
    var endCharacterIndex = length - 1;
    if (text.charAt((endCharacterIndex++)) === '-') {
      text = text.substring(0, endCharacterIndex);
    }
    if (text.charAt(0) === '-') {
      text = text.substr(1);
    }
    $(this).val(text);
    $(this).parent().find('.input-group-text').html(text.length);
  });
  $('input.qaisar-slug').blur(function(){
    var text = $(this).val();
    var length = text.length;
    var endCharacterIndex = length - 1;
    if (text.charAt(endCharacterIndex) == '-') {
      text = text.substring(0, endCharacterIndex);
    }
    if (text.charAt(0) === '-') {
      text = text.substr(1);
    }
    $(this).val(text);
    $(this).parent().find('.input-group-text').html(text.length);
  });

  $('form[name="add_category_form"]').find('#category_meta_tags').keypress(function(e){
    if (e.which == 13) {
      $(this).next().focus();  //Use whatever selector necessary to focus the 'next' input
      return false;
    }
  });

  // BOOTSTRAP 4 TOOLTIP
  $('[data-toggle="tooltip"]').tooltip();

  // COVERT CATEGORY TITLE TO SLUG
  $("#category_name").keyup(function(){
    var title = convertToSlug(($(this).val()).trim());
    var slug = convertToSlug(title);
    $("#category_slug").val(slug);
  });

  // COVERT PRODUCT TITLE TO SLUG
  $("#product_name").keyup(function(){
    var title = convertToSlug(($(this).val()).trim());
    var slug = convertToSlug(title);
    $("#product_slug").val(slug);
  });

  // ADD CATEGORY FORM VALIDATION
  $('form[name="add_category_form"], form[name="edit_category_form"]').submit(function(e) {
    $('.input_error').remove();
    
    var category_name = ($('#category_name').val()).trim();
    var category_slug = ($('#category_slug').val()).trim();
    var category_meta_title = ($('#category_meta_title').val()).trim();
    var category_meta_description = ($('#category_meta_description').val()).trim();
    var category_meta_tags = ($('#category_meta_tags').val()).trim();

    if (category_name == "" || category_slug == "" || category_meta_title == "" || category_meta_description == "" || category_meta_tags == "") {
      e.preventDefault();
      $('form[name="add_category_form"], form[name="edit_category_form"]').prepend(`<span class="input_error">All Fields are required!</span>`);
    } 
  });

  // ADD PROUDCT FORM VALIDATION
  $('form[name="add_product_form"], form[name="edit_product_form"]').submit(function(e) {
    $('.input_error').remove();

    var product_name = ($('#product_name').val()).trim();
    var product_slug = ($('#product_slug').val()).trim();
    var product_meta_title = ($('#product_meta_title').val()).trim();
    var product_meta_description = ($('#product_meta_description').val()).trim();
    var product_meta_keywords = ($('#product_meta_keywords').val()).trim();
    var product_new_price = ($('#product_new_price').val()).trim();
    var category_count = $('input[name="category[]"]:checked').length;
    var product_detail = ($('textarea[name="product_detail"]').val()).trim();

    if (product_name == "" || product_slug == "" || product_meta_title == "" || product_meta_description == "" || product_meta_keywords == "" || product_new_price == "" || category_count == 0 || product_detail == 0) {
      e.preventDefault();
      $('form[name="add_product_form"], form[name="edit_product_form"]').prepend(`<span class="input_error">Fill required fields!</span>`);
    } else if (isNaN(product_price)) {
      e.preventDefault();
      $('#product_price').after('<span class="error">Enter price in numbers!</span>');
    }
  });


  // DELETE ORDER 
  $(".order_delete").click(function(e) {
    e.preventDefault();
    swal({
      title: "Are you sure?",
      text: "",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        var order_id = $(this).attr('data-order-id');
        $.ajax({
          url: '<?php echo base_url(); ?>Order/delete_order',
          context: this,
          method: 'POST',
          data: {order_id: order_id},
          success: function(data) {
            if (data == "true") {
              $(this).closest("tr").remove();
            } else {
              alert('There was error deleting order!');
            }
          },
          error: function(error) {
            console.log(error);
          }
        });
      } else {
        // swal("Your imaginary file is safe!");
      }
    });
  });

  // META TITLE COUNT
  var meta_title_count_function = function() {
    var meta_title = ($(this).val()).trim();
    var meta_title_count = meta_title.length;
    'keyup keypress blur change'
    $("#meta_title_count").text(meta_title_count);
  }
  $("#meta_title").bind({
    copy  : meta_title_count_function,
    keyup : meta_title_count_function,
    cut   : meta_title_count_function
  });

  // META DESCRIPTION COUNT
  var meta_description_count_function = function() {
    var meta_description = ($(this).val()).trim();
    var meta_description_count = meta_description.length;
    'keyup keypress blur change'
    $("#meta_description_count").text(meta_description_count);
  }
  $("#meta_description").bind({
    copy  : meta_description_count_function,
    keyup : meta_description_count_function,
    cut   : meta_description_count_function
  });

  // TEXT LENGTH COUNT
  $(".tcount").keyup(function() {
    var text = ($(this).val()).trim();
    var text_count = text.length;
    ($(this).parent()).find('.input-group-text').text(text_count);
  });

  // WORD COUNT BASED ON COMMA
  $(".wcount").keyup(function() {
    var text = ($(this).val()).trim();
    if (text.length > 0) {
      var array = text.split(",");
      var word_count = array.length;
      ($(this).parent()).find('.input-group-text').text(word_count);
    } else {
      ($(this).parent()).find('.input-group-text').text(0);
    }
  });


  $("form[name='general_setting_form'] input[name='meta_tags']").change(function() {
    var value = ($(this).val()).trim();
    value = value.split(",");
    $("#meta_tags_count").text(value.length);
  })

  // GENERAL SETTING
  $("form[name='general_setting_form']").submit(function(e) {
    $(".input_error").remove();

    var meta_title = ($("#meta_title").val()).trim();
    var meta_description = ($("#meta_description").val()).trim();
    var meta_tags = ($("#meta_tags").val()).trim();

    if (meta_title == "") {
      e.preventDefault();
      $('#meta_title').parent().after('<span class="input_error">This field is required!</span>');
    } else if (meta_description == "") {
      e.preventDefault();
      $('#meta_description').parent().after('<span class="input_error">This field is required!</span>');
    } else if (meta_tags == "") {
      e.preventDefault();
      $('#meta_tags').parent().after('<span class="input_error">This field is required!</span>');
    }

  });


  // PRODUCT EDIT - PROUDCT IMAGE DELETION WITH AJAX
  $('.img-wrap .close').on('click', function() {
    if (confirm('Are you sure?')) {
      var image_id_name = $(this).attr('data-image-id-name');
      var my_array = image_id_name.split(':');
      var product_id = my_array[0];
      var image_name = my_array[1];
      var image_container = $(this).parent('.img-wrap');
      $.ajax({
        url: "<?php echo base_url(); ?>admin/Admin/delete_product_image",
        method: "POST",
        data: {action: "delete_product_image", product_id: product_id, image_name: image_name},
        success: function(data) {
          console.log(data);
          if (data == true) {
            image_container.remove();
          } else {
            alert('Image not deleted!');
          }
        },
        error: function(response) {
          console.log(response);
        }
      });
    }
  });

  var sorted_categories = '';

  var updateOutput = function(e) {
    var list   = e.length ? e : $(e.target),
        output = list.data('output');
    if (window.JSON) {
      sorted_categories = (window.JSON.stringify(list.nestable('serialize')));//, null, 2));
    } else {
      sorted_categories = ('JSON browser support required for sorting.');
    }
  };

  $("#save_sorted_categories").click(function() {
    updateOutput($('#nestable'));
    $.ajax({
      url: '<?php echo base_url(); ?>admin/Admin/save_sorted_categories',
      method: 'POST',
      data: {sorted_categories: sorted_categories},
      success: function(data) {
        if (data == "true") {
          window.location = "<?php echo base_url(); ?>admin/category_list";
        }
      },
      error: function(response) {
        console.log(response);
      }
    });
  });

  $('#nestable').nestable({
    group: 1,
    maxDepth: 2
  })
  .on('change', updateOutput);

  $('#nestable_categories').nestable({
    group: 1,
    maxDepth: 2
  });

  function delete_category() {
    var li = $(this).parent('li');
    var id = li.attr('data-id');
    var index = category_ids.indexOf(id);
    var s = window.confirm('Are you sure?');
    li.remove();
    updateOutput($('#nestable'));
    if (s) {
      if (index > -1) {
        li.remove();
        updateOutput($('#nestable'));
      }
    }
  }

  // WHEN PAGE LOADS CREATE AN ARRAY
  // CONTAINING ALL CATEGORIES
  var list = $('#nestable_categories');
  var list   = list.length ? list : $(list.target),
  output = list.data('output');
  var all_categories;
  if (window.JSON) {
    all_categories = (window.JSON.stringify(list.nestable('serialize')));//, null, 2));
  } else {
    all_categories = ('JSON browser support required for sorting.');
  }

  // ADD EVENT LISTENER ON DELETE
  $('.dd-handle-trash').click(delete_category);

  // ADD EVENT LISTENER FOR ADDING CATEGORIES TO SORT LIST
  var category_ids = [];
  $('.dd-handle-plus').click(function() {
    var id = $(this).parent('li').attr('data-id');
    if (!category_ids.includes(id)) {
      category_ids.push(id);
      var li_copy = $(this).parent('li').clone()[0];
      $(li_copy).hide();
      var li_copy_html = $(li_copy).html();
      li_copy_html = li_copy_html.replace("dd-handle-plus", "dd-handle-trash");
      li_copy_html = li_copy_html.replace("fa-plus", "fa-trash");
      li_copy_html = li_copy_html.replace("text-primary", "text-danger");
      $(li_copy).html(li_copy_html);
      $('#nestable .dd-list')[0].append(li_copy);
      $(li_copy).show('fast');
      $(".dd-handle-trash").off("click").on("click",delete_category);
      updateOutput($('#nestable').data('output', $('#nestable-output')));
    }
  });

  // ORDER APPROVE CODE
  $('.order_approve').click(function(e){
    e.preventDefault();
    var order_id = parseInt($(this).attr('data-order-id'));
    window.location = URL + 'admin/approve_order/' + order_id; 
  });
  // ../ ORDER APPROVE CODE

  // ORDER DISAPPROVE CODE
  $('.order_disapprove').click(function(e){
    e.preventDefault();
    var order_id = parseInt($(this).attr('data-order-id'));
    window.location = URL + 'admin/disapprove_order/' + order_id; 
  });
  // ../ ORDER DISAPPROVE CODE

  // ADMIN DELETE ITEM CONFIRM WITH SWEET ALERT
  function confirm_delete(e) {
    e.preventDefault();
    return swal({
      title: "Are you sure?",
      text: "",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {
        var url = $(this).attr('href');
        window.location = url;
      } else {
        e.preventDefault();
      }
    });
  }
  $('.delete_item').click(confirm_delete);
  // ../ ADMIN DELETE ITEM CONFIRM WITH SWEET ALERT
  
});
</script>
</body>
</html>