@extends('layouts.app')

@section('content')
<div class="p-6">

    <h1 class="text-xl font-bold mb-4"><i class="ph ph-pill"></i> Edit Obat</h1>

    <form action="{{ route('obat.update', $obat->id) }}" method="POST">
        @method('PUT')
        @include('obat._form')
    </form>

</div>
@endsection