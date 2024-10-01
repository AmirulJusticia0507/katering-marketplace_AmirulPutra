@extends('layouts.app')

@section('content')
<div class="container mx-auto p-5">
    <h2 class="text-2xl font-bold mb-4">Tambah Customer Baru</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('customers.store') }}" method="POST" class="w-full max-w-lg">
        @csrf
        <div class="form-group mb-4">
            <label for="nama_kantor" class="block text-gray-700">Nama Perusahaan</label>
            <input type="text" name="nama_kantor" class="form-control" id="nama_kantor" value="{{ old('nama_kantor') }}" required>
        </div>

        {{-- <div class="form-group mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required>
        </div> --}}

        <div class="form-group mb-4">
            <label for="alamat" class="block text-gray-700">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="alamat" value="{{ old('alamat') }}" required>
        </div>

        <div class="form-group mb-4">
            <label for="kontak" class="block text-gray-700">Kontak</label>
            <input type="text" name="kontak" class="form-control" id="kontak" value="{{ old('kontak') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
