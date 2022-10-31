<?php $this->load->view('header')?>
<div id="center">
<table class="table table-bordered table-striped table-hover">
		<thead>
			<tr>
				<th>Transaction</th>
				<th>User</th>
				<th>Todal</th>
				<th>Date</th>
				<th>Item</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$i=0;
				foreach ($all as $items): 
				$i++;
			?>
			<tr>
				<td><?= $items['Document_Code'] ?> - <?= $items['Document_Number'] ?></td>
				<td><?= $items['User'] ?></td>
				<td><?= $items['Total'] ?></td>
				<td><?= $items['Date'] ?></td>
				<td>
                    <ul>
                    <?php if(!empty($items['ListItem'])){?> 
                        <?php foreach($items['ListItem'] as $detailItem){?>
                            <li><?=$detailItem['Product_Code']?>&nbsp;<?=$detailItem['Quantity']?> X</li>
                            
                        <?php } ?>
                    <?php } ?>
                    </ul>
                </td>
			</tr>
			<?php endforeach ; ?>
		</tbody>
		
	</table>
	
</div>
<?php $this->load->view('footer')?>