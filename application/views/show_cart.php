<?php $this->load->view('header')?>
<div id="center">
<table class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
				<th>No</th>
				<th>Gambar</th>
				<th>Product</th>
				<th>Qty</th>
				<th>Price</th>
				<th>Subtotal</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$i=0;
				foreach ($this->cart->contents() as $items): 
				$i++;
			?>
			<tr>
				<td><?= $i ?></td>
				<td><img src="<?php echo base_url()?>/assets/barang.png" class="card-img-top" alt="" width="20" height="60"></td>
				<td><?= $items['name'] ?></td>
				<td><?= $items['qty'] ?></td>
				<td>Rp. <?= number_format($items['price'],0,',','.') ?></td>
				<td>Rp. <?= number_format($items['subtotal'],0,',','.') ?></td>
			</tr>
			<?php endforeach ; ?>
		</tbody>
		<tfoot>
			<tr>
				<td align="right" colspan="5">Total</td>
				<td align="left">Rp. <?= number_format($this->cart->total(),0,',','.');?></td>
			</tr>
		</tfoot>
	</table>
	<div align="center">
		<?= anchor('Home/clear_cart','Clear Cart',['class'=>'btn btn-danger'])?>
		<?= anchor(base_url(),'Continue Shooping',['class'=>'btn btn-info'])?>
		<?= anchor('Home/order','CheckOut',['class'=>'btn btn-primary'])?>
	</div>
</div>
<?php $this->load->view('footer')?>