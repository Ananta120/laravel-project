@extends('layouts.app')

@section('content')

<div class="bg-gradient-to-r from-green-600 to-green-400 rounded-2xl p-10 text-white shadow-lg mb-8">

    <h1 class="text-5xl font-bold mb-4">
        Bantu Anak Panti Asuhan
    </h1>

    <p class="text-lg mb-6">
        Setiap bantuan yang Anda berikan sangat berarti bagi masa depan mereka.
    </p>

    <a href="/campaign/create"
       class="bg-white text-green-700 px-6 py-3 rounded-xl font-semibold">
       + Buat Program Bantuan
    </a>

</div>

<h2 class="text-3xl font-bold mb-6">
    Daftar Program Bantuan
</h2>

<div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

    <div class="lg:col-span-2 space-y-5">

        @foreach($campaigns as $c)

        @php
            $persen = 0;

            if($c->target_donation > 0){
                $persen = ($c->collected_donation / $c->target_donation) * 100;
            }
        @endphp

        <div class="bg-white rounded-2xl shadow p-5">

            <div class="flex justify-between items-start">

                <div>
                    <h2 class="text-2xl font-bold text-green-700">
                        {{ $c->title }}
                    </h2>

                    <p class="text-gray-600 mt-2">
                        {{ $c->description }}
                    </p>
                </div>

                <div class="text-sm text-gray-500">
                    {{ $c->deadline }}
                </div>

            </div>

            <div class="mt-4">

                <div class="w-full bg-gray-200 rounded-full h-4">

                    <div class="bg-green-500 h-4 rounded-full"
                        style="width: {{ $persen }}%">
                    </div>

                </div>

                <div class="flex justify-between mt-2 text-sm">

                    <span>
                        Rp {{ number_format($c->collected_donation,0,',','.') }}
                    </span>

                    <span>
                        {{ number_format($persen,0) }}%
                    </span>

                </div>

                <p class="text-gray-500 text-sm mt-1">
                    Target Rp {{ number_format($c->target_donation,0,',','.') }}
                </p>

            </div>

            <div class="mt-5 flex gap-3">

                <a href="/campaign/{{ $c->id }}/edit"
                   class="bg-yellow-500 text-white px-4 py-2 rounded-xl">
                    Edit
                </a>

                <form action="/campaign/{{ $c->id }}" method="POST">

                    @csrf
                    @method('DELETE')

                    <button class="bg-red-500 text-white px-4 py-2 rounded-xl">
                        Hapus
                    </button>

                </form>

            </div>

        </div>

        @endforeach

    </div>

    <div>

        <div class="bg-white rounded-2xl shadow p-6">

            <h3 class="text-2xl font-bold mb-5">
                Statistik Bantuan
            </h3>

            <div class="space-y-5">

                <div class="bg-green-50 p-4 rounded-xl">

                    <p class="text-gray-500">
                        Total Program
                    </p>

                    <h2 class="text-3xl font-bold text-green-700">
                        {{ $campaigns->count() }}
                    </h2>

                </div>

                <div class="bg-blue-50 p-4 rounded-xl">

                    <p class="text-gray-500">
                        Total Donasi
                    </p>

                    <h2 class="text-2xl font-bold text-blue-700">
                        Rp {{ number_format($campaigns->sum('collected_donation'),0,',','.') }}
                    </h2>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection