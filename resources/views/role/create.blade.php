@extends('layouts.app')

@section('content')
<div class="p-6">

    <h1 class="text-xl font-bold mb-4"><i class="ph ph-user-gear"></i> Tambah Role</h1>

    <form action="{{ route('role.store') }}" method="POST">
        @include('role._form')
    </form>

</div>
@endsection