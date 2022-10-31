<?php $this->load->view('header')?>
<?php 
	$text_cart_url = '<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>';
	$text_cart_url = 'Cart: '.$this->cart->total_items().' item'; 
?>
	<?=anchor('Home/cart', $text_cart_url)?>
<?php foreach($barang as $row) :?>
<div id="center">
<h3>Detail Produk</h3>
<div class="card" style="width: 18rem;">
  <img src="<?php echo base_url()?>/assets/barang.png" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?=$row->Product_Name?></h5>
    <p class="card-text"><del>Rp. <?=$row->Price?></del></p>
    <p class="card-text">Rp. <?=$row->Price_Diskon?></p>
    <a href="<?= base_url('Home/add_to_cart/'.$row->Product_Code)?>" class="btn btn-primary">Buy</a>
  </div>
</div>
</div>
<?php endforeach; ?>
<?php $this->load->view('footer')?>