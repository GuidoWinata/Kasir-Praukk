@extends('layouts.app')

@section('content')
    @include('layouts.navbars.auth.topnav', ['title' => 'Kategori'])
    <div class="row mt-4 mx-4">
        <div class="col-6">
            <div class="card mb-4 px-4">
                <div class="card-header px-0 d-flex justify-content-between pb-0">
                    <h6>Kategori Produk</h6>
                    <a href="{{ route('add') }}" class="btn btn-primary">Tambah Kategori</a>
                </div>
                <div class="card-body px-0 pt-0 pb-2">
                    <div class="card border border-secondary">
                        <div class="card-body">
                            <form action="" method="GET">
                                <div class="col-md-auto">
                                    <select class="form-select" name="filter_kategori" id="">
                                        <option value="">Semua Kategori</option>
                                        <option value="">Makanan</option>
                                        <option value="">Minuman</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>

                    <table class="table table-bordered align-items-center mb-0 mt-5">
                        <thead>
                            <tr class="table-light">
                                <th width="5%" class="text-uppercase text-center font-weight-bolder">ID</th>
                                <th class="text-uppercase ps-2">Kategori</th>
                                <th width="10%" class="text-uppercase text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $p)
                            <tr>
                                <td>
                                    <p class="mb-0 text-center">{{ $p->id }}</p>
                                </td>
                                <td>
                                    <p class="font-weight-bold mb-0">{{ $p->nama }}</p>
                                </td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        </button>
                                        <ul class="dropdown-menu">
                                          <li><a class="dropdown-item fw-bold text-success" href="{{ route('update', ['id' => $p->id]) }}">Edit</a></li>
                                          <li>
                                            <form action="{{ route('delete', ['id' => $p->id]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="dropdown-item text-danger fw-bold">Delete</button>
                                            </form>
                                          </li>
                                        </ul>
                                      </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @if (!count($data))
                        <div class="text-center my-5">
                            <h5>Data Belum Tersedia😱</h5>
                            <p>Silahkan tambah data terlebih dahulu</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
