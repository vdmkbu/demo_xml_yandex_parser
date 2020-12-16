@extends('layouts.app')

@section('content')
    <div class="pt-6">
        <h1 class="text-3xl font-bold leading-tight text-gray-900">
            Add project
        </h1>
        <hr>

        <form class="w-full max-w-lg pt-6 pb-10" method="POST" action="{{ route('projects.store') }}">
            @csrf
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                        Project Name
                    </label>
                    <input required name='name' value='{{ old('name') }}' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="name" type="text">
                    @if ($errors->has('name'))
                        <p class="text-red-600 text-xs italic">{{ $errors->first('name') }}</p>
                    @endif
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="host">
                        Project Host
                    </label>
                    <input required name='host' value='{{ old('host') }}' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="host" type="text">
                    <p class="text-blue-600 text-xs">without scheme and www</p>
                    @if ($errors->has('host'))
                        <p class="text-red-600 text-xs italic">{{ $errors->first('host') }}</p>
                    @endif
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="host">
                        Regions
                    </label>

                    @foreach($regions as $region)
                        <input name="regions[]" type="checkbox" value="{{ $region->id }}"> {{ $region->region }}
                    @endforeach

                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="host">
                        Words
                    </label>
                <textarea required name="words" rows="3" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"></textarea>
                    <p class="text-blue-600 text-xs">"Enter" for new string</p>
                </div>
            </div>

            <div class="md:flex md:items-center">
                <div class="md:w-1/3">
                    <button class="shadow bg-teal-400 hover:bg-teal-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit">
                        Create
                    </button>
                </div>
                <div class="md:w-2/3"></div>
            </div>

        </form>
@endsection
