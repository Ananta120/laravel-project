@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-lg p-8">

    <h1 class="text-3xl font-bold text-green-700 mb-6">
        Tambah Program Bantuan
    </h1>

    <form action="{{ url('/campaign') }}"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="mb-4">
            <label class="font-semibold">Judul Program</label>

            <input
                type="text"
                name="title"
                class="w-full border rounded-lg p-3 mt-2"
                required>
        </div>

        <div class="mb-4">
            <label class="font-semibold">Deskripsi</label>

            <textarea
                name="description"
                rows="4"
                class="w-full border rounded-lg p-3 mt-2"
                required></textarea>
        </div>

        <div class="grid grid-cols-2 gap-5">

            <div>
                <label class="font-semibold">Target Donasi</label>

                <input
                    type="number"
                    name="target_donation"
                    class="w-full border rounded-lg p-3 mt-2"
                    required>
            </div>

            <div>
                <label class="font-semibold">Donasi Terkumpul</label>

                <input
                    type="number"
                    name="collected_donation"
                    value="0"
                    class="w-full border rounded-lg p-3 mt-2">
            </div>

        </div>

        <div class="mt-5">
            <label class="font-semibold">Deadline</label>

            <input
                type="date"
                name="deadline"
                class="w-full border rounded-lg p-3 mt-2"
                required>
        </div>

        <div class="mt-5">
            <label class="font-semibold">
                Upload Dokumentasi
            </label>

            <input
                type="file"
                id="attachment"
                name="attachment"
                accept=".jpg,.jpeg,.png,.pdf,.doc,.docx"
                onchange="previewFile(event)"
                class="w-full border rounded-lg p-3 mt-2">

            <div id="preview" class="mt-5"></div>

        </div>

        <button
            class="mt-6 bg-green-600 hover:bg-green-700 text-white px-6 py-3 rounded-lg">

            Simpan Campaign

        </button>

    </form>

</div>

<script>

function previewFile(event){

    let file=event.target.files[0];

    let preview=document.getElementById('preview');

    preview.innerHTML="";

    if(!file) return;

    let ext=file.name.split('.').pop().toLowerCase();

    if(['jpg','jpeg','png'].includes(ext)){

        let img=document.createElement('img');

        img.src=URL.createObjectURL(file);

        img.className="w-72 rounded-xl border shadow";

        preview.appendChild(img);

    }

    else if(ext=="pdf"){

        let iframe=document.createElement('iframe');

        iframe.src=URL.createObjectURL(file);

        iframe.width="100%";

        iframe.height="450";

        preview.appendChild(iframe);

    }

    else{

        preview.innerHTML=
        "<div class='bg-gray-100 p-4 rounded'>📄 "+file.name+"</div>";

    }

}

</script>

@endsection