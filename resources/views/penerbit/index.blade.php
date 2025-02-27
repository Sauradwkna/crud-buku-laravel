@include('layout.header')
        <h3>Penerbit</h3>
        <a href="{{ route('penerbit.create') }}" class="tombol">Tambah</a>
        <table>
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Penerbit</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allPenerbit as $key => $row)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $row->nama_penerbit }}</td>
                        <td>
                            <form action="{{ route('penerbit.destroy', $row->id) }}" method="POST">
                                <a href="{{ route('penerbit.show', $row->id) }}" class="tombol">Detail</a>
                                <a href="{{ route('penerbit.edit', $row->id) }}" class="tombol">Edit</a>
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