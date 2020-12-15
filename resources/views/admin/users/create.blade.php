@extends('layouts.app')

@section('content')
    @include('admin.partials.nav')

    <!-- component -->
    <div class="pt-6">
        <h1 class="text-3xl font-bold leading-tight text-gray-900">
            Add user
        </h1>
        <hr>
    <form class="w-full max-w-lg pt-6" method="POST" action="{{ route('admin.users.store') }}">
        @csrf
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="nick">
                    Name
                </label>
                <input required name='name' value='{{ old('name') }}' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="nick" type="text">
                @if ($errors->has('name'))
                <p class="text-red-600 text-xs italic">{{ $errors->first('name') }}</p>
                @endif
            </div>
        </div>
        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="email">
                    E-mail
                </label>
                <input required name='email' value='{{ old('email') }}' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" type="email">
                @if ($errors->has('email'))
                    <p class="text-red-600 text-xs italic">{{ $errors->first('email') }}</p>
                @endif
            </div>
        </div>

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="password">
                    Password
                </label>
                <input required name='password' value='{{ old('password') }}' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="password" type="text">
                @if ($errors->has('password'))
                    <p class="text-red-600 text-xs italic">{{ $errors->first('password') }}</p>
                @endif
            </div>
        </div>

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                   Role
                </label>
                <select name='role' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    @foreach($roles as $role)
                    <option value="{{ $role }}">{{ $role }}</option>
                    @endforeach
                </select>
                @if ($errors->has('role'))
                    <p class="text-red-600 text-xs italic">{{ $errors->first('role') }}</p>
                @endif
            </div>
        </div>

        <div class="flex flex-wrap -mx-3 mb-6">
            <div class="w-full px-3">
                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                    Status
                </label>
                <select name='active' class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                    @foreach($statuses as $value => $status)
                        <option value="{{ $value }}">{{ $status }}</option>
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
                    Create
                </button>
            </div>
            <div class="md:w-2/3"></div>
        </div>
    </form>
    </div>
@endsection
