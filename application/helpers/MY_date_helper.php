<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('tgl_indo'))
{
	function tgl_indo($tgl)
	{
		$ubah = gmdate($tgl, time()+60*60*8);
		$pecah = explode("-",$ubah);
		$tanggal = $pecah[2];
		$bulan = bulan($pecah[1]);
		$tahun = $pecah[0];
		return $tanggal.'-'.$bulan.'-'.$tahun;
	}
}

if ( ! function_exists('tgl_db'))
{
	function tgl_db($tgl)
	{
		$pecah = explode("-",$tgl);
		$tanggal = $pecah[0];
		$bulan = bulan2($pecah[1]);
		$tahun = $pecah[2];
		return $tahun.'-'.$bulan.'-'.$tanggal;
	}
}

if ( ! function_exists('bulan'))
{
	function bulan($bln)
	{
		switch ($bln)
		{
			case 1:
				return "Jan";
				break;
			case 2:
				return "Feb";
				break;
			case 3:
				return "Mar";
				break;
			case 4:
				return "Apr";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Jun";
				break;
			case 7:
				return "Jul";
				break;
			case 8:
				return "Agust";
				break;
			case 9:
				return "Sep";
				break;
			case 10:
				return "Okt";
				break;
			case 11:
				return "Nov";
				break;
			case 12:
				return "Des";
				break;
		}
	}
}

if ( ! function_exists('bulan2'))
{
	function bulan2($bln2)
	{
		$bl = '';
		if($bln2=="Jan"){$bl =1;}
		else if($bln2=="Feb"){$bl =2;}
		else if($bln2=="Mar"){$bl =3;}
		else if($bln2=="Apr"){$bl =4;}
		else if($bln2=="Mei"){$bl =5;}
		else if($bln2=="Jun"){$bl =6;}
		else if($bln2=="Jul"){$bl =7;}
		else if($bln2=="Agust"){$bl =8;}
		else if($bln2=="Sep"){$bl =9;}
		else if($bln2=="Okt"){$bl =10;}
		else if($bln2=="Nov"){$bl =11;}
		else if($bln2=="Des"){$bl =12;}
		else if($bln2==""){$bl =12;}
		
		switch ($bl)
		{
			case 1:
				return "01";
				break;
			case 2:
				return "02";
				break;
			case 3:
				return "03";
				break;
			case 4:
				return "04";
				break;
			case 5:
				return "05";
				break;
			case 6:
				return "06";
				break;
			case 7:
				return "07";
				break;
			case 8:
				return "08";
				break;
			case 9:
				return "09";
				break;
			case 10:
				return "10";
				break;
			case 11:
				return "11";
				break;
			case 12:
				return "12";
				break;
		}
		
	}
}

if ( ! function_exists('nama_hari'))
{
	function nama_hari($tanggal)
	{
		$ubah = gmdate($tanggal, time()+60*60*8);
		$pecah = explode("-",$ubah);
		$tgl = $pecah[2];
		$bln = $pecah[1];
		$thn = $pecah[0];

		$nama = date("l", mktime(0,0,0,$bln,$tgl,$thn));
		$nama_hari = "";
		if($nama=="Sunday") {$nama_hari="Minggu";}
		else if($nama=="Monday") {$nama_hari="Senin";}
		else if($nama=="Tuesday") {$nama_hari="Selasa";}
		else if($nama=="Wednesday") {$nama_hari="Rabu";}
		else if($nama=="Thursday") {$nama_hari="Kamis";}
		else if($nama=="Friday") {$nama_hari="Jumat";}
		else if($nama=="Saturday") {$nama_hari="Sabtu";}
		return $nama_hari;
	}
}

if ( ! function_exists('hitung_mundur'))
{
	function hitung_mundur($wkt)
	{
		$waktu=array(	365*24*60*60	=> "tahun",
						30*24*60*60		=> "bulan",
						7*24*60*60		=> "minggu",
						24*60*60		=> "hari",
						60*60			=> "jam",
						60				=> "menit",
						1				=> "detik");

		$hitung = strtotime(gmdate ("Y-m-d H:i:s", time () +60 * 60 * 8))-$wkt;
		$hasil = array();
		if($hitung<5)
		{
			$hasil = 'kurang dari 5 detik yang lalu';
		}
		else
		{
			$stop = 0;
			foreach($waktu as $periode => $satuan)
			{
				if($stop>=6 || ($stop>0 && $periode<60)) break;
				$bagi = floor($hitung/$periode);
				if($bagi > 0)
				{
					$hasil[] = $bagi.' '.$satuan;
					$hitung -= $bagi*$periode;
					$stop++;
				}
				else if($stop>0) $stop++;
			}
			$hasil=implode(' ',$hasil).' yang lalu';
		}
		return $hasil;
	}
}

if ( ! function_exists('sel_tgl'))
{
	function sel_tgl()
	{
		$tgl = date('Y-m-d');
		$tgll = explode('-',$tgl);
		$tg = $tgll[2];
		$th = $tgll[0];
		$bl = $tgll[1];
		
		echo "<option value='$tg'>$tg</option>";
		
		for($x=1;$x<32;$x++)
		{
			$b = strlen($x);
			if($b==1)
			{
				echo "<option value='0$x'>0$x</option>";
			}else
			{
				echo "<option value='$x'>$x</option>";
			}
		}
		return $sel_tgl;
	}
}

if ( ! function_exists('sel_bln'))
{
	function sel_bln()
	{
		
		$tgl = date('Y-m-d');
		$tgll = explode('-',$tgl);
		$tg = $tgll[2];
		$th = $tgll[0];
		$bl = $tgll[1];
		
		echo "<option value='$bl'>$bl</option>";
		for($x=1;$x<13;$x++)
		{
			$b = strlen($x);
			if($b==1)
			{
				echo "<option value='0$x'>0$x</option>";
			}else
			{
				echo "<option value='$x'>$x</option>";
			}
		}
		return $sel_bln;
	}
}

if ( ! function_exists('sel_thn'))
{
	function sel_thn()
	{
		$tgl = date('Y-m-d');
		$tgll = explode('-',$tgl);
		$tg = $tgll[2];
		$th = $tgll[0];
		$bl = $tgll[1];
		
		echo "<option value='$th'>$th</option>";
		
		$thn = date('Y');
		$th = $thn-30;
		for($x=$thn;$x>$th;$x--)
		{
			echo "<option value='$x'>$x</option>";
		}
		return $sel_thn;
	}
}

if ( ! function_exists('tgl_awalbulan'))
{
	function tgl_awalbulan()
	{
		$hr = date('Y-m-d');
		$tgl_prtm = date('Y-m-01', strtotime($hr));
		echo  tgl_indo($tgl_prtm);
		return $tgl_prtm;
	}
}

if ( ! function_exists('tgl_akhirbulan'))
{
	function tgl_akhirbulan()
	{
		$hr = date('Y-m-d');
		$tgl_akhir = date('Y-m-t', strtotime($hr));
		echo  tgl_indo($tgl_akhir);
		return $tgl_akhir;
	}
}

if ( ! function_exists('tgl_jatuhtempo'))
{
	function tgl_jatuhtempo()
	{
		$hr = date('Y-m-d');
		$tgl_jt = date('Y-m-t', strtotime($hr+7));
		echo  tgl_indo($tgl_jt);
		return $tgl_jt;
	}
}

if ( ! function_exists('bulan_convert'))
{
	function bulan_convert($bln)
	{
		$bulan = (int)$bln;
		switch ($bulan)
		{
			case 1:
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	}
}





