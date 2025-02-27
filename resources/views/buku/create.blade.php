@include('layout.header')
        <h3>Buat Buku</h3>
        <form action="{{ route('buku.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="">Judul Buku:</label>
                <input type="text" name="judul" id="" placeholder="Masukkan judul buku">
            </div>
            <div class="form-group">
                <label for="">Penulis:</label>
                <input type="text" name="penulis" id="" placeholder="Masukkan penulis">
            </div>
            <div class="form-group">
                <label for="">Tahun Terbit:</label>
                <input type="text" name="tahun_terbit" id="" placeholder="Masukkan tahun terbit">
            </div>
            <div class="form-group">
                <label for="">Penerbit:</label>
                <select name="penerbit_id" id="">
                    @foreach ($penerbit as $prow)
                        <option value="{{ $prow->id }}">{{ $prow->nama_penerbit }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Kategori:</label>
                <select name="kategori_id" id="">
                    @foreach ($kategori as $krow)
                        <option value="{{ $krow->id }}">{{ $krow->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="tombol">Submit</button>
        </form>
@include('layout.footer')