window.Cart = {
  add: function(id) {
    jQuery.post('ajax/add_to_cart.php', { id: id })
      .then(function (res) {
        console.log(res);
      });
  }
}
