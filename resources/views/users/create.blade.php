@extends('layout.app')
@section('title')
    add user
@endsection
@section('content')
    <div class="w-full h-[88%] bg-gray-200 flex items-center justify-center">
        <div class="w-[90%] h-5/6 bg-white rounded-xl pt-3 flex flex-col items-center">
            <div class="w-[90%] h-1/5 flex justify-end items-center border-b">
                <h2 class="text-xl">add user</h2>
            </div>
            <div class="flex w-full h-4/5">
                <form action="{{route('users.store')}}" method="post" class="w-full h-full flex flex-row-reverse">
                    @csrf
                    <div class="w-1/2 h-full flex flex-col items-end pr-20 relative">
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="name" class="font-semibold ml-5">: name</label>
                            <input type="text" name="name" value="{{old('name')}}" id="name" class="w-2/5 h-8 rounded outline-0 p-2 border border-gray-400">
                            @error('name')
                            <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="email" class="font-semibold ml-5">: email</label>
                            <input type="email" name="email" value="{{old('email')}}" id="email" class="w-2/5 h-8 rounded outline-0 p-2 border border-gray-400">
                            @error('email')
                            <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="password" class="font-semibold ml-5">: password</label>
                            <input type="password" name="password" value="{{old('password')}}" id="password" class="w-2/5 h-8 rounded outline-0 p-2 border border-gray-400">
                            @error('password')
                            <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                        <input type="submit" value="Add" class="absolute bottom-2 -left-10 text-white bg-gray-700 py-3 px-7 cursor-pointer rounded">
                    </div>
                    <div class="w-1/2 h-full flex flex-col items-end pr-20">
                        <div class="w-5/6 h-auto flex flex-row-reverse justify-between pt-4 mb-6">
                            <label for="role" class="font-semibold ml-5">: role</label>
                            <select name="role" id="role" class="cursor-pointer w-2/5 h-8 rounded outline-0 pl-2 border border-gray-400">
                                <option value="user">user</option>
                                @can('change-role')
                                <option value="operator">operator</option>
                                @endcan
                            </select>
                            @error('role')
                            <p class="text-red-700">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
