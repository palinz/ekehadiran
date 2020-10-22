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
        @forelse ($created as $minit)
            <tr class="row-user">
                <td>{{ ($created->currentpage()-1) * $created->perpage() + $loop->index + 1 }}</td>
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

@if ($created->total())
    <div class="clearfix">
        <span style="display: inline-block; vertical-align: middle; line-height: normal;">Papar {{ ($created->currentPage() * $created->perpage()) - ($created->perpage() - 1) }}  hingga {{ ($created->hasMorePages()) ? ($created->currentPage() * $created->perpage()) : $created->total() }}  daripada {{ $created->total() }} rekod</span>
        {{ $created->links() }}
    </div>
@endif
