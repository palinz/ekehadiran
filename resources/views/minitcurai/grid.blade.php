<table class="table table-bordered table-hover">
    <thead>
        <tr style="background-image: linear-gradient(to bottom, #fafafa 0, #f4f4f4 100%);">
            <th style="width:1px;">#</th>
            <th>AKTIVITI</th>
            <th>ANJURAN</th>
            <th>PENGHANTAR</th>
            <th style="width:1px;">STATUS</th>
            <th style="width:1px;">OPERASI</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($union as $minit)
            <tr class="row-user">
                <td>{{ ($union->currentpage()-1) * $union->perpage() + $loop->index + 1 }}</td>
                <td>{{ $minit->tajuk }}</td>
                <td>{{ $minit->anjuran }}</td>
                <td>{{ ($minit->isOwner(Auth::user())) ? "--" : $minit->sender()->nama }}</td>
                <td>{{ $minit->flag }}</td>
                <td>
                    @if($minit->flag != "DISAHKAN")
                    <button class="btn btn-default btn-flat btn-sm btn-kemaskini" data-id="{{ $minit->id }}"><i class="fa fa-edit"></i> Kemaskini</button>
                    @else
                    <button class="btn btn-success btn-flat btn-sm btn-block btn-informasi" data-id="{{ $minit->id }}"><i class="fa fa-info"></i> Info</button>
                    
                </td>
                <td>
                    <button class="btn btn-default btn-flat btn-sm btn-block btn-cetak" data-id="<a class="nav-link" href="{{ url('cetak') }}"></a><i class="fa fa-cetak"></i> Cetak</button>
                </td>
                    @endif 
            </tr>
        @empty
            <tr>
                <td colspan="6">Rekod tidak wujud!</td>
            </tr>
        @endforelse
    </tbody>
</table>

@if ($union->total())
    <div class="clearfix">
        <span style="display: inline-block; vertical-align: middle; line-height: normal;">Papar {{ ($union->currentPage() * $union->perpage()) - ($union->perpage() - 1) }}  hingga {{ ($union->hasMorePages()) ? ($union->currentPage() * $union->perpage()) : $union->total() }}  daripada {{ $union->total() }} rekod</span>
        {{ $union->links() }}
    </div>
@endif
