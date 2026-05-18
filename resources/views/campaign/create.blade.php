@extends('layouts.app')

@section('content')

<h1 class="text-3xl font-bold mb-5">
    Tambah Campaign Bantuan
</h1>

<form action="/campaign" method="POST"
      class="bg-white p-6 rounded-xl shadow">

    @csrf

    <input type="text"
           name="title"
           placeholder="Judul Campaign"
           class="border p-3 rounded-lg w-full mb-4">

    <textarea name="description"
              placeholder="Deskripsi Bantuan"
              class="border p-3 rounded-lg w-full mb-4"></textarea>

    <input type="number"
           name="target_donation"
           placeholder="Target Donasi"
           class="border p-3 rounded-lg w-full mb-4">

    <input type="number"
           name="collected_donation"
           placeholder="Donasi Terkumpul"
           class="border p-3 rounded-lg w-full mb-4">

    <input type="date"
           name="deadline"
           class="border p-3 rounded-lg w-full mb-4">

    <button class="bg-blue-600 text-white px-5 py-3 rounded-lg">
        Simpan Campaign
    </button>

</form>

@endsection