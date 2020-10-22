<table class="table table-bordered table-hover">
    <thead>
        <tr style="background-image: linear-gradient(to bottom, #fafafa 0, #f4f4f4 100%);">
            <th style="width:1px;">#</th>
            <th>TAJUK</th>
            <th>ANJURAN</th>
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
                <td>{{ $minit->flag }}</td>
                <td><button class="btn btn-default btn-flat btn-sm btn-kemaskini" data-id="{{ $minit->id }}"><i class="fa fa-edit"></i> Kemaskini</button></td>
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
