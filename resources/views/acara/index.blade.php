@extends('layouts.master')

@section('content')
    <div id="eventsApp">
        <section class="content-header">
            <h1>
                <i class="fa fa-dashboard"></i></i> Dashboard
            </h1>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"><i class="fa fa-fw fa-calendar"></i><i class="fa fa-fw fa-user"></i> Acara Anggota</h3>
                            <div class="box-tools pull-right">
                                <!-- Buttons, labels, and many other things can be placed here! -->
                                <!-- Here is a label for example -->
                                <span id='petunjuk'><i class="fa fa-fw fa-info"></i></span>
                            </div><!-- /.box-tools -->
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
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr style="background-image: linear-gradient(to bottom, #fafafa 0, #f4f4f4 100%);">
                                        <th style="width:1px;">#</th>
                                        <th>TARIKH</th>
                                        <th>NAMA</th>
                                        <th>BAHAGIAN/ UNIT</th>
                                        <th>KETERANGAN ACARA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="row-user" v-for="(event, index) in events" :key="index">
                                    @{{ console.log(event)}}
                                        <td>@{{ index }}</td>
                                        <td>@{{ event.masa_mula }}</td>
                                        <td>@{{ event.xtra_userinfo.nama }}</td>
                                        <td>@{{ event.bahagian }}</td>
                                        <td>@{{ event.perkara }}</td>
                                    </tr>    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

@section("scripts")
    <script>
        const eventApp = new Vue({
            el: "#eventsApp",
            data: {
                "events": null,
            },
            created() {
                let events = this.events;
                $.ajax({
                    method: 'get',
                    url: base_url+"rpc/acara",
                    success: data => {
                        this.events = data;
                    },
                    error: function(err) {
                        reject(err);
                    },
                    statusCode: login()
                });
            },
        });
    </script>
@endsection