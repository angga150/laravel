<h1>Tambah Complaint</h1>

<form action="{{ route('complaints.store') }}" method="POST">
    @csrf
    <label>Kode Complaint:</label><br>
    <input type="text" name="code_complain"><br>

    <label>Asal (origins):</label><br>
    <input type="text" name="origins"><br>

    <label>Status:</label><br>
    <select name="status">
        <option value="0">Pending</option>
        <option value="1">Selesai</option>
    </select><br>

    <label>User:</label><br>
    <select name="user_id">
        @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->username }}</option>
        @endforeach
    </select><br><br>

    <button type="submit">Simpan</button>
</form>
<a href="{{ route('complaints.index') }}">Kembali</a>
