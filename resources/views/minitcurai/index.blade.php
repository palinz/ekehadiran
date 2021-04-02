@extends('layouts.master')

@section('content')
<section class="content-header">
    <h1>
        <i class="fa fa-folder-open"></i></i> Minit Curai
        <small>Maklumat Mesyuarat yang dihadiri</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('dashboard') }}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Minit Curai</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">

    <!-- Default box -->
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title"><i class="fa fa-newspaper-o"></i> Senarai Minit Curai</h3>

            {{-- <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div> --}}
        </div>
        <div class="box-body" id="minit-curai-a">
            <div class="row" style="margin:0;">
                <div class="col-lg-12">
                    <div class="pull-right" style="padding-bottom:5px;">
                        <table>
                            <tr>
                                <td style="margin:0;padding:0;">
                                    <div class="input-group input-group-sm" style="width: 250px;">
                                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                        <input id="search-key" type="text" name="table_search" class="form-control input-sm pull-right" placeholder="Search">
                                    </div>
                                </td>
                                <td style="margin:0;padding:0;">
                                    &nbsp;<button id="top-btn-cipta" class="btn btn-default btn-flat btn-sm"><i class="fa fa-copy"></i> Cipta Minit Curai</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row" style="margin:0;">
                <div class="col-lg-12">
                    <div id="dg-minit"></div>
                </div>
            </div>
        </div>
        <div class="overlay">
            <i class="fa fa-refresh fa-spin"></i>
        </div>
    </div>
    <!-- /.box -->

    <!-- Modal -->
    <div class="modal fade" id="modal-minit-curai">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Cipta Minit Curai</h4>
                </div>

                <div class="modal-body">
                    <h4><i class="fa fa-refresh fa-spin"></i> Loading...</h4>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

    <!-- Modal -->
    <div class="modal fade" id="modal-edit-minit-curai">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Kemaskini Minit Curai</h4>
                </div>

                <div class="modal-body">
                    <h4><i class="fa fa-refresh fa-spin"></i> Loading...</h4>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->

</section>
<!-- /.content -->
@endsection

