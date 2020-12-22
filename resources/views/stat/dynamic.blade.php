@extends('layouts.app')

@section('content')
    <div class="pt-6">
        <h1 class="text-3xl pb-6 font-bold leading-tight text-gray-900">
            Project {{ $project->name}} dynamic
        </h1>

        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">

                        @foreach($rows as $row)
                            <h2 class="text-1xl pr-6 pl-6 pt-6 font-bold leading-tight text-gray-900">
                                {{ $row['region']}}
                            </h2>
                        <table class="min-w-full pb-10 divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                @foreach($row['header'] as $header)
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ $header }}
                                    </th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach($row['data'] as $row)
                                        <tr>
                                            @foreach($row as $value)
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $value }}
                                                </td>
                                            @endforeach
                                        </tr>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                            <hr>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
@endsection
