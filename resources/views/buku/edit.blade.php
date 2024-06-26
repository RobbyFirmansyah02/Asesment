@extends('template1')
@section('nav')
<nav class="mt-3" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="{{ url('/') }}">
                <i class="fa fa-home"></i> Home
            </a>
        </li>
        <li class="breadcrumb-item" aria-current="page">
            <a href="{{ route('buku.index') }}">Peserta</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
    </ol>
</nav>
@endsection
@section('title')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 order-md-1 order-last">
                <div style="float: right">
                    <a href="{{ route('buku.index') }}">
                        <button class="btn btn-warning mt-2">
                            <i class="fa fa-arrow-circle-left"></i> Kembali
                        </button>
                    </a>
                </div>
                <h3>Edit Peserta</h3>
            </div>
        </div>
    </div>
    <div class="page-content mt-4">
        <section class="section">
            <div class="row" id="basic-table">
                <div class="col-12 col-md-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="row p-3">
                                <div class="col-lg-3 col-md-3 pt-4 pr-0">
                                    <img src="{{ asset('upload') }}/{{ $data->sampul }}" style="width: 100%" alt="">
                                </div>
                                <div class="col-lg-9 col-md-9">
                                    <div class="card-body">
                                        <p class="text-danger">(*) Wajib Diisi</p>
                                        <form action="{{ route('buku.update',$data->id) }}" enctype="multipart/form-data" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Nama <small class="text-danger">*</small></label>
                                                        <input type="text" class="form-control" name="judul" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->judul }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Jurusan <small class="text-danger">*</small></label>
                                                        <select class="form-select " class="text-dark" name="kategori" aria-label="Default select example">
                                                            <option></option>
                                                            @foreach ($kategori as $item)
                                                            <option class="text-dark" value="{{ $item['id'] }}" {{ $data->kategori_id == $item->id ? 'selected' : '' }}>{{ $item->kategori }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-3">
                                                        <label for="exampleInputEmail1" class="form-label">Email <small class="text-danger">*</small></label>
                                                        <input type="text" name="penulis" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $data->penulis }}">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="formFile " class="form-label">Foto Profil <small class="text-danger">@if($data->sampul != '')
                                                                Kosongkan jika tidak mengubah gambar
                                                                @endif</small></label>
                                                        <input class="form-control @error('sampul') is-invalid @enderror" name="sampul" type="file" id="formFile">
                                                        @error('sampul')
                                                        <p class="text-danger ">{{ $message }}</p>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputEmail1" class="form-label">Deskripsi <small class="text-danger">*</small></label>
                                                <textarea class="form-control" name="deskripsi" rows="10" cols="" aria-label="With textarea">{{ $data->deskripsi }}</textarea>
                                            </div>
                                            <button class="btn btn-primary mt-3" type="submit">
                                                <i class="fa fa-save"></i> Update
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection