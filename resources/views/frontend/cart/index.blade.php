@extends('layouts.master')

@section('styles')
  <style media="screen">
      td, th{
        border: 1px solid black;
        text-align: center;
      }

      .datatables-image {
        width: 100px;
        height: 100px;
      }
  </style>
@endsection

@section('title')
  Cart
@endsection

@section('content')
  <div class="container" style="height: 100vh;">
    <table>
   	<thead>
       	<tr>
            <th>Image</th>
           	<th>Name</th>
            <th>Size</th>
           	<th>Qty</th>
           	<th>Price</th>
       	</tr>
   	</thead>

   	<tbody>
   		<?php foreach($cartProducts as $row) :?>
       		<tr>
              <td><img class="datatables-image" src="{{ asset('/images/product/'. $row->options->file_path) }}" alt="{{ $row->options->file_path }}"></td>
           		<td><p><strong><?php echo $row->name; ?></strong></p></td>
              <td><?php echo $row->options->size; ?></td>
           		<td><?php echo $row->qty; ?></td>
           		<td>Rp <?php echo $row->price; ?></td>
       		</tr>
	   	<?php endforeach;?>
   	</tbody>
    <tfoot>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td>Subtotal</td>
          <td><?php echo Cart::subtotal(); ?></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td>Tax</td>
          <td><?php echo Cart::tax(); ?></td>
        </tr>
        <tr>
          <td colspan="2">&nbsp;</td>
          <td>Total</td>
          <td><?php echo Cart::total(); ?></td>
        </tr>
    </tfoot>




</table>
  </div>
@endsection

@section('jquery')

@endsection
