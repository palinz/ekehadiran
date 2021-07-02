@inject('MinitCurai', 'App\MinitCurai')

<div class="table-responesive" id="cetak-minit-curai-app">
    <form id="frm-cetak-minit-curai">
        @method('GET')
        <head>
		  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		  <title>MINIT CURAI</title>
		  <style type="text/css" ></style>
		</head>
		<table class="table table-bordered">
            <tbody>
                		<h5 align=center>MINIT CURAI</h5>
				<h5 align=center>MESYUARAT LUAR / BENGKEL / KURSUS / PROGRAM</h5>
				<h5 align=center>JABATAN PENDIDIKAN NEGERI MELAKA</h5>
				<tr>
				    <td class="col-md-3"><b>Tajuk</b></td>
				    <div class="col-12">
				    	<td><input class="form-control" type="text" name="txtAktiviti" placeholder="Tajuk Aktiviti" value="{{ $minitCurai->tajuk }}" required></td>
				    </div>
				</tr>
				<tr>
				    <td class="col-md-3"><b>Aktiviti</b></td>
				    <div class="col-12">
				    	<td><input class="form-control" type="text" name="txtAktiviti" placeholder="Tajuk Aktiviti" value="{{ $minitCurai->tajuk }}" required></td>
				    </div>
				</tr>
				<tr>
				    <td><b>Anjuran</b></td>
				    <div class="col-12">
					<td><input class="form-control" type="text" name="txtAnjuran" placeholder="Anjuran" value="{{ $minitCurai->anjuran }}" required></td>
				    </div>
				</tr>
				<tr>
				    <td><b>Tarikh dan Masa</b></td>
				    <div class="col-12">
				    	<td><input id="txtTarikhCurai" class="form-control" type="date" name="txtTarikh" placeholder="Tarikh" value="{{ $minitCurai->tarikh }}" required></td>
				    </div>
				</tr>
				<tr>
				    <td><b>Tempat</b></td>
				    	<div class="col-12">
						<input class="form-control" type="text" name="txtTempat" placeholder="Tempat" value="{{ $minitCurai->lokasi }}" required></td>
				    	</div>
				</tr>
				<tr>
				    <td><b>Isu</b></td>
				    <td>
					<div class="col-12">
						<textarea class="form-control" name="txtIsu" rows="10" required>{{ $minitCurai->isu }}</textarea>
					</div>
				</tr>
				<tr>
						<td>Tanda Tangan Pegawai</td>
						<td align= "center">Tarikh</td>
				</tr>
				<tr>
						<td><br><br>
						................................................
						<br>
						</td>
				</tr>
				<tr>
						<td>Tanda Tangan Pengesahan</td>
						<td align="center"><br><br>
						................................................
						<br>
						</td>
				</tr>
            </body>
        </table>
        
    </form>
</div>
