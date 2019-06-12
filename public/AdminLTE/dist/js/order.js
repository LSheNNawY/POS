$(document).ready(function () {
   $('.add_product').click(function (e) {
       e.preventDefault();
       // product data
       var id = $(this).data('id'),
           name = $(this).data('name'),
           price = $(this).data('price');

       // disable add product button after adding to order
       $(this).removeClass('btn-success').addClass('btn-default disabled');

       // html to append
       var html = `
           <tr>
                <td>${name}</td>
                <td><input type="number" name="" min="1" class="form-control" value="1"></td>
                <td>${price}</td>
                <td><a class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
           </tr>
       `;

       // appending to order table
       $('#product_table').append(html)
   });
});