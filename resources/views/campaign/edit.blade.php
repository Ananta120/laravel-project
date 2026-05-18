<h1>Edit Campaign</h1>

<form action="/campaign/{{ $campaign->id }}" method="POST">
    @csrf
    @method('PUT')

    <p>Title</p>
    <input type="text" name="title"
        value="{{ $campaign->title }}">

    <p>Description</p>
    <textarea name="description">{{ $campaign->description }}</textarea>

    <p>Target Donation</p>
    <input type="number" name="target_donation"
        value="{{ $campaign->target_donation }}">

    <p>Collected Donation</p>
    <input type="number" name="collected_donation"
        value="{{ $campaign->collected_donation }}">

    <p>Deadline</p>
    <input type="date" name="deadline"
        value="{{ $campaign->deadline }}">

    <br><br>

    <button type="submit">
        Update
    </button>
</form>