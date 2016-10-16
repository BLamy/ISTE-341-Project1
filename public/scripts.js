window.Cart = {
  add: function(id) {
    jQuery.post('ajax/add_to_cart.php', { id: id })
      .then(function (res) {
        console.log(res);
      });
  },
  remove: function(id) {
    jQuery.post('ajax/remove_from_cart.php', { id: id })
      .then(function (res) {
        jQuery("#cart-page").html(res);
      });
  }
}
