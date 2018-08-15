<table class="table table-responsive" id="artikels-table">
    <thead>
        <th>Judul</th>
        <th>Keterangan</th>
        <th>Created At</th>
        <th>Updated At</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($artikels as $artikel)
        <tr>
            <td>{!! $artikel->judul !!}</td>
            <td>{!! $artikel->keterangan !!}</td>
            <td>{!! $artikel->created_at !!}</td>
            <td>{!! $artikel->updated_at !!}</td>
            <td>
                {!! Form::open(['route' => ['artikels.destroy', $artikel->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('artikels.show', [$artikel->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('artikels.edit', [$artikel->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>