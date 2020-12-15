@extends('layouts.app')

@section('content')

    @include('admin.partials.nav')

    <div class="pt-6">
        <h1 class="text-3xl font-bold leading-tight text-gray-900">
            Edit region {{$region->name}}
        </h1>
        <hr>

        <form class="pt-6" method='post' action="{{ route('admin.regions.update', $region) }}">
            @csrf
            @method('PUT')
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nick">
                        Name
                    </label>
                    <input required name='region' value='{{ old('region', $region->region) }}' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="nick" type="text">
                    @if ($errors->has('region'))
                        <p class="text-red-600 text-xs italic">{{ $errors->first('region') }}</p>
                    @endif
                </div>
            </div>


            <div class="md:flex md:items-center">
                <div class="md:w-1/3">
                    <button class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                        Update
                    </button>
                </div>
                <div class="md:w-2/3"></div>
            </div>
        </form>

@endsection
