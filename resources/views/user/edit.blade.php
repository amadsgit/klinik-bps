@extends('layouts.app')

@section('content')
<div class="p-6">

    <h1 class="text-xl font-bold mb-4"><i class="ph ph-user"></i> Edit User</h1>

    <form action="{{ route('user.update', $user->id) }}" method="POST">
        @method('PUT')
        @include('user._form')
    </form>

</div>
@endsection