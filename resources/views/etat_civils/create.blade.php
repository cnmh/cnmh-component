@extends('layouts.app')

@section('content')
    <section class="content-header">
        {{-- <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>
                    @lang('crud.create') @lang('models/etatCivils.singular')
                    </h1>
                </div>
            </div>
        </div> --}}
    </section>

    <div class="content px-3">

        @include('adminlte-templates::common.errors')



        <div class="card card-primary card-create col-md-8">

            {!! Form::open(['route' => 'etatCivils.store']) !!}

            <div class="card-header">
                <h1>
                    @lang('crud.create') 
                    @lang('models/etatCivils.singular')
                    </h1>
            </div>

            <div class="card-body">
                @include('etat_civils.fields')
            </div>

            <div class="card-footer">
                <div class="d-flex justify-content-between">
                    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                    <a href="{{ route('etatCivils.index') }}" class="btn btn-default"> @lang('crud.cancel') </a>
                </div>
            </div>

            {!! Form::close() !!}
        </div>
        




        {{-- <div class="card">
            <div class="card-body">
                @include('etat_civils.fields')
            </div>
            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('etatCivils.index') }}" class="btn btn-default"> @lang('crud.cancel') </a>
            </div>
            {!! Form::close() !!}
        </div> --}}
    </div>
@endsection