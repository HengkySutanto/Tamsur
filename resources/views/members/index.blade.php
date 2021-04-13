@extends('layouts.main')
@section('title', 'Members')
@section('bodyClass', 'members')

@section('content')

        <div class="container mx-auto px-4 sm:px-8">            
            <div class="py-8">
                <div>
                    <h2 class="text-2xl font-semibold leading-tight">Member Tamsur</h2>
                </div>
                <div class="my-2 flex sm:flex-row flex-col">
                    <div class="flex flex-row mb-1 sm:mb-0">
                        <div class="relative">
                            <select
                                class="appearance-none h-full rounded-l border block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
                                <option>5</option>
                                <option>10</option>
                                <option>20</option>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                        <div class="relative">
                            <select
                                class="appearance-none h-full rounded-r border-t sm:rounded-r-none sm:border-r-0 border-r border-b block appearance-none w-full bg-white border-gray-400 text-gray-700 py-2 px-4 pr-8 leading-tight focus:outline-none focus:border-l focus:border-r focus:bg-white focus:border-gray-500">
                                <option>All</option>
                                <option>Active</option>
                                <option>Inactive</option>
                            </select>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="block relative">
                        <span class="h-full absolute inset-y-0 left-0 flex items-center pl-2">
                            <svg viewBox="0 0 24 24" class="h-4 w-4 fill-current text-gray-500">
                                <path
                                    d="M10 4a6 6 0 100 12 6 6 0 000-12zm-8 6a8 8 0 1114.32 4.906l5.387 5.387a1 1 0 01-1.414 1.414l-5.387-5.387A8 8 0 012 10z">
                                </path>
                            </svg>
                        </span>
                        <input placeholder="Search"
                            class="appearance-none rounded-r rounded-l sm:rounded-l-none border border-gray-400 border-b block pl-8 pr-6 py-2 w-full bg-white text-sm placeholder-gray-400 text-gray-700 focus:bg-white focus:placeholder-gray-600 focus:text-gray-700 focus:outline-none" />
                    </div>
                    
                    <div class="actions flex items-center ml-auto">
                        <a href="/members/create" class="btn-add-member bg-green-600 text-green-100 hover:bg-green-700 cursor-pointer rounded-2xl py-1 px-3">
                            Tambah Member
                        </a>
                    </div>
                </div>
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    @if (session('success'))
                        <!-- Toast Notification Success-->
                        <div class="flex items-center justify-between bg-green-500 border-l-4 border-green-700 py-2 px-3 shadow-md mb-2">
                            <div class="notif-sign flex items-center">
                                <!-- icons -->
                                <div class="text-green-500 rounded-full bg-white mr-3">
                                    <svg width="1.8em" height="1.8em" viewBox="0 0 16 16" class="bi bi-check" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z"/>
                                    </svg>
                                </div>
                                <!-- message -->
                                <div class="text-white max-w-xs ">
                                    {{ session('success') }}
                                </div>
                            </div>
                            {{-- <div class="close-notif font-bold text-white cursor-pointer">
                                X
                            </div> --}}
                        </div>
                    @endif
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider text-center"><i class="fas fa-bars"></i></th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Nama
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Alamat
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        TTL
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Geup
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        No Reg
                                    </th>
                                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        Status
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                <tr>
                                    <th class="px-5 py-5 border-b border-gray-200 bg-white text-sm text-gray-400 relative">
                                        <i class="fas fa-cog" onclick="showItemMenu({{ $student->id }})"></i>
                                        <div id="_{{ $student->id }}" class="item-menu absolute z-10 cursor-pointer top-1 -right-16 bg-white shadow-lg border rounded-md hidden">
                                            <ul>
                                                <li class="px-4 py-1 hover:bg-gray-200 border-b">Edit</li>
                                                <li class="px-4 py-1 hover:bg-gray-200">
                                                    <form action="{{ route('members.destroy', $student->id) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="font-bold">Delete</button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </th>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <a href="{{ route('members.show', $student->id) }}">
                                        <div class="flex items-center">
                                                <div class="flex-shrink-0 w-10 h-10">
                                                    @if ($student->photo)
                                                        <img src="/images/{{ $student->photo }}" class="w-full h-full rounded-full" alt="{{ $student->name }}">
                                                    @endif
                                                </div>
                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                        {{ $student->name }}
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $student->address }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $student->place_of_birth }}, {{ $student->date_of_birth }}
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            @if ( $student->geup === 10 )
                                                Putih
                                            @elseif ( $student->geup === 9 )
                                                Kuning
                                            @elseif ( $student->geup === 8 )
                                                Kuning Strip
                                            @elseif ( $student->geup === 7 )
                                                Hijau
                                            @elseif ( $student->geup === 6 )
                                                Hijau Strip
                                            @elseif ( $student->geup === 5 )
                                                Biru
                                            @elseif ( $student->geup === 4 )
                                                Biru Strip
                                            @elseif ( $student->geup === 3 )
                                                Merah
                                            @elseif ( $student->geup === 2 )
                                                Merah Strip 1
                                            @else
                                                Merah strip 2
                                            @endif
                                        </p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $student->reg_number }}</p>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <span
                                            class="relative inline-block px-3 py-1 font-semibold @if($student->status === 'aktif') text-green-900 @elseif($student->status === 'non-aktif') text-red-900 @else text-gray-900 @endif leading-tight">
                                            <span aria-hidden
                                                class="absolute inset-0 @if($student->status === 'aktif') bg-green-200 @elseif($student->status === 'non-aktif') bg-red-200 @else bg-gray-200 @endif opacity-50 rounded-full"></span>
                                            <span class="relative">{{ $student->status }}</span>
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{-- <div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between          ">
                            <span class="text-xs xs:text-sm text-gray-900">
                                Showing 1 to 4 of 50 Entries
                            </span>
                            <div class="inline-flex mt-2 xs:mt-0">
                                <button
                                    class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-l">
                                    Prev
                                </button>
                                <button
                                    class="text-sm bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-2 px-4 rounded-r">
                                    Next
                                </button>
                            </div>
                        </div> --}}
                    </div>
                    @if ($students->count())
                        {{ $students->links() }}
                    @endif
                </div>
            </div>
        </div>
@endsection
