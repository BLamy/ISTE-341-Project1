window.Cart = {
  add: function(id) {
    jQuery.post('ajax/add_to_cart.php', { id: id })
      .then(function (res) {
        jQuery('.Toast').fadeIn('fast', function () {
          jQuery(this).delay(500).fadeOut('slow');
        });
      });
  },
  remove: function(id) {
    jQuery.post('ajax/remove_from_cart.php', { id: id })
      .then(function (res) {
        jQuery("#cart-page").html(res);
      });
  }
}
