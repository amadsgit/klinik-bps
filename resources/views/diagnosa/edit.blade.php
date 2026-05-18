@extends('layouts.app')

@section('content')
<div class="p-6">

    <h1 class="text-xl font-bold mb-4"><i class="ph ph-heartbeat"></i> Edit Diagnosa</h1>

    <form action="{{ route('diagnosa.update', $diagnosa->id) }}" method="POST">
        @method('PUT')
        @include('diagnosa._form')
    </form>

</div>
@endsection