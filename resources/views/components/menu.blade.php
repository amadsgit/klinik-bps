@props(['href', 'icon', 'label'])

@php
// ambil path tanpa domain
$path = parse_url($href, PHP_URL_PATH);
$path = trim($path, '/');

// ambil segment pertama (misal: pasien dari pasien/create)
$segment = explode('/', $path)[0] ?? '';

$isActive = request()->is($segment . '*');
@endphp

<a href="{{ $href }}" class="flex items-center gap-3 px-6 py-2 rounded-lg transition
   {{ $isActive 
        ? 'bg-blue-600 text-white shadow font-medium' 
        : 'text-gray-600 hover:bg-blue-50 hover:text-blue-600' }}">

    <i class="ph {{ $icon }} text-lg"></i>
    <span>{{ $label }}</span>
</a>