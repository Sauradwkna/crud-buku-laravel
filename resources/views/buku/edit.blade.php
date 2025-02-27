@include('layout.header')
        <h3>Edit Buku</h3>
        <form action="{{ route('buku.update', $buku->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="">Judul Buku:</label>
                <input type="text" name="judul" id="" value="{{ $buku->judul }}">
            </div>
            <div class="form-group">
                <label for="">Penulis:</label>
                <input type="text" name="penulis" id="" value="{{ $buku->penulis }}">
            </div>
            <div class="form-group">
                <label for="">Tahun Terbit:</label>
                <input type="text" name="tahun_terbit" id="" value="{{ $buku->tahun_terbit }}">
            </div>
            <div class="form-group">
                <label for="">Penerbit:</label>
                <select name="penerbit_id" id="">
                    @foreach ($penerbit as $prow)
                        <option value="{{ $prow->id }}" {{ ($prow->id == $buku->penerbit_id) ? 'selected':''}}>{{ $prow->nama_penerbit }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Kategori:</label>
                <select name="kategori_id" id="">
                    @foreach ($kategori as $krow)
                        <option value="{{ $krow->id }}" {{ ($krow->id == $buku->kategori_id) ? 'selected':''}}>{{ $krow->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="tombol">Update</button>
        </form>
@include('layout.footer')