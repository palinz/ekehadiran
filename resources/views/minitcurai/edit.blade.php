@inject('MinitCurai', 'App\MinitCurai')

<div class="table-responesive" id="edit-minit-curai-app">
    <form id="frm-edit-minit-curai">
        @method('PATCH')
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td class="col-md-3"><b>Aktiviti</b></td>
                    <td><input class="form-control" type="text" name="txtAktiviti" placeholder="Tajuk Aktiviti" value="{{ $minitCurai->tajuk }}" required></td>
                </tr>
                <tr>
                    <td><b>Anjuran</b></td>
                    <td><input class="form-control" type="text" name="txtAnjuran" placeholder="Anjuran" value="{{ $minitCurai->anjuran }}" required></td>
                </tr>
                <tr>
                    <td><b>Tarikh dan Masa</b></td>
                    <td><input id="txtTarikhCurai" class="form-control" type="date" name="txtTarikh" placeholder="Tarikh" value="{{ $minitCurai->tarikh->format('Y-m-d') }}" required></td>
                </tr>
                <tr>
                    <td><b>Tempat</b></td>
                    <td><input class="form-control" type="text" name="txtTempat" placeholder="Tempat" value="{{ $minitCurai->lokasi }}" required></td>
                </tr>
                <tr>
                    <td><b>Isu</b></td>
                    <td>
                        <div class="col-12">
                        <textarea class="form-control" name="txtIsu" rows="10" required>{{ $minitCurai->isu }}</textarea>
                        </div>
                </tr>
            </body>
        </table>
        <button class="btn btn-success btn-kemaskini-simpan" type="submit">SIMPAN</button>
        @if($minitCurai->flag == $MinitCurai::DERAF || $minitCurai->flag == $MinitCurai::PULANG)
            <button id="btn-minit-hantar" class="btn btn-success">HANTAR</button>
        @endif
        @if(Auth::user()->anggota->pegawaiYangDinilai->count() > 0 && Auth::user()->anggota_id != $minitCurai->anggota_id)
            <button id="btn-minit-pulang" class="btn btn-success">PULANG</button>
            <button id="btn-minit-sah" class="btn btn-success">SAH</button>
        @endif
        <button id="btn-tutup" type="button" class="btn btn-link" style="color:#dd4b39;" data-dismiss="modal" aria-label="Close">BATAL</button>
    </form>
</div>
