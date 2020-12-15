@extends('layouts.app')

@section('content')

    @include('admin.partials.nav')

    <div class="pt-6 pb-6">
        <h1 class="text-3xl font-bold leading-tight text-gray-900">
            Import regions
        </h1>
        <hr>

                <form class="pt-6" enctype='multipart/form-data' method="POST" action="{{ route('admin.regions.upload') }}">
                    @csrf

                    <p><input type="file" name="file"/></p>

                    <div class="md:flex md:items-center">
                        <div class="md:w-1/3">
                            <button class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                                Import
                            </button>
                        </div>
                        <div class="md:w-2/3"></div>
                    </div>
                </form>

    </div>
@endsection
