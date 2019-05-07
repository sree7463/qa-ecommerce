  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Ecommerce <?php echo date("Y"); ?></p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="<?php echo base_url(); ?>Assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>Assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


<script>
$(document).ready(function() {
  function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
      var c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length);
      }
    }
    return "";
  }

  function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires="+d.toGMTString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

  $("#customRange1").on('input', function() {
    var value = $(this).val();
    $("#maximum_price").text(value);
  });

  $('.favourite-icon').click(function() {
    // var favouriteIcon = this;
    var product_id = $(this).attr('data-product-id');
    $.ajax({
      url: '<?php echo base_url(); ?>Favourite/add_favourite',
      context: this,
      method: 'POST',
      data: {product_id: product_id, user_id: <?php echo $this->session->userdata('user_id'); ?>},
      success: function(data) {
        if (data == "added") {
          $(this).removeClass('far').addClass('fas');
          $("#add_to_favourite").html("");
        } else if (data == "removed") {
          $(this).removeClass('fas').addClass('far');
        }
      },
      error: function(error) {
        console.log(error);
      }
    });
  });

  $('.delete_icon').click(function() {
    var product_id = $(this).attr("data-product-id");
    $.ajax({
      url: '<?php echo base_url(); ?>User/remove_favourite',
      context: this,
      method: 'POST',
      data: {product_id: product_id, user_id: <?php echo $this->session->userdata('user_id'); ?>},
      success: function(data) {
        if (data == "true") {
          $(this).closest(".favourite-item").remove();
        }
      },
      error: function(error) {
        console.log(error);
      }
    });
  });

  $('.add_to_cart').click(function() {
    var product_id = $(this).attr('data-product-id');
    product_ids_array = [];
    if (getCookie("products")) {
      var product_ids_array = JSON.parse(getCookie("products"));
      if (product_ids_array.indexOf(product_id) < 0) {
        product_ids_array.push(product_id);
        product_ids_string = JSON.stringify(product_ids_array);
        setCookie("products", product_ids_string, 1);
        $(this).replaceWith('<p class="text-success">Product added to cart</p>');
      } else {
        alert('You have already added this product to cart');
        $('.add_to_cart').remove();
      }
    } else {
      product_ids_string = JSON.stringify([product_id]);
      setCookie("products", product_ids_string, 1);
    }
    console.log(JSON.parse(getCookie("products")));
  });


  // DELETE ORDER 
  $(".order_delete").click(function() {
    if (confirm('Are you sure?')) {
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
    }
  });



});

// ANGULAR APP
var app = angular.module('shoppingCart', []);
app.controller('shoppingCartCtrl', function($scope, $http) {
  $http.get("<?php echo base_url(); ?>Cart/products_json_format")
  .then(function(response) {
    $scope.products = response.data.products;
    $scope.sum_of_product_prices = 0;
    $scope.products.map(function(product) {
      $scope.sum_of_product_prices += Number(product.product_price);
    });
    $scope.remove_product = function(index) {
      var product_id = $scope.products[index].product_id;
      $scope.sum_of_product_prices -= $scope.products[index].product_price;
      $scope.products.splice(index, 1);

      // REMOVE PRODUCT ALSO FROM COOKIE
      var cookie;
      var name = "products" + "=";
      var decodedCookie = decodeURIComponent(document.cookie);
      var ca = decodedCookie.split(';');
      for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
          c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
          cookie = c.substring(name.length, c.length);
        }
      }
      var array_of_products = JSON.parse(cookie);
      var index_of_product = array_of_products.indexOf(product_id);
      array_of_products.splice(index_of_product, 1);
      product_ids_string = JSON.stringify(array_of_products);
      var d = new Date();
      d.setTime(d.getTime() + (1 * 24 * 60 * 60 * 1000));
      var expires = "expires="+d.toGMTString();
      document.cookie = "products" + "=" + product_ids_string + ";" + expires + ";path=/";
    }
  });
});

</script>
</body>
</html>