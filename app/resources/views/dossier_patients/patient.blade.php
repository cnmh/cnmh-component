@extends('layouts.app')

@section('content')
    <section class="content-header">
        <div class="container-fluid">

        </div>
    </section>
    <section class="content">
        <div class="container-fluid ">
            @include('flash::message')

            <div class="clearfix"></div>


            <div class="row">

                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title"></h3>
                        </div>
                        @include('dossier_patients.stepper')
                        <div class="card-header">
                            <div class="col-sm-12 d-flex justify-content-between ">
                                <div class="col-sm-6">
                                    <a class="btn btn-primary " href="{{ route('patients.create') }}?parentRadio={{request()->query("parentRadio")}}">
                                        @lang('crud.add_new') {{strtolower(__('models/patients.singular'))}}
                                    </a>
                                </div>

                                <!-- SEARCH FORM -->
                                <form class="form-inline ml-3">
                                    <div class="input-group input-group-sm">
                                        <input type="search" class="form-control form-control-lg" placeholder="@lang('crud.search')">
                                        <div class="input-group-append">
                                            <button type="button" class="btn btn-lg btn-default">
                                                <i class="fa fa-search"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                @php
                                    $url = parse_url($_SERVER['REQUEST_URI']);
                                    // var_dump($url['query']);
                                @endphp
                                <form action="{{ route('dossier-patients.entretien', $url['query']) }}" method="get">

                                    <table class="table table-striped" id="patient-table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                {{-- <th>@lang('models/patients.fields.image')</th> --}}
                                                <th>@lang('models/patients.fields.nom')</th>
                                                <th>@lang('models/patients.fields.prenom')</th>
                                                <th>@lang('models/patients.fields.tuteur_id')</th>
                                                <th>@lang('models/patients.fields.email')</th>
                                                <th>@lang('models/patients.fields.cin')</th>


                                                {{-- <th>Cin</th>
                                            <th>Remarques</th> --}}
                                                <th colspan="3">@lang('crud.action')</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($patients as $patient)
                                                <tr>
                                                    <td>
                                                        <input type="radio" value="{{ $patient->id }}" name="patientRadio"
                                                        {{ $patient->id == request('patient_id') ? 'checked' : '' }}>
                                                    </td>

                                                    {{-- <td> <img width="40" height="40" src="{{ $patient->image }}"></td> --}}
                                                    <td>{{ $patient->nom }}</td>
                                                    <td>{{ $patient->prenom }}</td>
                                                    <td>{{ $patient->parent->nom }}</td>
                                                    <td>{{ $patient->email }}</td>
                                                    <td>{{ $patient->cin }}</td>


                                                    <td style="width: 120px">

                                                        <div class='btn-group'>
                                                            <a href="{{ route('patients.show', [$patient->id]) }}"
                                                                class='btn btn-default btn-sm'>
                                                                <i class="far fa-eye"></i>
                                                            </a>

                                                        </div>

                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>

                                    </table>


                            </div>
                            <div class="ml-4 mb-3">
                                <a href="{{ route('dossier-patients.parent', ['tuteur_id' => request('parentRadio')]) }}" class="btn btn-primary">@lang('crud.previous')</a>                                {{-- <a href="{{ route('dossier-patients.parent') }}" class="btn btn-primary">@lang('crud.previous')</a> --}}
                                <button id="next-button" class="btn btn-primary">@lang('crud.next')</button>

                            </div>
                            </form>
                            <div class="card-footer clearfix">
                                <div class="float-right">
                                    {{-- @include('adminlte-templates::common.paginate', ['records' => $patients]) --}}
                                </div>
                                <div class="float-left">
                                    <button type="button" class="btn btn-default swalDefaultQuestion">
                                        <i class="fas fa-download"></i> @lang('crud.export')
                                    </button>
                                    <button type="button" class="btn btn-default swalDefaultQuestion">
                                        <i class="fas fa-file-import"></i> @lang('crud.import')
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->

                    </div>
                    <!-- /.card -->

                </div>
            </div>
            <!-- /.card -->



    </section>
@endsection

@push('page_scripts')
    <script>
        const tableContainer = $('#table-container')
        var searchQuery = ''

        const search = (query = '', page = 1) => {
            $.ajax('{{ route('tuteurs.index') }}', {
                data: {
                    query: query,
                    page: page
                },
                success: (data) => updateTable(data)
            })
            history.pushState(null, null, '?query=' + query + '&page=' + page)
        }

        const updateTable = (html) => {
            tableContainer.html(html)
            updatePaginationLinks()
        }

        const updatePaginationLinks = () => {
            $('button[page-number]').each(function() {
                $(this).on('click', function() {
                    pageNumber = $(this).attr('page-number')
                    search(searchQuery, pageNumber)
                })
            })
        }

        $(document).ready(() => {
            $('[type="search"]').on('input', function() {
                searchQuery = $(this).val()
                search(searchQuery)
            })
            updatePaginationLinks()
            var patientId = {{ request('patient_id') ?: 'null' }};
    if (patientId) {
        $("input[name='patientRadio'][value='" + patientId + "']").prop('checked', true);
    }
        })
    </script>
@endpush
