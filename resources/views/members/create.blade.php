@extends('layouts.main')
@section('title', 'Create Member')
@section('bodyClass', 'members create-member')

@section('content')
    <div class="container mx-auto px-4">
        <form class="max-w-2xl mt-10" action="{{ route('members') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Nama Lengkap
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input name="name"
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="inline-full-name" type="text">
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Alamat
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input name="address"
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="inline-full-name" type="text">
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Tempat / Tanggal Lahir
                    </label>
                </div>
                <div class="md:w-2/3 flex">
                    <div class="w-2/5 mr-5">
                        <input name="place_of_birth"
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                            id="inline-full-name" type="text">
                    </div>
                    <div class="w-3/5">
                        <input name="date_of_birth"
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                            id="inline-full-name" type="date">
                    </div>
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Handphone
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input name="phone"
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="inline-full-name" type="text">
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Geup
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input name="geup"
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="inline-full-name" type="number" value='10'>
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4" for="inline-full-name">
                        No Register
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input name="reg_number"
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="inline-full-name" type="text">
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Photo
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input type="file" name="photo" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight" placeholder="image">
                </div>
            </div>
            <input name="status" id="inline-full-name" type="hidden" value="aktif">
            
            <div class="md:flex md:items-center">
                <button
                    class="shadow w-full bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                    type="submit">
                    Tambahkan
                </button>
            </div>
        </form>
    </div>
@endsection
