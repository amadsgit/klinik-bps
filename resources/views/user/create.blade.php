@extends('layouts.app')
{{-- @section('title','Tambah User') --}}

@section('content')
<div class="p-6">

    <h1 class="text-xl font-bold mb-4"><i class="ph ph-user"></i> Tambah User</h1>

    <form action="{{ route('user.store') }}" method="POST">
        @include('user._form')
    </form>

</div>
@endsection