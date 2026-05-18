@extends('layouts.app')

@section('content')
<div class="p-6">

    <h1 class="text-xl font-bold mb-4"><i class="ph ph-user-gear"></i> Edit Role</h1>

    <form action="{{ route('role.update', $role->id) }}" method="POST">
        @method('PUT')
        @include('role._form')
    </form>

</div>
@endsection