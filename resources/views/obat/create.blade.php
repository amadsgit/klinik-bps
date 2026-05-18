@extends('layouts.app')

@section('content')
<div class="p-6">

    <h1 class="text-xl font-bold mb-4"><i class="ph ph-pill"></i> Tambah Obat</h1>

    <form action="{{ route('obat.store') }}" method="POST">
        @include('obat._form')
    </form>

</div>
@endsection