<?php if (!empty($bill)) { ?>
<center><h2>Your Bill</h2></center>
<div class="container" id="row">

<div class="col s12 m12 l12 card horizontal red accent-1">
	<div class="card-stacked">
		<div class="card-content">
		<div class="row">
			<div class="col s12 m12 l5 card horizontal">
				<div class="card-stacked ">
					<div class="card-content ">
							<h5 class="center-align flow-text">Bill</h5>
							<table class=" responsive-table">
								<thead>
									<tr>
										<th >No</th>
										<th>ID</th>
										<!-- <th>Payment</th> -->
										<th>Total Order</th>
										<th>Status</th>
										<th>Check Cart</th>
									</tr>
								</thead>

								<tbody>
									<?php $i = 0; foreach ($bill as $b) { $i++;?>      
									<tr>
										<td ><label for="p1" class="white-text"><?= $i; ?></label></td>
										<td><?= $b->order_id; ?></td>
										<!-- <td><?= $b->payment; ?></td> -->
										<td>Rp. <?php echo number_format($b->order_total,2,',','.'); ?></td>
										<td><?= $b->actions; ?></td>
										<td><button id="" class="btn waves-effect waves-light red btn-large tombol_detailproduk" value="<?= $b->order_id; ?>">
												<i class="small material-icons" style="display:contents">assignment_returned</i>
												<!-- <input type="hidden" class="ambil_idproduk" value="<?= $b->order_id; ?>"></span> -->
											</button>
										</td>
									</tr>  
									<?php } ?>
								</tbody>
							</table>
					</div>
				</div>
			</div>

				<!-- <?php $i = 0; foreach ($customer as $d) { $i++;?>       -->
				<!-- <?php echo set_value('product_id'); ?> -->
				<!-- <?= $d->customer_id; ?> -->
				<!-- <?php } ?> -->
		
			<div class="col s12 m12 l7"> 
			<div class="card horizontal">
				<div class="card-stacked">
					<div class="card-content" >
							<h5 class="center-align flow-text">Informasi</h5>
							<table>
							<thead>
								<tr>
									<th>Image</th>
									<th>Name</th>
									<th>Price</th>
									<th>Qty</th>
									<th>Total</th>
								</tr>
							</thead>
								<div class="loading" style="display: none;text-align: center;">
									<div class="preloader-wrapper active">
										<div class="spinner-layer spinner-red-only">
										<div class="circle-clipper left">
											<div class="circle"></div>
										</div><div class="gap-patch">
											<div class="circle"></div>
										</div><div class="circle-clipper right">
											<div class="circle"></div>
										</div>
										</div>
									</div>
								</div>  

							<tbody style="display:none" id="box_produk" class="produk">
							</tbody>
						</table>

							<div style="display:none" id="box_produk1" class="calculate col s6 m6 l6 offset-s6 offset-m6 offset-l6">

							<div>
					</div>
				</div>
			</div>
			</div>
</div>


	<!-- <div class="row" style="display:none" id="box_produk"><get_dataid id="show_dataid"
		<div class="s4 m4 l4"> 
		Name:<p class="gambar"></p><br>
		</div>
	</div> -->
</div>
</div>
</div>
	</div>
</div>
<?php } 
    else {  echo redirect('404_override','refresh');
} ?>