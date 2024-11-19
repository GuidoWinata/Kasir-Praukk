@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Tambah Kategori'])
    <div class="row mt-4 mx-4">
        <div class="col-6">
            <div class="card mb-4 px-4">
                <div class="card-header px-0 d-flex justify-content-between pb-0">
                    <h6>Tambah Kategori Produk</h6>
                    <a href="{{ route('kategori') }}" class="btn btn-outline-primary">Kembali</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('doCreate') }}" method="POST">
                                @csrf
                                <label for="nama"><p class="fw-bold m-0">Tambah Kategori</p></label>
                                <input class="form-control" type="text" name="nama" id="nama" placeholder="Tambah Kategori..." required>            
                                <button type="submit" class="btn btn-primary mt-4">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
