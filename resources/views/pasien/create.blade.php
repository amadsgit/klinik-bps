@extends('layouts.app')

@section('content')
<div class="p-6">

    <h1 class="text-xl font-bold mb-4"><i class="ph ph-user"></i> Tambah Pasien</h1>

    <form action="{{ route('pasien.store') }}" method="POST">
        @include('pasien._form')
    </form>

</div>
@endsection