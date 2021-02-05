    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
      $(document).ready(function() {
        var product_types = <?php echo json_encode($product_types ?? ''); ?>;
        var products = <?php echo json_encode($products ?? ''); ?>;

        var total_tax = 0.0;
        var total = 0.0;

        $('#addBtn').click(function() {
          var product_id = $("#product_id option:selected").val();

          var product = $.grep(products, function(e) {
            return e.id == product_id;
          })[0];

          var product_name = product.name;

          var product_value = parseFloat(product.value);
          var tax = parseFloat($.grep(product_types, function(e) {
            return e.id == product.product_type_id;
          })[0].tax);

          var quantity = parseInt($("#quantity").val());
          var product_tax = ((product_value / 100) * tax);
          var subtotal = ((product_value + product_tax) * quantity);

          total_tax += product_tax * quantity;
          total += subtotal;

          $('#saleItems tr:last').after('<tr><td><input class="" type="text" size="15" readonly="readonly" style="border: 0; background: transparent;" value="' + product_name + '"/></td>' +
            '<td><input type="text" size="10" readonly="readonly" style="border: 0; background: transparent;" value="' + product_value + '"/></td>' +
            '<td><input type="text" size="10" readonly="readonly" style="border: 0; background: transparent;" value="' + tax + '"/></td>' +
            '<td><input type="text" size="10" name="quantity[]" readonly="readonly" style="border: 0; background: transparent;" value="' + quantity + '"/></td>' +
            '<td><input type="text" size="10" readonly="readonly" style="border: 0; background: transparent;" value="' + subtotal.toFixed(2) + '"/></td>' +
            '<td><input type="text" size="10" name="product_id[]" readonly="readonly" style="border: 0; background: transparent; display:none;" value="' + product_id + '"/></td>' +
            '</tr>');

          $("#totalTax").text(total_tax.toFixed(2));
          $("#totalSale").val(total.toFixed(2));
        });
      });
    </script>
    </body>

    </html>