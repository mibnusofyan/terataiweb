@extends('layouts.main')

@section('title', 'Dashboard - Menara Teratai Purwokerto')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-2xl font-semibold mb-4">{{ __('Dashboard') }}</h2>
                <p>{{ __("You're logged in!") }}</p>
                <p class="mt-4">Selamat datang di dashboard Menara Teratai Purwokerto.</p>
                {{-- Anda bisa menambahkan konten dashboard lainnya di sini --}}
            </div>
        </div>
    </div>
</div>
@endsection