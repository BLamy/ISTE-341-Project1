window.Cart = {
  add: function(id) {
    jQuery.post('ajax/add_to_cart.php', { id: id })
      .then(function(res) {
        jQuery('.Toast')
          .text('Did Add to cart')
          .css({ 'background-color': '#4CAF50'})
          .fadeIn('fast', function() {
            jQuery(this).delay(500).fadeOut('slow');
          });
      })
      .catch(function(e) {
        jQuery('.Toast')
          .text('Failed to add to cart')
          .css({ 'background-color': '#F44336'})
          .fadeIn('fast', function() {
            jQuery(this).delay(500).fadeOut('slow');
          });
      });
  },

  remove: function(id) {
    jQuery.post('ajax/remove_from_cart.php', { id: id })
      .then(function(res) {
        jQuery("#cart-page").html(res);
      });
  },

  removeAll: function() {
    jQuery.post('ajax/remove_all_from_cart.php')
      .then(function(res) {
        jQuery("#cart-page").html(res);
      });
  }
}
