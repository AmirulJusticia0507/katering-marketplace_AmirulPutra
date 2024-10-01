@extends('layouts.app')

@section('content')
<div class="container mx-auto p-5">
    <h2 class="text-2xl font-bold mb-4">Daftar Merchants</h2>

    <a href="{{ route('merchants.create') }}" class="btn btn-primary mb-4">Tambah Merchant</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table id="merchantsTable" class="table table-bordered w-full text-left shadow-lg">
        <thead class="thead-dark">
            <tr>
                <th class="px-4 py-2">Nama Merchant</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Alamat</th>
                <th class="px-4 py-2">Kontak</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($merchants as $merchant)
                <tr>
                    <td class="px-4 py-2">{{ $merchant->nama }}</td>
                    <td class="px-4 py-2">{{ $merchant->email }}</td>
                    <td class="px-4 py-2">{{ $merchant->alamat }}</td>
                    <td class="px-4 py-2">{{ $merchant->kontak }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('merchants.edit', $merchant->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('merchants.destroy', $merchant->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- DataTables CDN -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready(function() {
        $('#merchantsTable').DataTable({
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json'
            }
        });
    });
</script>
@endsection
