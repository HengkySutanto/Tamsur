@extends('layouts.main')
@section('title', 'Attendances')
@section('bodyClass', 'attendances')

@section('content')

    <div class="px-4 sm:px-8 pb-8">
        <div class="py-8">
            <div>
                <h2 class="text-3xl text-center font-semibold leading-tight">Absensi Tamsur</h2>
            </div>
        </div>

        <div class="btn-add-session text-right">
            <form action="{{ route('sessions.store') }}" method="post">
                @csrf
                <input type="date" name="session_date" id="session-date" hidden value="{{ date('Y-m-d') }}" />
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-8 border-b-4 border-blue-700 hover:border-blue-500 rounded">Tambah
                    Sesi</button>
            </form>
        </div>

        <div class="py-4 overflow-auto">
            @if (session('success'))
                <!-- Toast Notification Success-->
                <div id="session-notif"
                    class="flex items-center justify-between bg-green-500 border-l-4 border-green-700 py-2 px-3 shadow-md mb-2">
                    <div class="notif-sign flex items-center">
                        <!-- icons -->
                        <div class="text-green-500 rounded-full bg-white mr-3">
                            <svg width="1.8em" height="1.8em" viewBox="0 0 16 16" class="bi bi-check" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.236.236 0 0 1 .02-.022z" />
                            </svg>
                        </div>
                        <!-- message -->
                        <div class="text-white max-w-xs ">
                            {{ session('success') }}
                        </div>
                    </div>
                    <div class="close-notif font-bold text-white cursor-pointer"
                        onclick="hideSessionNotif('session-notif')">
                        X
                    </div>
                </div>
            @endif

            <div class="inline-block min-w-full shadow rounded-lg relative">
                <div class="table-wrapper">
                    <table class="min-w-full leading-normal overflow-auto shadow-lg">
                        <thead>
                            <tr>
                                <th
                                    class="header px-3 py-3 border-b-2 border-gray-400 bg-gray-300 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Nama
                                </th>
                                @foreach ($sessions as $session)
                                    <th
                                        class="border-b-2 border-r border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                        <form action="{{ route('sessions.delete', $session->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <input type="hidden" name="session_date" value="{{ $session->session_date }}">
                                            <div class="py-1 bg-blue-50 text-sm relative flex items-center justify-center">
                                                {{ date('d-M', strtotime($session->session_date)) }}
                                                @if (!\Carbon\Carbon::parse($session->session_date)->isToday())
                                                    <i id="{{ 'toggle-' . $session->session_date }}"
                                                        class="fas fa-pencil-alt absolute left-3"
                                                        onclick="activateEditSession({{ $session }})"></i>
                                                @else
                                                    <button type="submit" class="absolute right-3">
                                                        <i class="fas fa-trash-alt text-red-700 "></i>
                                                    </button>
                                                @endif
                                            </div>
                                        </form>
                                        <div class="flex">
                                            <div class="w-1/2 px-2 text-center bg-green-200">Hadir</div>
                                            <div class="w-1/2 px-2 text-center bg-yellow-300">Telat</div>
                                        </div>
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <form action="{{ route('attendances.store') }}" method="post">
                                @csrf
                                @foreach ($attendances as $student)
                                    <tr>
                                        <td class="header px-3 py-2 border-b border-gray-300 text-sm {{ $loop->iteration % 2 == 0 ? 'bg-gray-100' : 'bg-gray-200' }}">
                                            <a href="{{ route('members.show', $student[0]->student_id) }}">
                                                <p class="headcol text-gray-900 whitespace-no-wrap student-name">
                                                    {{ $student[0]->name }}
                                                </p>
                                            </a>
                                        </td>
                                        {{-- @if ()
                                            
                                        @endif --}}
                                        @foreach ($sessions as $session)
                                            @if (in_array($session->session_date, $student->pluck('attendance_date')->toArray()))
                                                @foreach ($student as $attender)
                                                    @if ($session->session_date == $attender->attendance_date)
                                                        <td
                                                            class="long scroll-col py-2 border-b border-r border-gray-200 text-sm {{ $loop->parent->parent->iteration % 2 == 0 ? 'bg-white' : 'bg-gray-100' }}">
                                                            {{-- class="long scroll-col py-2 border-b border-r border-gray-200 text-sm"> --}}
                                                            <input type="hidden" name="sessions[]" value={{ $session->id }} />
                                                            <div class="text-gray-900 whitespace-no-wrap flex">
                                                                <div class="w-1/2 px-2 text-center">
                                                                    <input type="checkbox"
                                                                        id="{{ $session->id }}-{{ $student[0]->student_id }}"
                                                                        name="session_id_{{ $session->id }}[]"
                                                                        value="{{ $attender->student_id }}"
                                                                        {{ \Carbon\Carbon::parse($session->session_date)->isToday() ? '' : 'disabled' }}
                                                                        {{ $attender->status == "checked" || $attender->status == "telat" ? "checked" : "" }}>
                                                                </div>
                                                                <div class="w-1/2 px-2 text-center">
                                                                    <input type="checkbox"
                                                                        id="{{ $session->id }}-{{ $student[0]->student_id }}-telat"
                                                                        name="session_id_{{ $session->id }}_telat[]"
                                                                        value="{{ $attender->student_id }}"
                                                                        {{ \Carbon\Carbon::parse($session->session_date)->isToday() ? '' : 'disabled' }}
                                                                        {{ $attender->status == "telat" ? "checked" : "" }}
                                                                        onclick="toggleTelat({{ $session->id }}, {{ $student[0]->student_id }})">
                                                                </div>
                                                            </div>
                                                        </td>
                                                    @endif
                                                @endforeach
                                            @else
                                                @if (\Carbon\Carbon::parse($session->session_date)->isToday())
                                                    <td
                                                        class="long scroll-col py-2 border-b border-r border-gray-200 text-sm {{ $loop->parent->iteration % 2 == 0 ? 'bg-white' : 'bg-gray-100' }}">
                                                        {{-- class="long scroll-col py-2 border-b border-r border-gray-200 text-sm"> --}}
                                                        <input type="hidden" name="sessions[]" value={{ $session->id }} />
                                                        <div class="text-gray-900 whitespace-no-wrap flex">
                                                            <div class="w-1/2 px-2 text-center">
                                                                <input type="checkbox"
                                                                    id="{{ $session->id }}-{{ $student[0]->student_id }}"
                                                                    name="session_id_{{ $session->id }}[]"
                                                                    value="{{ $student[0]->student_id }}"
                                                                    {{ \Carbon\Carbon::parse($session->session_date)->isToday() ? '' : 'disabled' }}>
                                                            </div>
                                                            <div class="w-1/2 px-2 text-center">
                                                                <input type="checkbox"
                                                                    id="{{ $session->id }}-{{ $student[0]->student_id }}-telat"
                                                                    name="session_id_{{ $session->id }}_telat[]"
                                                                    value="{{ $student[0]->student_id }}"
                                                                    {{ \Carbon\Carbon::parse($session->session_date)->isToday() ? '' : 'disabled' }}
                                                                    onclick="toggleTelat({{ $session->id }}, {{ $student[0]->student_id }})">
                                                            </div>
                                                        </div>
                                                    </td>
                                                @else
                                                    <td
                                                        class="long scroll-col py-2 border-b border-r  bg-gray-600 border-gray-200 text-sm">
                                                        <div class="text-white whitespace-no-wrap flex justify-center">
                                                            no attendances
                                                        </div>
                                                    </td>
                                                @endif
                                            @endif
                                        @endforeach
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="mt-6">
                <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-24 border-b-4 border-blue-700 hover:border-blue-500 rounded">Submit</button>
            </div>
            </form>
            {{-- @if ($students->count())
                {{ $students->links() }}
            @endif --}}
        </div>
    </div>
@endsection
