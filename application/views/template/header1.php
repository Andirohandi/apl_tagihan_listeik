<div class="navbar navbar-default" role="navigation">
	<div class="navbar-inner">
		<a class="navbar-brand" href="#" style="width:450px;font-family:Times New Roman;font-weight:bold;font-size:25px;"> <img alt="SMKN 1 Katapang Logo" src="<?php echo base_url() ?>asset/theme/img/logo20.png" class="hidden-xs"/>
			<span>SMKN N 1 Katapang</span></a>
		<div class="btn-group pull-right">
			<button class="btn btn-default">
				<a href="<?php echo site_url('pengunjung/login');?>"><i class="glyphicon glyphicon-lock"></i><span class="hidden-sm hidden-xs"> Login</span></a>
				
			</button>
		</div>
		<div class="btn-group pull-right">
			
				<a href="#cari_buku" role="button" class="btn btn-success" data-toggle="modal" ><i class="glyphicon glyphicon-search"></i> Cari Buku</a>
				
			
		</div>
		
	</div>
</div>
<div id="cari_buku" class="modal fade custom" id="myModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="box-inner">
		<div class="box-header well" data-original-title="">
			<h2><i class="glyphicon glyphicon-plus"></i> Cari Buku</h2>

			<div class="box-icon">
				
				<a href="#" class="btn btn-minimize btn-round btn-default"><i
						class="glyphicon glyphicon-chevron-up"></i></a>
				<a href="#" class="btn btn-close btn-round btn-default"><i class="glyphicon glyphicon-remove"></i></a>
			</div>
		</div>
		<br/>
		<div class="box-content">
			<div class="row">
				<div class="col-md-12 col-sm-24" id="" style="">
					<div class="col-md-12 col-sm-24">
						<div class="box-content">
							<table>
								<tr>
									<th>Kode / Judul Buku</th>
									<th>Penulis</th>
									<th></th>
								</tr>
								<tr>
									<td><input type="text" class="form-control"></td>
									<td>
										<select class="form-control">
											<option value="">--Pilih Penulis--</option>
										</select>
									</td>
									<td><a href="" class="btn btn-success" style="float:right;"><i class="glyphicon glyphicon-search"></i> Cari</a></td>
								</tr>
							</table>
							<br/>
							<br/>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
					</div>
				</div>
			</div>
			