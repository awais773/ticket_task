@extends('layouts.admin')
@section('page-title')
    {{ __('Evaluation Report') }}
@endsection
@section('links')
    @if (\Auth::guard('client')->check())
        <li class="breadcrumb-item"><a href="{{ route('client.home') }}">{{ __('Home') }}</a></li>
    @else
        <li class="breadcrumb-item"><a href="{{ route('home') }}">{{ __('Home') }}</a></li>
    @endif
    <li class="breadcrumb-item"> {{ __('Evaluation  Report') }}</li>
@endsection
@section('action-button')
    @auth('web')
  <a href="#" class="btn btn-sm btn-primary filter" data-toggle="tooltip" title="{{ __('Filter') }}">
            <i class="ti ti-filter"></i>
        </a>
    @endauth
@endsection
@php

    $client_keyword = Auth::user()->getGuard() == 'client' ? 'client.' : '';
@endphp

@section('content')

    <!--  <div class="col-lg-12 projectreportdata p-0">
     </div> -->

    <div class="row  display-none" id="show_filter">
        <!--       <div class=" form-group col-3">
                <select class=" form-select" name="project" id="project">
                    <option value="">{{ __('All Projects') }}</option>
                    @foreach ($projects as $project)
        <option value="{{ $project->id }}">{{ $project->name }}</option>
        @endforeach
                </select>
            </div> -->
        @if ($currentWorkspace->permission == 'Owner' || Auth::user()->getGuard() == 'client')
            <div class="col-md-2 col-sm-6 pb-3">
                <select class="select2 form-select" name="all_users" id="all_users">
                    <option value="" class="px-4">{{ __('All Users') }}</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
        @endif

        {{-- <div class="col-md-2 col-sm-6 pb-3">
            <select class="select2 form-select" name="status" id="status">
                <option value="" class="px-4">{{ __('All Status') }}</option>

                <option value="Ongoing">{{ __('Ongoing') }}</option>
                <option value="Finished">{{ __('Finished') }}</option>
                <option value="OnHold">{{ __('OnHold') }}</option>

            </select>
        </div>


        <div class="form-group col-md-3 col-sm-6">
            <div class="input-group date ">
                <input class="form-control datepicker5" type="text" id="start_date" name="start_date" value=""
                    autocomplete="off" required="required" placeholder="{{ __('Start Date') }}">
                <span class="input-group-text">
                    <i class="feather icon-calendar"></i>
                </span>
            </div>
        </div>
        <div class="form-group col-md-3 col-sm-6">
            <div class="input-group date ">
                <input class="form-control datepicker4" type="text" id="end_date" name="end_date" value=""
                    autocomplete="off" required="required" placeholder="{{ __('End Date') }}">
                <span class="input-group-text">
                    <i class="feather icon-calendar"></i>
                </span>
            </div>
        </div> --}}
        <button class=" btn btn-primary col-1 btn-filter apply">{{ __('Apply') }}</button>
    </div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body table-border-style mt-3 mx-2">
                    <div class="table-responsive">
                        <table class="table selection-datatable px-4 mt-2" id="selection-datatable1">
                            <thead>
                                <tr>
                                    <th>{{ __('Employee Name') }}</th>
                                    <th>{{ __('Total Complete Project/month') }}</th>
                                    <th>{{ __('Total Complete Project/year') }}</th>
                                    <th>{{ __('Employee Promised/month') }}</th>
                                    <th>{{ __('Employee Promised/year') }}</th>
                                    <th>{{ __('Give Promotion') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->project_each_total_month }}</td>
                                    <td>{{ $user->project_each_total_year }}</td>
                                    <td>{{ $user->project_each_month }}</td>
                                    <td>{{ $user->project_each_year }}</td>
                                    <!-- Add more columns as needed for user data -->
                                    <td>  <a href="{{ route('graphShow.graphShow',[$currentWorkspace->slug,$user->id]) }}" class="action-btn btn-warning  btn btn-sm d-inline-flex align-items-center" data-toggle="tooltip" title="{{__('Graph')}}">
                                        <i class="ti ti-eye"></i>
                                       </a>
                                       <a href="#" class="dropdown-item" data-ajax-popup="true"
                                           data-size="md" data-title="{{ __('Add Promotion') }}"
                                           data-url="{{ route('users.addPromotionEdit', [$currentWorkspace->slug, $user->id]) }}"><i
                                               class="ti ti-edit"></i> <span>{{ __('Add Promotion') }}</span></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    </div>



@endsection
@push('css-page')
    <link rel="stylesheet" href="{{ asset('assets/custom/css/datatables.min.css') }}">
    <style>
        table.dataTable.no-footer {
            border-bottom: none !important;
        }

        .display-none {
            display: none !important;
        }
    </style>
@endpush

@push('scripts')
    <script>
        (function() {
            const d_week = new Datepicker(document.querySelector('.datepicker4'), {
                buttonClass: 'btn',
                todayBtn: true,
                clearBtn: true,
                format: 'yyyy-mm-dd',
            });
        })();
    </script>

    <script>
        (function() {
            const d_week = new Datepicker(document.querySelector('.datepicker5'), {
                buttonClass: 'btn',
                todayBtn: true,
                clearBtn: true,
                format: 'yyyy-mm-dd',
            });
        })();
    </script>
    <script src="{{ asset('assets/custom/js/jquery.dataTables.min.js') }}"></script>
    <script>
        const dataTable = new simpleDatatables.DataTable("#selection-datatable1");
    </script>


    <script type="text/javascript">
        $(".filter").click(function() {
            $("#show_filter").toggleClass('display-none');
        });
    </script>
    <script>
        $(document).ready(function() {

            var table = $("#selection-datatable1").DataTable({
                order: [],
                select: {
                    style: "multi"
                },
                "language": dataTableLang,
                drawCallback: function() {
                    $(".dataTables_paginate > .pagination").addClass("pagination-rounded")
                }
            });
            $(document).on("click", ".btn-filter", function() {

                getData();
            });

            // function getData() {
            //     table.clear().draw();
            //     $("#selection-datatable1 tbody tr").html(
            //         '<td colspan="11" class="text-center"> {{ __('Loading ...') }}</td>');

            //     var data = {
            //         status: $("#status").val(),
            //         start_date: $("#start_date").val(),
            //         end_date: $("#end_date").val(),
            //         all_users: $("#all_users").val(),
            //     };
            //     $.ajax({
            //         url: '{{ route($client_keyword . 'projects.ajax_data_report', [$currentWorkspace->slug]) }}',
            //         type: 'POST',
            //         data: data,
            //         success: function(data) {
            //             table.rows.add(data.data).draw(true);
            //             loadConfirm();
            //         },
            //         error: function(data) {
            //             show_toastr('Info', data.error, 'error')
            //         }
            //     })
            // }

            getData();

        });
    </script>
@endpush
