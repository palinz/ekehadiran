<div class="table-responsive">
    <form id="frm-edit-bahagian" method="POST">
        @method('PATCH')
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td><b>PARENT BAHAGIAN/ UNIT</b></td>
                    <td>
                        <div style="position: relative;">
                            <input id="departmentDisplay6" class="form-control departmentDisplay" type="text" style="background-color: #FFF;" readonly value="{{ $dept->parent->deptname }}">
                            <input id="departmentDisplay6Id" name="txtDepartmentId" class="form-control departmentDisplayId" type="hidden" style="background-color: #FFF;" readonly value="{{ $dept->parent->deptid }}">
                            <div id="treeDisplay6" style="display:none;">
                                <div id="departmentsTree6" style="position:absolute; background-color: #FFF; overflow:auto; max-height:200px; border:1px #ddd solid"></div>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td><b>NAMA BAHAGIAN/ UNIT</b></td>
                    <td><input class="form-control" type="text" name="txtNamaBahagian" placeholder="Nama Bahagian/ Unit" required value="{{ $dept->deptname }}"></td>
                </tr>
            </body>
        </table>

        @can('edit-profil')
        <button class="btn btn-success pull-right btn-kemaskini-simpan" type="submit">SIMPAN</button>
        <button id="btn-batal" type="button" class="btn btn-link pull-right" style="color:#dd4b39;" >BATAL</button>
        @endcan
    </form>
</div>