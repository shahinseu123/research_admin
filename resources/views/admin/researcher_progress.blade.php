@extends('admin.layout.master')

@section('title')
    <title>Researcher's progress</title>
@endsection

@section('main')
    <section class="bg-white">
        <div class="p-4 shadow-lg rounded-lg">
            <div class="flex justify-between text-white border-b-2 border_secondary pb-4 mb-4">
                <h1 class="text-3xl font-semibold text-gray-600">Researcher's progress</h1>
                <div>
                    <a class="px-5 py-2 rounded shadow bg-blue-600 text-white uppercase text-sm font-semibold"
                        href="{{ route('add-progress') }}">
                        <i class="fas fa-plus mr-2"></i>add progress</a>
                </div>
            </div>
            <div class="container mx-auto">
                <div class="flex flex-col">
                    <div class="w-full">
                        <div class="p-4 border-b border-gray-200 shadow">
                            <!-- <table> -->
                            <table id="dataTable2" class="p-4">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th style="text-align: left" class="p-8 text-xs text-left text-gray-500">
                                            #
                                        </th>
                                        <th style="text-align: left" class="p-8 text-xs text-left text-gray-500">
                                            Title
                                        </th>
                                        <th style="text-align: left" class="p-8 text-xs text-left text-gray-500">
                                            Date
                                        </th>
                                        <th style="text-align: left" class="p-8 text-xs text-left text-gray-500">
                                            Description of progress
                                        </th>

                                        <th class="px-6 py-2 text-right text-xs text-gray-500">
                                            Action
                                        </th>

                                    </tr>
                                </thead>
                                <tbody class="bg-white">
                                    @if ($progress)
                                        @foreach ($progress as $item)
                                            <tr class="whitespace-nowrap">
                                                <td class="px-6 py-4 text-sm  text-gray-500">
                                                    {{ $item->id }}
                                                </td>
                                                <td class="px-6 py-4 ">
                                                    <div class="text-sm text-gray-500">
                                                        {{ $item->title }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 ">
                                                    <div class="text-sm text-gray-500">
                                                        {{ $item->created_at->format('Y-m-d') }}
                                                    </div>
                                                </td>
                                                <td class="px-6 py-4 " style="max-width: 200px;overflow:hidden">
                                                    <div style=";" class="text-sm text-gray-500">
                                                        {!! $item->description !!}</div>
                                                </td>

                                                <td class="text-right">
                                                    <a href="{{ route('researh.show', $item->id) }}"><i
                                                            class="fas fa-eye text-red-500"></i></a>
                                                    <a href="{{ route('researh.edit', $item->id) }}"><i
                                                            class="fas fa-edit"></i></a>
                                                    <a href="{{ route('researh.delete', $item->id) }}"><i
                                                            class="fas fa-trash text-red-500"></i></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('head')
    <style>
        /*Overrides for Tailwind CSS */

        /*Form fields*/
        .dataTables_wrapper select,
        .dataTables_wrapper .dataTables_filter input {
            color: #4a5568;
            /*text-gray-700*/
            padding-left: 1rem;
            /*pl-4*/
            padding-right: 1rem;
            /*pl-4*/
            padding-top: .5rem;
            /*pl-2*/
            padding-bottom: .5rem;
            /*pl-2*/
            line-height: 1.25;
            /*leading-tight*/
            border-width: 2px;
            /*border-2*/
            border-radius: .25rem;
            border-color: #edf2f7;
            /*border-gray-200*/
            background-color: #edf2f7;
            /*bg-gray-200*/
        }

        /*Row Hover*/
        table.dataTable.hover tbody tr:hover,
        table.dataTable.display tbody tr:hover {
            background-color: #ebf4ff;
            /*bg-indigo-100*/
        }

        /*Pagination Buttons*/
        .dataTables_wrapper .dataTables_paginate .paginate_button {
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Pagination Buttons - Current selected */
        .dataTables_wrapper .dataTables_paginate .paginate_button.current {
            color: #fff !important;
            /*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            /*shadow*/
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            background: #667eea !important;
            /*bg-indigo-500*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Pagination Buttons - Hover */
        .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
            color: #fff !important;
            /*text-white*/
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
            /*shadow*/
            font-weight: 700;
            /*font-bold*/
            border-radius: .25rem;
            /*rounded*/
            background: #667eea !important;
            /*bg-indigo-500*/
            border: 1px solid transparent;
            /*border border-transparent*/
        }

        /*Add padding to bottom border */
        table.dataTable.no-footer {
            border-bottom: 1px solid #e2e8f0;
            /*border-b-1 border-gray-300*/
            margin-top: 0.75em;
            margin-bottom: 0.75em;
        }

        /*Change colour of responsive icon*/
        table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before,
        table.dataTable.dtr-inline.collapsed>tbody>tr>th:first-child:before {
            background-color: #667eea !important;
            /*bg-indigo-500*/
        }

        .dataTables_length {
            float: right !important;
        }

        .dataTable {
            width: 100% !important;
        }

        .paginate_button {
            padding: 6px 10px;
            border-radius: 50%;
            margin: 2px
        }
    </style>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#dataTable2').DataTable();

        });
    </script>
@endsection
