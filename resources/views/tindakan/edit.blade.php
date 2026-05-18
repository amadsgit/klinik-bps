@extends('layouts.app')

@section('content')
<div class="p-6">

    <h1 class="text-xl font-bold mb-4"><i class="ph ph-scissors"></i> Edit Tindakan</h1>

    <form action="{{ route('tindakan.update', $tindakan->id) }}" method="POST">
        @method('PUT')
        @include('tindakan._form')
    </form>

</div>
@endsection