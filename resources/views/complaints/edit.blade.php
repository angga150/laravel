<h1>Edit Complaint</h1>

<form action="{{ route('complaints.update', $complaint->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Kode Complaint:</label><br>
    <input type="text" name="code_complain" value="{{ $complaint->code_complain }}"><br>

    <label>Asal (origins):</label><br>
    <input type="text" name="origins" value="{{ $complaint->origins }}"><br>

    <label>Status:</label><br>
    <select name="status">
        <option value="0" {{ $complaint->status == 0 ? 'selected' : '' }}>Pending</option>
        <option value="1" {{ $complaint->status == 1 ? 'selected' : '' }}>Selesai</option>
    </select><br>

    <label>User:</label><br>
    <select name="user_id">
        @foreach ($users as $user)
            <option value="{{ $user->id }}" {{ $complaint->user_id == $user->id ? 'selected' : '' }}>
                {{ $user->username }}
            </option>
        @endforeach
    </select><br><br>

    <button type="submit">Update</button>
</form>
<a href="{{ route('complaints.index') }}">Kembali</a>
