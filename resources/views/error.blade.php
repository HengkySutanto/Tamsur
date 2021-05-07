@extends('layouts.main')
@section('title', 'ERROR')
@section('bodyClass', 'error font-sans antialiased text-gray-900 leading-normal tracking-wider bg-cover')
@section('navbar')
    <nav class="p-2 mt-0 fixed w-full z-10 top-0">
        <div class="container mx-auto flex flex-wrap items-center">
            <div class="flex w-full md:w-1/2 justify-center md:justify-start text-white font-extrabold">
                <a class="text-white no-underline hover:text-white hover:no-underline" href="/">
                    <span class="text-2xl pl-2"><i class="fas fa-smile-wink"></i> Taekwondo Tamsur</span>
                </a>
            </div>
            <div class="flex w-full pt-2 content-center justify-between md:w-1/2 md:justify-end">
                <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                <li class="mr-3">
                    <a class="inline-block py-2 px-4 text-white no-underline" href="/">Home</a>
                </li>
                <li class="mr-3">
                    <a class="inline-block text-gray-500 no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="{{ route('members') }}">Members</a>
                </li>
                </ul>
            </div>
        </div>
    </nav>
@endsection

@section('content')
    <h1 class="text-center mt-10">Error Page (Maximum 30 rows per page)</h1>
@endsection
