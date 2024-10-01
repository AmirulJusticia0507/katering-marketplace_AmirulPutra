@extends('layouts.app')

@section('content')
<div class="container mx-auto p-5">
    <h2 class="text-2xl font-bold mb-4">Edit Customer</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('customers.update', $customer->id) }}" method="POST" class="w-full max-w-lg">
        @csrf
        @method('PUT')

        <div class="form-group mb-4">
            <label for="nama_kantor" class="block text-gray-700">Nama Lengkap</label>
            <input type="text" name="nama_kantor" class="form-control" id="nama_kantor" value="{{ $customer->nama_kantor }}" required>
        </div>

        {{-- <div class="form-group mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="text" name="email" class="form-control" id="email" value="{{ $customer->email }}" required>
        </div> --}}

        <div class="form-group mb-4">
            <label for="alamat" class="block text-gray-700">Alamat</label>
            <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $customer->alamat }}" required>
        </div>

        <div class="form-group mb-4">
            <label for="kontak" class="block text-gray-700">Kontak</label>
            <input type="text" name="kontak" class="form-control" id="kontak" value="{{ $customer->kontak }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
