@extends('layouts.app')

@section('content')
    <div class="pt-6">
        <h1 class="text-3xl pb-6 font-bold leading-tight text-gray-900">
            Project {{ $project->name}} stat, requests: {{ $project->words->count() * $project->regions->count() }}
        </h1>

        <form class="w-full max-w-lg pt-6 pb-1" method="GET" action="">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                        Date
                    </label>
                    <input required name='date' value='{{ $date }}'
                           class="appearance-none block bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
                           id="name" type="text">
                </div>
            </div>
        </form>

        @if (count($positions))
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Word
                                </th>
                                @foreach($headers as $header)
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        {{ $header->region->region }}
                                    </th>
                                @endforeach
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($positions as $position)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        {{ $position['word'] }}
                                    </td>
                                    @foreach($position['positions'] as $pos)
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            @foreach($pos as $p => $diff)
                                                {{ $p }}
                                                @if ($diff)
                                                    <sup>{{ $diff }}</sup>
                                                @endif
                                            @endforeach
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    </div>

                    <button type="button" class="border border-indigo-500 bg-indigo-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-indigo-600 focus:outline-none focus:shadow-outline">
                        <a href="{{ route('projects.csv', [$project, $date]) }}">Load CSV</a></button>
                    <button type="button" class="border border-green-500 bg-green-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline">
                        <a href="{{ route('projects.dynamic', $project) }}">Dynamics</a></button>
                </div>
            </div>
        </div>
    @else
        ничего не найдено
    @endif
@endsection
