@inject('MinitCurai', 'App\MinitCurai')

<div class="table-responesive" id="edit-minit-curai-app">
    <form id="frm-edit-minit-curai">
        @method('PATCH')
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td class="col-md-3"><b>Minit Curai</b></td>
                    <td><input class="form-control" type="text" name="txtAktiviti" placeholder="Mesyuarat Luar/Bengkel/Kursus/Program" value="{{ $minitCurai->tajuk }}" required></td>
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
                    <td><b>Pegawai yang terlibat</b></td>
                    <td>
                        <div class="col-12">
                            <textarea class="form-control" name="txtPegawai" rows="5" placeholder="Nyatakan Nama Pegawai Yang Terlibat" required>{{ $minitCurai->pegawai_terlibat }}</textarea>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><b>Isu</b></td>
                    <td>
                        <div class="col-12">
                            <textarea class="form-control" name="txtIsu" rows="5" placeholder="Nyatakan isi / isi penting " required>{{ $minitCurai->isu }}</textarea>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td><b>Tindakan</b></td>
                    <td>
                        <div class="col-12">
                            <textarea class="form-control" name="txtTindakan" rows="5" placeholder="Nyatakan tindakan seperti keputusan, Mesyuarat dalaman/bengkel dalaman dan lain-lain" required>{{ $minitCurai->tindakan }}</textarea>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td><b>Arahan / Cadangan</b></td>
                    <td>
                        <div class="col-12">
                            <textarea class="form-control" name="txtCadangan" rows="5" placeholder="Arahan / Cadangan bagi Tindakan / Keputusan oleh Pengarah/Timbalan Pengarah (Sekiranya dari Timbalan Pengarah, salinan hendaklah diserahkan kepada Pengarah" required>{{ $minitCurai->cadangan }}</textarea>
                        </div>
                    </td>
                </tr>

                <tr>
                    <td><button class="btn btn-default btn-majukan" type="button">MAJUKAN KEPADA >></button></td>
                    <td>
                        <div class="col-12">
                            <select class="form-control comPegawai" name="states[]" multiple="multiple">
                                @foreach($anggota as $ag)
                                <option value={{ $ag->anggota_id }}>{{ $ag->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                </tr>
            </body>
        </table>
        <button class="btn btn-success btn-kemaskini-simpan" type="submit">SIMPAN</button>
        @if($minitCurai->flag == $MinitCurai::DERAF || $minitCurai->flag == $MinitCurai::PULANG)
        <button id="btn-minit-hantar" class="btn btn-success">HANTAR</button>
        @endif
        @if(Auth::user()->anggota->pegawaiYangDinilai->count() > 0 && Auth::user()->anggota_id != $minitCurai->anggota_id)
        <button id="btn-minit-pulang" class="btn btn-success" data-status="PULANG">PULANG</button>
        <button id="btn-minit-sah" class="btn btn-success" data-status="SAH">SAH</button>
        @endif
       
    </form>
</div>
