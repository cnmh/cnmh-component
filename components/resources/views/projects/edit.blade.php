@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                        @lang('crud.edit') @lang('models/projects.singular')
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($project, ['route' => ['projects.update', $project->id], 'method' => 'patch']) !!}

            <div class="card-body">
                <div class="row">
                    @include('projects.fields')
                </div>
            </div>

            <div class="card-footer">
                @can('update-Project')
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                @endcan
                <a href="{{ route('projects.index') }}" class="btn btn-default"> @lang('crud.cancel') </a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
