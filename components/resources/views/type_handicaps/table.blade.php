<div class="card-body p-0">
    <div class="table-responsive">
        <table class="table table-striped" id="type-handicaps-table">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th colspan="3">Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($typeHandicaps as $typeHandicap)
                <tr>
                    <td>{{ $typeHandicap->nom }}</td>
                    <td>{{ $typeHandicap->description }}</td>
                    <td  style="width: 120px">
                        {!! Form::open(['route' => ['typeHandicaps.destroy', $typeHandicap->id], 'method' => 'delete']) !!}
                        <div class='btn-group'>
                            @can('show-TypeHandicap')
                            <a href="{{ route('typeHandicaps.show', [$typeHandicap->id]) }}"
                               class='btn btn-default btn-sm'>
                                <i class="far fa-eye"></i>
                            </a>
                            @endcan
                            @can('edit-TypeHandicap')
                            <a href="{{ route('typeHandicaps.edit', [$typeHandicap->id]) }}"
                               class='btn btn-default btn-sm'>
                                <i class="far fa-edit"></i>
                            </a>
                            @endcan
                            {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                        </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="card-footer clearfix">
        <div class="float-right">
            @include('adminlte-templates::common.paginate', ['records' => $typeHandicaps])
        </div>
        <div class="float-left">
                                                                        </div>
    </div>
</div>
