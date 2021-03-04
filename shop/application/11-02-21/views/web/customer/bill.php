<?php if (!empty($bill)) { ?>
<center><h2>Your Bill</h2></center>
<div class="container row" id="">

    <table class="responsive-table">
        <thead>
        <tr>
        <th>No</th>
        <th>ID</th>
        <th>Payment</th>
        <th>Total Order</th>
        <th>Status</th>
        <th>Check Cart</th>

        </tr>
        </thead>

        <tbody>
        <?php $i = 0; foreach ($bill as $b) { $i++;?>      
            <tr>

            <td><label for="p1"><?= $i; ?></label></td>
            <td><?= $b->order_id; ?></td>
            <td><?= $b->payment; ?></td>
            <td>Rp. <?php echo number_format($b->order_total,2,',','.'); ?></td>
            <td><?= $b->actions; ?></td>
			<th><button id="tombol_detailproduk" class="btn waves-effect waves-light red btn-large">
					<i class="small material-icons" style="display:contents">assignment_returned</i>
					<input type="hidden" class="ambil_idproduk" value="<?= $b->order_id; ?>"></span>
				</button>
			</th>

        </tr>  
        <?php } ?>
        </tbody>
    </table>
	
	<!-- <?php $i = 0; foreach ($customer as $d) { $i++;?>       -->
	<!-- <?php echo set_value('product_id'); ?> -->
	<!-- <?= $d->customer_id; ?> -->
	<!-- <?php } ?> -->

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
	<div class="row" style="display:none" id="box_produk"><!--get_dataid id="show_dataid"-->
		<div class="s4 m4 l4"> 
		Name:<p class="produk"></p><br>
		Name:<p class="gambar"></p><br>
		</div>
	</div>
</div>
 
<li>
    <!-- <input class="inpt" id="p1" type="checkbox" name="menu"/>
    <label class="nama_jwl" for="p1">Spesialis Kandungan
		<?php   
			foreach($kand as $k){        
		?>

			<?php if ($k->kondisi == 'baru') {?>
				<span id="notif_poli" class="notif_poli"><?= $k->kondisi; ?> </span>
			<?php } else{ ($k->kondisi) ?>
			<?php } } ?>
	</label> -->
		
		<ul class="submenu">
			<div style="">
				<table class="table-hover headjwl">
					<thead>
						<tr >
							<th style="width: 40px;"><span>No.</span></th>
							<th data-direction="ASC"><span>Nama Dokter</span> </th>
							<th data-direction="ASC" style="width: "><span>Poliklinik</span> </th>
							<th data-title="" data-direction="ASC"><span>Minggu</span> </th>
							<th data-title="" data-direction="ASC"><span>Senin</span> </th>
						</tr>
					</thead>

					<tbody>
							<?php   
								if (count($kand) > 0) {
									$no = 0;
								foreach($kand as $d){        
									$no++; 
							?>
						<tr style="background-color: #f6ffaf">	
									<td class="thtd-tabel-jadwal"><?=$no ;?> </td>
									<td class="thtd-tabel-jadwal">
										<?php if ($d->nama_dokter == 'Citra Adinda RA Putri, Sp. KGA'){ ?>
											drg. <?= $d->nama_dokter;?>
										<?php } elseif ($d->nama_dokter == 'Herliena Dyah Indriyani') {?>
											drg. <?= $d->nama_dokter; ?>
										<?php } else{ ($d->nama_dokter) ?>
											dr. <?= $d->nama_dokter; ?>
										<?php } ?>
									</td>
										
									<td class="thtd-tabel-jadwal"><?php echo $d->poli; ?></td>
									
										<?php if ($d->Minggu == '') { ?>
											<td class="thtd-tabel-jadwal" style='background:white'><?php echo $d->Minggu; ?></td>
										<?php }elseif ($d->Minggu == '-'){ ?>
											<td class="thtd-tabel-jadwal" style='background:#f9f9f9;color:#f9f9f9'><?php echo $d->Minggu; ?></td>
										<?php }else{ ($d->Minggu) ?>
											<td class="thtd-tabel-jadwal" style='background:red;color:white'><?php echo $d->Minggu; ?></td>
										<?php } ?>

										<?php if ($d->Senin == '') { ?>
											<td class="thtd-tabel-jadwal" style='background:white'> <?php echo $d->Senin; ?> </td>
										<?php }elseif ($d->Senin == '-'){ ?>
											<td class="thtd-tabel-jadwal" style='background:#f9f9f9;color:#f9f9f9'><?php echo $d->Senin; ?></td>
										<?php } else{ ($d->Senin) ?>
											<td class="thtd-tabel-jadwal"> <?php echo $d->Senin; ?> </td>
										<?php } ?>

						</tr>
							
							<?php } ?>
							<?php
								} else {
									echo "<tbody><tr><td colspan='10' style='padding:10px; background:#F00; border:none; color:#FFF;'>Hasil pencarian tidak ditemukan.</td></tr></tbody>";
								}
							?>
					</tbody>

				</table>
			</div>
		</ul>
  </li>
</ul>
</div>
<?php } 
    else {  echo redirect('404_override','refresh');
} ?>