@section('scripts')
<script>
    $(function() {
        var minit_id = 0;
        var url = base_url + 'rpc/minitcurai/grid';
        populateDg(url, '#dg-minit');

        function populateDg(url, place) {
            $('.overlay').show();
            $.ajax({
                method: 'post',
                url: url,
                //data: dataSearch,
                success: function(data, textStatus, jqXHR) {
                    $(place).html(data);
                    $('.overlay').hide();

                    /* if(dataSearch.searchKey) {
                        
                        $(".table tbody tr").unmark({
                            done: function() {
                                $(".table tbody tr").mark(dataSearch.searchKey,{debug: true});
                            }
                        });
                    } */

                    /* $("#search-key").addClear({
                        onClear: function(e){
                            $('#top-btn-profil').prop('disabled', true);
                            $('#top-btn-wp').prop('disabled', true);
                            $('#top-btn-ppp').prop('disabled', true);
                            $('#top-btn-more').prop('disabled', true);
                            $('#top-btn-more').addClass('disabled');

                            dataSearch.searchKey = '';
                            populateDg(base_url+'rpc/anggota_grid', '#dg-anggota');
                        }
                    }); */
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    swal({
                        title: 'Ralat!',
                        text: 'Data tidak dapat dipaprkan. Sila cuba lagi',
                        type: 'error',
                    }).then(() => $('#modal-default').modal('hide'));
                },
                statusCode: login()
            });
        }

        $('#top-btn-cipta').on('click', function() {
            $('#modal-minit-curai').modal('show');
        });

        $('#modal-minit-curai').on('show.bs.modal', function(e) {
            $(this).find('.modal-header').css('backgroundColor', 'steelblue');
            $(this).find('.modal-header').css('color', 'white');
            //$(this).find('.modal-title').text('PEGAWAI PENILAI : '+mProfil.title);
            var modalBody = $(this).find('.modal-body');
            $.ajax({
                url: base_url + 'rpc/minitcurai/create',
                success: function(data, textStatus, jqXHR) {
                    modalBody.html(data);
                }
            })
        });

        $('#modal-minit-curai').on('submit', "#frm-minit-curai", function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            swal({
                title: 'Amaran!',
                text: 'Anda pasti untuk menambah maklumat ini?',
                type: 'warning',
                cancelButtonText: 'Tidak',
                showCancelButton: true,
                confirmButtonText: 'Ya!',
                showLoaderOnConfirm: true,
                allowOutsideClick: false,
                allowOutsideClick: () => !swal.isLoading(),
                preConfirm: () => {
                    return new Promise((resolve, reject) => {

                        $.ajax({
                            method: 'post',
                            data: formData,
                            cache: false,
                            contentType: false,
                            processData: false,
                            url: base_url + 'rpc/minitcurai/store',
                            success: function() {
                                resolve();
                            },
                            error: function(err) {
                                reject(err);
                            },
                            statusCode: login()
                        });
                    })
                }
            }).then((result) => {
                if (result.value) {
                    swal({
                        title: 'Berjaya!',
                        text: 'Maklumat telah ditambah',
                        type: 'success'
                    }).then(() => {
                        $('#modal-minit-curai').modal('hide');
                        populateDg(url, '#dg-minit');
                    });
                }
            }).catch(function(error) {
                var errorMsg = error.statusText;

                if (error.status == 409) {
                    errorMsg = 'Rekod telah wujud!';
                }

                swal({
                    title: 'Ralat!',
                    text: errorMsg,
                    type: 'error'
                });
            });
        });

        $('#modal-minit-curai').on('hidden.bs.modal', function(e) {
            e.preventDefault();
            $(this).find('.modal-body').html('<h4><i class="fa fa-refresh fa-spin"></i> Loading...</h4>');
        })

        $('#dg-minit').on('click', ".btn-kemaskini", function(e) {
            e.preventDefault();
            minit_id = $(this).data('id');
            $('#modal-edit-minit-curai').modal('show');
        });


        $('#dg-minit').on('click', ".btn-informasi", function(e) {
            e.preventDefault();
            minit_id = $(this).data('id');
            $('#modal-edit-minit-curai').modal('show');
        });

        $('#modal-edit-minit-curai').on('show.bs.modal', function(e) {
            $(this).find('.modal-header').css('backgroundColor', 'steelblue');
            $(this).find('.modal-header').css('color', 'white');
            //$(this).find('.modal-title').text('PEGAWAI PENILAI : '+mProfil.title);
            var modalBody = $(this).find('.modal-body');
            $.ajax({
                url: base_url + 'rpc/minitcurai/' + minit_id + '/edit',
                success: function(data, textStatus, jqXHR) {
                    modalBody.html(data);
                }
            })
        });

        $('#modal-edit-minit-curai').on('shown.bs.modal', function(e) {
            var modal = this;
            $(this).find('.btn-majukan').on('click', function(e){
                //console.log($(modal).find('.comPegawai').val());
                $.ajax({
                    method: 'POST',
                    data: {
                        comPegawai: $(modal).find('.comPegawai').val(),
                    },
                    url: base_url + 'rpc/minitcurai/' + minit_id + '/forward',
                    success: function(data) {
                        swal({
                            title: 'Berjaya!',
                            text: 'Minit telah dimajukan',
                            type: 'success'
                        })
                    }
                });
            });

        });

        $('#modal-edit-minit-curai').on('submit', "#frm-edit-minit-curai", function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            swal({
                title: 'Amaran!',
                text: 'Anda pasti untuk mengemaskini maklumat ini?',
                type: 'warning',
                cancelButtonText: 'Tidak',
                showCancelButton: true,
                confirmButtonText: 'Ya!',
                showLoaderOnConfirm: true,
                allowOutsideClick: false,
                allowOutsideClick: () => !swal.isLoading(),
                preConfirm: () => {
                    return new Promise((resolve, reject) => {

                        $.ajax({
                            method: 'post',
                            data: formData,
                            cache: false,
                            contentType: false,
                            processData: false,
                            url: base_url + 'rpc/minitcurai/' + minit_id + '/edit',
                            success: function() {
                                resolve();
                            },
                            error: function(err) {
                                reject(err);
                            },
                            statusCode: login()
                        });
                    })
                }
            }).then((result) => {
                if (result.value) {
                    swal({
                        title: 'Berjaya!',
                        text: 'Maklumat telah dikemaskini',
                        type: 'success'
                    }).then(() => {
                        $('#modal-edit-minit-curai').modal('hide');
                        populateDg(url, '#dg-minit');
                    });
                }
            }).catch(function(error) {
                var errorMsg = error.statusText;

                if (error.status == 409) {
                    errorMsg = 'Rekod telah wujud!';
                }

                swal({
                    title: 'Ralat!',
                    text: errorMsg,
                    type: 'error'
                });
            });
        });

        $('#modal-edit-minit-curai').on('hidden.bs.modal', function(e) {
            e.preventDefault();
            $(this).find('.modal-body').html('<h4><i class="fa fa-refresh fa-spin"></i> Loading...</h4>');
        })

        $('#modal-edit-minit-curai').on('click', "#btn-minit-hantar", function(e) {
            e.preventDefault();

            swal({
                title: 'Amaran!',
                text: 'Anda pasti untuk menghantar maklumat ini?',
                type: 'warning',
                cancelButtonText: 'Tidak',
                showCancelButton: true,
                confirmButtonText: 'Ya!',
                showLoaderOnConfirm: true,
                allowOutsideClick: false,
                allowOutsideClick: () => !swal.isLoading(),
                preConfirm: () => {
                    return new Promise((resolve, reject) => {

                        $.ajax({
                            method: 'post',
                            cache: false,
                            contentType: false,
                            processData: false,
                            url: base_url + 'rpc/minitcurai/' + minit_id + '/send',
                            success: function() {
                                resolve();
                            },
                            error: function(err) {
                                reject(err);
                            },
                            statusCode: login()
                        });
                    })
                }
            }).then((result) => {
                if (result.value) {
                    swal({
                        title: 'Berjaya!',
                        text: 'Maklumat telah dihantar',
                        type: 'success'
                    }).then(() => {
                        $('#modal-edit-minit-curai').modal('hide');
                        populateDg(url, '#dg-minit');
                    });
                }
            }).catch(function(error) {
                var errorMsg = error.statusText;

                if (error.status == 409) {
                    errorMsg = 'Rekod telah wujud!';
                }

                swal({
                    title: 'Ralat!',
                    text: errorMsg,
                    type: 'error'
                });
            });
        });

        $('#modal-edit-minit-curai').on('click', "#btn-minit-sah", function(e) {
            e.preventDefault();

            swal({
                title: 'Amaran!',
                text: 'Anda pasti untuk mengesahkan maklumat ini?',
                type: 'warning',
                cancelButtonText: 'Tidak',
                showCancelButton: true,
                confirmButtonText: 'Ya!',
                showLoaderOnConfirm: true,
                allowOutsideClick: false,
                allowOutsideClick: () => !swal.isLoading(),
                preConfirm: () => {
                    return new Promise((resolve, reject) => {

                        $.ajax({
                            method: 'post',
                            cache: false,
                            contentType: false,
                            processData: false,
                            url: base_url + 'rpc/minitcurai/' + minit_id + '/sah',
                            success: function() {
                                resolve();
                            },
                            error: function(err) {
                                reject(err);
                            },
                            statusCode: login()
                        });
                    })
                }
            }).then((result) => {
                if (result.value) {
                    swal({
                        title: 'Berjaya!',
                        text: 'Maklumat telah dihantar',
                        type: 'success'
                    }).then(() => {
                        $('#modal-edit-minit-curai').modal('hide');
                        populateDg(url, '#dg-minit');
                    });
                }
            }).catch(function(error) {
                var errorMsg = error.statusText;

                if (error.status == 409) {
                    errorMsg = 'Rekod telah wujud!';
                }

                swal({
                    title: 'Ralat!',
                    text: errorMsg,
                    type: 'error'
                });
            });
        });
        $('#dg-minit').on('click', '.btn-page', function(e) {
            e.preventDefault();
            url = $(this).attr('href');
            populateDg(url, '#dg-minit');
        });
    });
</script>
@endsection