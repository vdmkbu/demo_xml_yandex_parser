@extends('layouts.app')

@section('content')
    <div class="pt-6">
        <h1 class="text-3xl font-bold leading-tight text-gray-900">
            Edit project {{ $project->name }}
        </h1>
        <hr>

        <form class="w-full max-w-lg pt-6 pb-10" method="POST" action="{{ route('projects.update', $project) }}">
            @csrf
            @method('PUT')

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="name">
                        Project Name
                    </label>
                    <input required name='name' value='{{ old('name', $project->name) }}' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="name" type="text">
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
                    <input required name='host' value='{{ old('host', $project->host) }}' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="host" type="text">
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
                        <input name="regions[]" {{ in_array($region->id, $selected_regions) ? 'checked' : '' }} type="checkbox" value="{{ $region->id }}"> {{ $region->region }}
                    @endforeach

                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="host">
                        Words
                    </label>
                    <textarea required name="words" rows="3" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">@foreach($project->words as $word){{ $word->word . PHP_EOL }}@endforeach</textarea>
                    <p class="text-blue-600 text-xs">"Enter" for new string</p>
                </div>
            </div>

            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                        Status
                    </label>
                    <select name='active' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                        @foreach($statuses as $value => $status)
                            <option {{ $value == $project->active ? 'selected': '' }} value="{{ $value }}">{{ $status }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('active'))
                        <p class="text-red-600 text-xs italic">{{ $errors->first('active') }}</p>
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
