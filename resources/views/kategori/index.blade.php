@include('layout.header')
        <h3>Kategori</h3>
        <a href="{{ route('kategori.create') }}" class="tombol">Tambah</a>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allKategori as $key => $row)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $row->nama_kategori }}</td>
                        <td>
                            <form action="{{ route('kategori.destroy', $row->id) }}" method="POST">
                                <a href="{{ route('kategori.show', $row->id) }}" class="tombol">Detail</a>
                                <a href="{{ route('kategori.edit', $row->id) }}" class="tombol">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="tombol">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@include('layout.footer')