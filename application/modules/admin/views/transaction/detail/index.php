<section class="content">
	<div class="row">
		<div class="col-md-6">    	
			<img src="<?php echo base_url('') ?>public/img/logo/logo.png" alt="shopro">
		</div>
		<div class="col-md-6">    	
			<div align="right">
				<p><b>Invoice no : </b> <?php echo $transaction->order_id; ?></p>
				<p><b>Date : </b> <?php echo date("d-m-Y", strtotime($transaction->transaction_time)); ?></p>
			</div>
		</div>
		<div class="col-md-6">    	
			<div class="card">
				<div class="card-header">
					Client Information
				</div>
				<div class="card-body">
					<table class="table">
						<tbody>
							<tr>
								<td><b>Nama Awal</b></td>
								<td><?php echo $this->db->get_where('user',array('user_id'=>$transaction->user_id))->row()->username; ?></td>
							</tr>
							<tr>
								<td><b>Nama Akhir</b></td>
								<td><?php echo $this->db->get_where('user',array('user_id'=>$transaction->user_id))->row()->surname; ?></td>
							</tr>
							<tr>
								<td><b>Phone</b></td>
								<td><?php echo $this->db->get_where('user',array('user_id'=>$transaction->user_id))->row()->phone; ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-6">    	
			<div class="card">
				<div class="card-header">
					Detail Payment
				</div>
				<div class="card-body">
					<table class="table">
						<tbody>
							<tr>
								<td><b>Status Pembayaran</b></td>
								<td>
									<?php 
									if ($transaction->transaction_status == 'pending') {
										echo "Belum Dibayar";
									}elseif ($transaction->transaction_status == 'settlement') {
										echo "Sudah Dibayar";
									}elseif ($transaction->transaction_status == 'expired') {
										echo "Pembayaran Sudah Kadaluarsa";
									}
									?>
								</td>
							</tr>
							<tr>
								<td><b>Metode Pembayaran</b></td>
								<td>
									<?php 
									if ($transaction->payment_type == 'bank_transfer') {
										echo "Bank Transfer";
									}elseif ($transaction->payment_type == 'credit_card') {
										echo "Credit Card";
									}elseif ($transaction->payment_type == 'mandiri_clickpay') {
										echo "Mandiri Clickpay";
									}elseif ($transaction->payment_type == 'cimb_clicks') {
										echo "Cimb Clicks";
									}elseif ($transaction->payment_type == 'bca_klikbca') {
										echo "klikBCA";
									}else{
										echo $transaction->payment_type;
									}
									?>
								</td>
							</tr>
							<tr>
								<td><b>Tanggal Pembayaran</b></td>
								<td><?php
								if(strtotime($transaction->transaction_time)!='0000-00-00'){
									$date = date('d-m-Y h:i:s', strtotime($transaction->transaction_time));
								}else{
									$date ='';
								}
								echo $date;
								?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<!-- /.card-body -->
		</div>
		<div class="col-md-6">    	
			<div class="card">
				<div class="card-header">
					Client Information
				</div>
				<div class="card-body">
					<table class="table">
						<tbody>
							<tr>
								<td><b>Alamat</b></td>
								<td><?php echo $this->db->get_where('user',array('user_id'=>$transaction->user_id))->row()->address1; ?></td>
							</tr>
							<tr>
								<td><b>Phone</b></td>
								<td><?php echo $this->db->get_where('user',array('user_id'=>$transaction->user_id))->row()->phone; ?></td>
							</tr>
							<tr>
								<td><b>Email</b></td>
								<td><?php echo $this->db->get_where('user',array('user_id'=>$transaction->user_id))->row()->email; ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-6">    	
			<div class="card">
				<div class="card-header">
					Shipping Information
				</div>
				<div class="card-body">
					<table class="table">
						<tbody>
							<tr>
								<td><b>Alamat</b></td>
								<td><?php echo $this->db->get_where('user',array('user_id'=>$transaction->user_id))->row()->address1; ?></td>
							</tr>
							<tr>
								<td><b>Pengiriman</b></td>
								<td><?php echo $transaction->shipping; ?></td>
							</tr>
							<tr>
								<td><b>Biaya</b></td>
								<td>Rp <?php echo number_format($transaction->shipping_cost,0,",","."); ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-12">    	
			<div class="card">
				<div class="card-header">
					Invoice Pembayaran
				</div>
				<div class="card-body">
					<table class="table">
						<tbody>
							<tr>
								<td><b>No</b></td>
								<td><b>Product Name</b></td>
								<td><b>Unit Price</b></td>
								<td><b>Quantity</b></td>
								<td><b>Total</b></td>

							</tr>
							<?php 
								$purchases = $this->db->get_where('purchase',array('transaction_id'=>$transaction->transaction_id, 'order_id'=>$transaction->order_id));
								$no = 1;
							?>
							<?php foreach ($purchases->result() as $prd_id): $get_prd = $this->db->get_where('product',array('product_id'=>$prd_id->product))->row(); ?>
								<tr>
									<td><?php echo $no++; ?></td>
									<td><?php echo $get_prd->title; ?></td>
									<td>Rp <?php echo number_format($get_prd->sale_price,0,'','.'); ?></td>
									<td><?php echo $prd_id->qty; ?></td>
									<td>Rp <?php echo number_format($prd_id->total,0,'','.'); ?></td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="col-md-6">    	
			
		</div>
		<div class="col-md-6">    	
			<div class="card">
			<div class="card-body">
					<table class="table">
						<tbody>
							<tr>
								<td><b>Sub Total Amount</b></td>
								<td>Rp <?php echo number_format($transaction->net_amount,0,'','.'); ?></td>
							</tr>
							<tr>
								<td><b>Tax</b></td>
								<td>Rp <?php echo number_format($transaction->shipping_cost,0,'','.'); ?></td>
							</tr>
							<tr>
								<td><b>Grand Total</b></td>
								<td>Rp <?php echo number_format($transaction->gross_amount,0,'','.'); ?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- /.card -->
	</div><!-- /.card-body -->
</div>
<!-- /.card -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>