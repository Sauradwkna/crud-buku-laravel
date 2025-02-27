@include('layout.header')
        <h3>Buku</h3>
        <a href="{{ route('buku.create') }}" class="tombol">Tambah</a>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Judul Buku</th>
                    <th>Penulis</th>
                    <th>Tahun</th>
                    <th>Penerbit</th>
                    <th>Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allBuku as $key => $row)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $row->judul }}</td>
                        <td>{{ $row->penulis }}</td>
                        <td>{{ $row->tahun_terbit }}</td>
                        <td>{{ $row->penerbit->nama_penerbit }}</td>
                        <td>{{ $row->kategori->nama_kategori }}</td>
                        <td>
                            <form action="{{ route('buku.destroy', $row->id) }}" method="POST">
                                <a href="{{ route('buku.show', $row->id) }}" class="tombol">Detail</a>
                                <a href="{{ route('buku.edit', $row->id) }}" class="tombol">Edit</a>
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