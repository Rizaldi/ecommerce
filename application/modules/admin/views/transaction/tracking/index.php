<div class="card card-default">
	<div class="card-header">
		<h3 class="card-title">Input Resi</h3>

		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
			<button type="button" class="btn btn-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
		</div>
	</div>
	<?php echo form_open($this->uri->segment(1).'/'.$this->uri->segment(2).'/'.$this->uri->segment(3)); ?>
	<div class="card-body">
		<div class="row add-image">
			<div class="col-md-6">
				<div class="form-group">
					<label>No Order</label>
					<input type="text" class="form-control" id="order_id_not_disabled" name="order_id_not_disabled" class="order_id_not_disabled" placeholder="Enter Title.." disabled="disabled" required value="<?php echo $transaction->order_id; ?>">
					<!-- <input type="hidden" class="form-control" id="order_id" name="order_id" class="order_id" placeholder="Enter Title.." required value="<?php echo $transaction->order_id; ?>"> -->
					<input type="hidden" class="form-control" id="transaction" name="transaction" class="transaction" placeholder="Enter Title.." required value="<?php echo $transaction->trans_id; ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>No Transaction</label>
					<input type="text" class="form-control" class="transaction_id_not_disabled" id="transaction_id_not_disabled" name="transaction_id_not_disabled" placeholder="" disabled="disabled" required value="<?php echo $transaction->transaction_id; ?>">
					<!-- <input type="hidden" class="form-control" class="transaction_id" id="transaction_id" name="transaction_id" placeholder="" required value="<?php echo $transaction->transaction_id; ?>"> -->
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Pengiriman</label>
					<!-- <input type="text" class="form-control" class="shipping_not_disabled" id="shipping_not_disabled" name="shipping_not_disabled" placeholder="" disabled="disabled" required value="<?php echo $transaction->shipping; ?>"> -->
					<select class="form-control" name="shipping">
						<option value="jne">JNE</option>
						<option value="tiki">TIKI</option>
						<option value="pos">POS</option>
					</select>
					<!-- <input type="hidden" class="form-control" class="shipping" id="shipping" name="shipping" placeholder="" required value="<?php echo $transaction->shipping; ?>"> -->
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>No resi</label>
					<input type="text" class="form-control" class="airwaybill" id="airwaybill" name="airwaybill" placeholder="" required value="<?php echo $tracking->airwaybill; ?>">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Status Pengiriman</label>
					<select class="form-control" name="status">
						<option value="0" <?php if($tracking->status == 0){ echo "selected"; } ?>>Processing Order</option>
						<option value="1" <?php if($tracking->status == 1){ echo "selected"; } ?>>Confirmed Order</option>
						<option value="2" <?php if($tracking->status == 2){ echo "selected"; } ?>>Quality Check</option>
						<option value="3" <?php if($tracking->status == 3){ echo "selected"; } ?>>Dispatched Item</option>
						<option value="4" <?php if($tracking->status == 4){ echo "selected"; } ?>>Product Delivered</option>
					</select>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
					<label>Estimasi Barang Sampai</label>
					<input type="date" class="form-control" class="estimated_date" id="estimated_date" name="estimated_date" placeholder="" required value="<?php echo date('Y-m-d',strtotime($tracking->estimated_date)); ?>">
				</div>
			</div>
			<div class="col-md-12 subm">
				<div class="form-group">
					<button type="submit" class="btn btn-primary float-right">Submit  <i class="fa fa-angle-double-right"></i></button>
				</div>
			</div>
		</div>
	</div>
	<?php echo form_close(); ?>
</div>
</div>