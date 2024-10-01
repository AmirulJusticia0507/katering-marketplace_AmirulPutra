@extends('layouts.app')

@section('content')
<div class="container mx-auto p-5">
    <h2 class="text-2xl font-bold mb-4">Daftar Customers</h2>

    <a href="{{ route('customers.create') }}" class="btn btn-primary mb-4">Tambah Customer</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table id="customersTable" class="table table-bordered w-full text-left shadow-lg">
        <thead class="thead-dark">
            <tr>
                <th class="px-4 py-2">Nama</th>
                <th class="px-4 py-2">Email</th>
                <th class="px-4 py-2">Alamat</th>
                <th class="px-4 py-2">Kontak</th>
                <th class="px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td class="px-4 py-2">{{ $customer->nama_lengkap }}</td>
                    <td class="px-4 py-2">{{ $customer->email }}</td>
                    <td class="px-4 py-2">{{ $customer->alamat }}</td>
                    <td class="px-4 py-2">{{ $customer->kontak }}</td>
                    <td class="px-4 py-2">
                        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" class="inline-block">
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
        $('#customersTable').DataTable({
            // Optional: Customize DataTables options here
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json' // Optional: Localization
            }
        });
    });
</script>
@endsection
