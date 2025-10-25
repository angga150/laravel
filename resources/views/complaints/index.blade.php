<h1>Daftar Complaint</h1>

<a href="{{ route('complaints.create') }}">+ Tambah Complaint</a>

@if (session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="8">
    <tr>
        <th>No</th>
        <th>Kode</th>
        <th>Asal</th>
        <th>Status</th>
        <th>User</th>
        <th>Aksi</th>
    </tr>
    @foreach ($complaints as $c)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $c->code_complain }}</td>
        <td>{{ $c->origins }}</td>
        <td>{{ $c->status == 1 ? 'Selesai' : 'Pending' }}</td>
        <td>{{ $c->user->username ?? '-' }}</td>
        <td>
            <a href="{{ route('complaints.edit', $c->id) }}">Edit</a>
            <form action="{{ route('complaints.destroy', $c->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Hapus data ini?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
