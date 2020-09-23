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
        <div class="box-body">
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
                              &nbsp;<button id="top-btn-cipta" class="btn btn-default btn-flat btn-sm" ><i class="fa fa-copy"></i> Cipta Minit Curai</button>
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
                <h4>
                    <i class="fa fa-refresh fa-spin"></i> Loading...
                </h4>
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
        $('#top-btn-cipta').on('click', function(){
          $('#modal-minit-curai').modal('show');
        });
      });
    </script>
@endsection