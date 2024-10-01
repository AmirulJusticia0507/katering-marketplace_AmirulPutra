@extends('layouts.app')

@section('content')
<div class="container mx-auto p-5">
    <h2 class="text-2xl font-bold mb-4">Edit Merchant</h2>

    <form action="{{ route('merchants.update', $merchant->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="nama" class="block text-gray-700">Nama Merchant</label>
            <input type="text" id="nama" name="nama" value="{{ $merchant->nama }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
        </div>

        <div class="mb-4">
            <label for="email" class="block text-gray-700">Email</label>
            <input type="email" id="email" name="email" value="{{ $merchant->email }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
        </div>

        <div class="mb-4">
            <label for="alamat" class="block text-gray-700">Alamat</label>
            <textarea id="alamat" name="alamat" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>{{ $merchant->alamat }}</textarea>
        </div>

        <div class="mb-4">
            <label for="kontak" class="block text-gray-700">Kontak</label>
            <input type="text" id="kontak" name="kontak" value="{{ $merchant->kontak }}" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
