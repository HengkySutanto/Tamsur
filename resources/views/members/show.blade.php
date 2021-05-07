@extends('layouts.main')
@section('title', 'Member Profile')
@section('bodyClass', 'show-member')
    <style>
        :root {
            --main-color: #4a76a8;
        }

        .bg-main-color {
            background-color: var(--main-color);
        }

        .text-main-color {
            color: var(--main-color);
        }

        .border-main-color {
            border-color: var(--main-color);
        }

    </style>

@section('content')


    <div class="bg-gray-50">
        <div class="container mx-auto p-5">
            <div class="md:flex no-wrap md:-mx-2 ">
                <!-- Left Side -->
                <div class="w-full md:w-3/12 md:mx-2">
                    <!-- Profile Card -->
                    <div class="bg-gray-200 p-3 border-t-4 border-green-400" style="height: 100%">
                        <div class="image overflow-hidden">
                            {{-- <img class="h-auto w-full mx-auto"
                                src="https://lavinephotography.com.au/wp-content/uploads/2017/01/PROFILE-Photography-112.jpg"
                                alt=""> --}}
                            <img src="/images/{{ $student->photo }}" class="h-auto max-h-52 w-full mx-auto object-cover object-center" alt="{{ $student->name }}">
                        </div>
                        <h1 class="text-gray-900 font-bold text-xl text-center leading-8 my-1">{{ $student->name }}</h1>
                        {{-- <h3 class="text-gray-600 font-lg text-semibold leading-6">{{ $student->phone }}</h3>
                        <p class="text-sm text-gray-500 hover:text-gray-600 leading-6">{{ $student->address}}</p>
                        <ul
                            class="bg-gray-100 text-gray-600 hover:text-gray-700 hover:shadow py-2 px-3 mt-3 divide-y rounded shadow-sm">
                            <li class="flex items-center py-3">
                                <span>Status</span>
                                <span class="ml-auto"><span
                                        class="bg-green-500 py-1 px-2 rounded text-white text-sm">{{ $student->status }}</span></span>
                            </li>
                            <li class="flex items-center py-3">
                                <span>Member since</span>
                                <span class="ml-auto">{{ $student->created_at->format('M Y') }}</span>
                            </li>
                        </ul> --}}
                    </div>
                </div>
                <!-- Right Side -->
                <div class="w-full md:w-9/12 mx-2">
                    <!-- Profile tab -->
                    <!-- About Section -->
                    <div class="bg-white p-3 shadow-sm rounded-sm">
                        <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8">
                            <span clas="text-green-500">
                                <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </span>
                            <span class="tracking-wide">Detail Informations</span>
                        </div>
                        <div class="text-gray-700">
                            <div class="grid md:grid-cols-2 text-sm">
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Nama Lengkap</div>
                                    <div class="px-4 py-2">{{ $student->name }}</div>
                                </div>
                                {{-- <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Gender</div>
                                    <div class="px-4 py-2">{{ $student->status }}</div>
                                </div> --}}
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">No. Register</div>
                                    <div class="px-4 py-2">{{ $student->reg_number }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Phone</div>
                                    <div class="px-4 py-2">{{ $student->phone }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Geup</div>
                                    <div class="px-4 py-2">{{ $student->geup }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Current Address</div>
                                    <div class="px-4 py-2">{{ $student->address }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Birthday</div>
                                    <div class="px-4 py-2">{{ $student->place_of_birth }}, {{ $student->date_of_birth }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Status</div>
                                    <div class="px-4 py-2">{{ $student->status }}</div>
                                </div>
                                <div class="grid grid-cols-2">
                                    <div class="px-4 py-2 font-semibold">Member Since</div>
                                    <div class="px-4 py-2">{{ $student->created_at->format('M Y') }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of about section -->

                    <div class="my-4"></div>

                    <!-- Experience and education -->
                    <div class="bg-white p-3 shadow-sm rounded-sm">

                        <div class="md:flex no-wrap">
                            <div class="w-full md:w-8/12 mb-8 md:mb-0">
                                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                    <span clas="text-green-500">
                                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                                        </svg>
                                    </span>
                                    <span class="tracking-wide">Attendances</span>
                                </div>
                                <div class="list-inside space-y-2 max-h-52 overflow-y-auto px-5 mr-5">
                                    <table class="w-full">
                                        @foreach ($student->attendances as $attendance)
                                            <tr class="border-b">
                                                <td class="text-gray-500 text-xs">{{ $attendance->attendance_date }}</td>
                                                <td class="text-gray-500 text-xs text-right">{{ $attendance->status }}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                        {{-- <li>
                                            <div class="text-teal-600">Tanggal Latihan: {{ $attendance->attendance_date }}</div>
                                            <div class="text-gray-500 text-xs">Status - {{ $attendance->status }}</div>
                                        </li> --}}
                                </div>
                            </div>
                            <div class="w-full md:w-8/12">
                                <div class="flex items-center space-x-2 font-semibold text-gray-900 leading-8 mb-3">
                                    <span clas="text-green-500">
                                        <svg class="h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path fill="#fff" d="M12 14l9-5-9-5-9 5 9 5z" />
                                            <path fill="#fff"
                                                d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222" />
                                        </svg>
                                    </span>
                                    <span class="tracking-wide">Summary</span>
                                </div>
                                <div class="list-inside space-y-2 max-h-52 overflow-y-auto px-5">
                                    <table class="w-full">
                                            @foreach ($studentAttendances as $reports)
                                            <tr class="border-b">
                                                <td class="text-gray-500 text-xs">Jumlah Sesi:</td>
                                                <td class="text-gray-500 text-xs text-right">{{ $reports->jumlah_sesi_latihan }}</td>
                                            </tr>
                                            <tr class="border-b">
                                                <td class="text-gray-500 text-xs">Jumlah Alpa:</td>
                                                <td class="text-gray-500 text-xs text-right">{{ $reports->total_alpa }}</td>
                                            </tr>
                                            <tr class="border-b">
                                                <td class="text-gray-500 text-xs">Jumlah Terlambat:</td>
                                                <td class="text-gray-500 text-xs text-right">{{ $reports->total_telat }}</td>
                                            </tr>
                                            <tr class="border-b">
                                                <td class="text-gray-500 text-xs">Persentase Kehadiran:</td>
                                                <td class="text-gray-500 text-xs text-right">{{ $reports->persen_kehadiran }}%</td>
                                            </tr>
                                            <tr class="border-b">
                                                <td class="text-gray-500 text-xs">Persentase Keterlambatan:</td>
                                                <td class="text-gray-500 text-xs text-right">{{ $reports->persen_telat }}%</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- End of Experience and education grid -->
                    </div>
                    <!-- End of profile tab -->
                </div>
            </div>
        </div>
    </div>
@endsection
