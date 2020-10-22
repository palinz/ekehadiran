<div class="table-responesive" id="add-minit-curai-app">
    <form id="frm-minit-curai">
        <table class="table table-bordered">
        <tbody>
            <tr>
                <td class="col-md-3"><b>Aktiviti</b></td>
                <td><input class="form-control" type="text" name="txtAktiviti" placeholder="Tajuk Aktiviti" required></td>
            </tr>
            <tr>
                <td><b>Anjuran</b></td>
                <td><input class="form-control" type="text" name="txtAnjuran" placeholder="Anjuran" required></td>
            </tr>
            <tr>
                <td><b>Tarikh dan Masa</b></td>
                <td><input id="txtTarikhCurai" class="form-control" type="date" name="txtTarikh" placeholder="Tarikh" required></td>
            </tr>
            <tr>
                <td><b>Tempat</b></td>
                <td><input class="form-control" type="text" name="txtTempat" placeholder="Tempat" required></td>
            </tr>
            <tr>
                <td><b>Isu</b></td>
                <td>
                    <div class="col-12">
                    <textarea class="form-control" name="txtIsu" id="" rows="10" required></textarea>
                    </div>
            </tr>
        </body>
        </table>
        <button class="btn btn-success btn-kemaskini-simpan" type="submit">SIMPAN</button>
        <button id="btn-tutup" type="button" class="btn btn-link" style="color:#dd4b39;" data-dismiss="modal" aria-label="Close">BATAL</button>
    </form>
</div>
