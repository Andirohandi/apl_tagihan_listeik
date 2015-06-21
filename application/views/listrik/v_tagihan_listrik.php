<style>
table thead th{
	text-align:center;
}

</style>
<div class="box col-md-8">
		<div class="box-header well" data-original-title="">
			<h2><i class="glyphicon glyphicon-user"></i> Data Pemakai</h2>
		</div>
		<br/>
		<div class="box-content">
			<form class="form-inline">
				
				<div id="kanan-menu">
					<div class="form-group" >
						<label for="exampleInputName2">Jmlh : </label>
						<select class="form-control" id="get_jumlah" onchange="get_db_pemakai()">
							<option value="5">5</option>
							<option value="10">10</option>
							<option value="25">25</option>
							<option value="50">50</option>
							<option value="100">100</option>
						</select>
					</div>
					<div class="form-group" style='margin-left:20px'>
						<label for="exampleInputName2">Status : </label>
						<select id="get_status" class="form-control" onchange="get_db_pemakai()">
							<option value="">ALL</option>
							<option value="1">AKTIF</option>
							<option value="0">TIDAK AKTIF</option>
						</select>
					</div>
				
					<div class="form-group" style='float:right;'>
						<div class="input-group">
							<input type="text" name="cari_nip" id="cari_nip" placeholder="Cari berdasarkan NIP / Nama anggota" class="form-control" onkeyup="get_db_pemakai()" /><div class="input-group-addon">Cari</div>
						</div>
					</div>
				</div>
			</form>
			</br>
		
		<table class="table table-striped table-bordered responsive">
			<thead>
				<th>No</th>
				<th>NIP</th>
				<th>NAMA</th>
				<th>TAGIHAN</th>
				<th>STATUS</th>
				<th>TINDAKAN</th>
			</thead>
			<tbody id="table_pemakai">
				
			</tbody>
		</table>
		</div>
</div>
<div class="box col-md-4">
	<div class="box-inner">
		<div class="box-header well" data-original-title="">
			<h2><i class="glyphicon glyphicon-plus"></i> Tambah Pemakai</h2>
		</div>
		<br/>
		<div class="box-content">
			<div class="row">
				<div class="col-sm-12 col-md-12 cok-xs-12">
					<label>NIP </label>
					<input type="text" id="get_nip" name="get_nip" class="form-control" readonly >
					<br/>
					<label>Nama Pemakai</label>
					<input type="text" id="get_nama" name="get_nama" class="form-control" placeholder="Masukkan Nama Pemakai" >
					<br/>
					<label>Tagihan per bulan</label>
					<input type="text" id="get_tagihan" name="get_tagihan" class="form-control" placeholder="Masukkan Tagihan">
					<br/><br/>
					<button type='button' style='float:right;margin-bottom:20px;' class='btn btn-sm btn-success' onclick='tambah_pemakai()'><i class='glyphicon glyphicon-plus'></i> Tambah Pemakai</button>
					<br/>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	

$(document).ready(function(){

	get_db_pemakai();

});


function get_db_pemakai()
{
	var nip 	= $('#get_nip').val();
	var nama 	= $('#get_nama').val();
	var tagihan = $('#get_tagihan').val();
	var status  = $('#get_status').val();
	var jumlah  = $('#get_jumlah').val();
	var cari_nip  = $('#cari_nip').val();
	
	$.ajax({
		url		: 'pemakai/get_dt_pemakai',
		type	: 'POST',
		dataType: 'html',
		data	: {
			nip:nip,
			nama:nama,
			tagihan:tagihan,
			status:status,
			jumlah:jumlah,
			cari_nip:cari_nip
			},
		beforeSendf : function()
		{
		
		},
		success : function(result)
		{
			get_dt_id();
			$('#table_pemakai').html(result);
		}
	});
}

function get_dt_id()
{
	$.ajax({
		url		: 'pemakai/get_dt_id',
		dataType: 'json',
		beforeSendf : function()
		{
		
		},
		success : function(result)
		{
			$('#get_nip').val(result.nip);
		}
	});
}

function tambah_pemakai(){
	var nip 	= $('#get_nip').val();
	var nama 	= $('#get_nama').val();
	var tagihan = $('#get_tagihan').val();
	var status  = $('#get_status').val();
	var jumlah  = $('#get_jumlah').val();
	var cari_nip  = $('#cari_nip').val();
	$.ajax({
		url		: 'pemakai/tambah_pemakai',
		type	: 'POST',
		dataType: 'json',
		data	: {
			nip:nip,
			nama:nama,
			tagihan:tagihan
			},
		beforeSendf : function()
		{
		
		},
		success : function(result)
		{
			if(result.rs==0)
			{
				
				alertify.error('Maaf! Data gagal ditambahkan. Periksa kembali data yang anda inputkan');
			}else{
				$('#get_nama').val('');
				$('#get_tagihan').val('');
				get_db_pemakai();
				alertify.success('Data berhasil ditambahkan');
			}
		}
	});
}
</script>