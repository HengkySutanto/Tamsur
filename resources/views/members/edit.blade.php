@extends('layouts.main')
@section('title', 'Edit Member')
@section('bodyClass', 'members edit-member')

@section('content')
    <div class="container mx-auto px-4">
        <form class="max-w-2xl mt-10" action="{{ route('members.update', $student->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method("PUT")
            @if (session('failed'))
            <!-- Toast Notification Failed-->
                <div id="session-notif"
                    class="flex items-center justify-between bg-red-500 border-l-4 border-red-700 py-2 px-3 shadow-md mb-2">
                    <div class="notif-sign flex items-center">
                        <!-- icons -->
                        <div class="text-red-500 rounded-full bg-white mr-3">
                            <svg width="1.8em" height="1.8em" viewBox="0 0 16 16" class="bi bi-check" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
                            </svg>
                        </div>
                        <!-- message -->
                        <div class="text-white max-w-xs ">
                            {{ session('failed') }}
                        </div>
                    </div>
                    <div class="close-notif font-bold text-white cursor-pointer" onclick="hideSessionNotif('session-notif')">
                        X
                    </div>
                </div>
            @endif

            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Nama Lengkap
                    </label>
                </div>
                <div class="md:w-2/3">
                    <input name="name"
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        id="inline-full-name" type="text" value="{{ $student->name }}">
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
                        id="inline-full-name" type="text" value="{{ $student->address }}">
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
                            id="inline-full-name" type="text" value="{{ $student->place_of_birth }}">
                    </div>
                    <div class="w-3/5">
                        <input name="date_of_birth"
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                            id="inline-full-name" type="date" value="{{ $student->date_of_birth }}">
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
                        id="inline-full-name" type="text" value="{{ $student->phone }}">
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
                        id="inline-full-name" type="number" value="{{ $student->geup }}">
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
                        id="inline-full-name" type="text" value="{{ $student->reg_number }}">
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Status
                    </label>
                </div>
                <div class="md:w-2/3">
                    <select name="status" id="status" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500">
                        <option value="" {{ $student->status === '' || $student->id === null ? "selected" : ""}}></option>
                        <option value="aktif" {{ $student->status === 'aktif' ? "selected" : ""}}>Aktif</option>
                        <option value="non-aktif" {{ $student->status === 'non-aktif' ? "selected" : ""}}>Non-Aktif</option>
                        <option value="suspended" {{ $student->status === 'suspended' ? "selected" : ""}}>Suspended</option>
                    </select>
                </div>
            </div>
            <div class="md:flex mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold mt-3 mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Photo
                    </label>
                </div>
                <div class="md:w-2/3 flex">
                    @if ($student->photo)
                        <img src="/images/{{ $student->photo }}" class="md:w-1/4 mr-2 mx-auto" alt="{{ $student->name }} tkd tamsur"
                            width="120px">
                    @endif
                    <div class="input-file-wrapper flex-grow">
                        <input type="file" name="photo"
                            class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight"
                            placeholder="image">
                    </div>
                </div>
            </div>

            <div class="md:flex md:items-center">
                <button
                    class="shadow w-full bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                    type="submit">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
