@extends('layouts.app')

@section('content')
<div class="p-6">

    <h1 class="text-xl font-bold mb-4"><i class="ph ph-scissors"></i> Tambah Tindakan</h1>

    <form action="{{ route('tindakan.store') }}" method="POST">
        @include('tindakan._form')
    </form>

</div>
@endsection