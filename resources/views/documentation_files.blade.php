@@extends('app')

@section('title', 'Documentation Files')

@section('content')

<form action="/documentations" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    <div>
        <label class="block text-sm font-medium text-gray-700">Nama Dokumen/Gambar</label>
        <input type="text" name="title" class="mt-1 block w-full border rounded p-2" required>
    </div>

    <div>
        <label class="block text-sm font-medium text-gray-700">Pilih File (PDF, DOCX, PNG, JPG - Maks 2MB)</label>
        <input type="file" name="attachment" class="mt-1 block w-full text-sm text-gray-500 file:mr-4" file:py-2 file:px-4 file:rounded file:border file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" required>
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Unggah File</button>
</form>

@endsection