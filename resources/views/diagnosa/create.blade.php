@extends('layouts.app')

@section('content')
<div class="p-6">

    <h1 class="text-xl font-bold mb-4"><i class="ph ph-heartbeat"></i> Tambah Diagnosa</h1>

    <form action="{{ route('diagnosa.store') }}" method="POST">
        @include('diagnosa._form')
    </form>

</div>
@endsection