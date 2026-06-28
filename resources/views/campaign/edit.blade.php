@extends('layouts.app')

@section('content')

<div class="max-w-4xl mx-auto bg-white rounded-2xl shadow-lg p-8">

<h1 class="text-3xl font-bold text-green-700 mb-6">

Edit Campaign

</h1>

<form action="{{ url('/campaign/'.$campaign->id) }}"
method="POST"
enctype="multipart/form-data">

@csrf
@method('PUT')

<div class="mb-4">

<label>Judul</label>

<input
type="text"
name="title"
value="{{ $campaign->title }}"
class="w-full border rounded-lg p-3">

</div>

<div class="mb-4">

<label>Deskripsi</label>

<textarea
name="description"
rows="4"
class="w-full border rounded-lg p-3">{{ $campaign->description }}</textarea>

</div>

<div class="grid grid-cols-2 gap-5">

<div>

<label>Target Donasi</label>

<input
type="number"
name="target_donation"
value="{{ $campaign->target_donation }}"
class="w-full border rounded-lg p-3">

</div>

<div>

<label>Donasi Terkumpul</label>

<input
type="number"
name="collected_donation"
value="{{ $campaign->collected_donation }}"
class="w-full border rounded-lg p-3">

</div>

</div>

<div class="mt-5">

<label>Deadline</label>

<input
type="date"
name="deadline"
value="{{ $campaign->deadline }}"
class="w-full border rounded-lg p-3">

</div>

<div class="mt-6">

<h2 class="text-xl font-bold mb-3">

Dokumentasi Saat Ini

</h2>

@if($campaign->attachment)

@if(in_array(strtolower($campaign->file_type),['jpg','jpeg','png']))

<img
src="{{ asset('storage/'.$campaign->attachment) }}"
class="w-72 rounded-xl border shadow mb-4">

@elseif($campaign->file_type=="pdf")

<iframe
src="{{ asset('storage/'.$campaign->attachment) }}"
width="100%"
height="400">
</iframe>

@else

<a
href="{{ asset('storage/'.$campaign->attachment) }}"
target="_blank"
class="bg-blue-600 text-white px-4 py-2 rounded">

📄 Lihat File

</a>

@endif

@endif

</div>

<div class="mt-5">

<label>Ganti Dokumentasi</label>

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

Update Campaign

</button>

</form>

</div>

<script>

function previewFile(event){

let file=event.target.files[0];

let preview=document.getElementById('preview');

preview.innerHTML="";

if(!file)return;

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

preview.innerHTML="<div class='bg-gray-100 p-4 rounded'>📄 "+file.name+"</div>";

}

}

</script>

@endsection