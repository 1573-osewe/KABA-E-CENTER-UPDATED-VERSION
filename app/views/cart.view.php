<?php
  $this->view('includes/header');
         $this->view('includes/nav');
?>

   <div class="container">
	<div class="text-center" style="margin-top:5rem !important;">
	CART
   </div>

   <div class="table-responsive">
   <?php if(!empty($rows)):?>
   	<table  class="table talble-striped" style="width:100%">
   		<thead>
   			<tr class="bg-warning text-light ">
   				<th scope="col">Image</th>
   				<th scope="col">Product</th>
   				<th scope="col">Price</th>
   				<th scope="col">Quantity</th>
   				<th scope="col">Total</th>
   				<th scope="col">Remove</th>
   			</tr>
   		</thead>
		
   		<tbody class="">
			<?php foreach($rows as $row):?>
   			<tr>
				<th style="max-height:5rem; max-width:2rem;">
			
					<img src="<?php echo ROOT?>/<?php echo esc($row->ad_image1)?>" alt="" class="img-fluid rounded" style="object-fit: cover; height:4rem; width:90%;">
			
				</th>
				<td><?php echo esc($row->title) ?? ''?></td>
				<th><?php echo "Ksh ". esc($row->price)?? ''?></th>
				<td >
					<div class="d-flex " style="width:8rem;">
						<a class="me-2" href="<?php echo ROOT?>/add_to_cart/add_qty/<?php echo $row->id?>"><h4>+</h4></a>
						<input type="text" oninput="edit_qty(this.value, '<?php echo $row->id?>')" class="form-control text-center me-2" style="width:100%;" value="<?php echo esc($row->cart_qty)?? ''?>">
						<a href="<?php echo ROOT?>/add_to_cart/sub_qty/<?php echo $row->id?>"><h4>-</h4></a>
					</div>
				</td>
				<th><?php echo "Ksh ". number_format(esc($row->total_price),2) ?? '' ?></th>
				<td><a onclick ="remove('<?php echo $row->id?>')" href="<?php echo ROOT?>/add_to_cart/remove/<?php echo $row->id?>"><i class="bi bi-trash text-danger"></i></a></td>
   			</tr>
			<?php endforeach;?>
			<tr >
				<th  colspan=3></th>
				<td  class="fw-bold h-4">SUB TOTAL:</td>
				<th ><?php echo "Ksh ".number_format($sub_total,2)?></th>
			</tr>
			
   		</tbody>
		
   	</table>

	 <div class="row">
	<div class="col-md-6">
		<a href="<?php echo ROOT?>" style="background-color:orange !important; color:#ffff;" class="btn mb-3 ms-auto">Continue Shopping</a>
	</div>
	<div class="col-md-6">
		<div class="card mt-3">
			<div class="card-body d-flex">
				<div class="card-header me-2"><?php echo "Ksh ".number_format($sub_total,2)?></div>
				<a href="<?php echo ROOT ?>/checkout"><div class="btn me-1 fw-bold" style="color:#86bc42 !important;">PROCEED TO CHECKOUT<i class="bi bi-arrow-right fw-bold h-3 text-success"></i></div></a>
			</div>
		</div>
	</div>
   </div>

	<?php else:?>
		<div style="border-top:solid green;"></div>
		<div class="text-center mt-3  mb-3">Your cart is currently empty.</div>
	<?php endif;?>
   </div>

  
   </div>



   <script>
	function edit_qty(qty,id)
	{
		if(isNaN(qty))
		{
			return
		}else{
			send_data({
				qty:qty.trim(),
				id:id.trim()
			},"edit_qty");
		}
	}
	function remove(id)
	{
			send_data({
				id:id.trim()
			},"remove");
		
	}
	function send_data(data = {}, data_type)
	{
		var ajax = new XMLHttpRequest();

		ajax.addEventListener('readystatechange', function()
		{
			if(ajax.readyState == 4 && ajax.status == 200)
			{
				handle_result(ajax.responseText);
			}
		});
		ajax.open('POST',"<?php echo ROOT?>/ajax_cart/"+data_type+"/"+JSON.stringify(data),true);
		ajax.send();
	}
	function handle_result(result)
	{
		 console.log(result);
		if(result !='')
		{
			var obj = JSON.parse(result);
			if(typeof obj.data_type != 'undefined')
			{
				if(obj.data_type == "edit_qty")
				{
					window.location.href = window.location.href;
				}
				if(obj.data_type == "remove")
				{
					window.location.href = window.location.href;
				}
			}
		}
		
	}
   </script>
   <?php $this->view('includes/footer') ?>