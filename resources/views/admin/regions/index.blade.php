@extends('layouts.app')

@section('content')

    @include('admin.partials.nav')

    <div class="pt-6 pb-6">
        <div class="mt-8 lex lg:mt-0 lg:flex-shrink-0">
            <div class="inline-flex rounded-md shadow">
                <a href="{{ route('admin.regions.import') }}" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700">
                    Upload file
                </a>
            </div>
        </div>
    </div>

    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Yandex_ID
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($regions as $region)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $region->id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $region->region }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $region->internal_id }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <a class="text-indigo-600 hover:text-indigo-900" href="{{ route('admin.regions.edit', $region) }}">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        <!-- More rows... -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
