@csrf

<div class="space-y-6">

    <!-- DATA USER -->
    <div class="bg-white border rounded-2xl shadow-sm p-5">

        <h3 class="text-lg font-semibold mb-4 text-gray-800">
            Data User
        </h3>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <!-- NAMA -->
            <div>
                <label class="block text-sm font-medium">
                    Nama <span class="text-red-500">*</span>
                </label>

                <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}"
                    class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-blue-200" placeholder="Nama user"
                    required>

                @error('name')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- EMAIL -->
            <div>
                <label class="block text-sm font-medium">
                    Email <span class="text-red-500">*</span>
                </label>

                <input type="email" name="email" value="{{ old('email', $user->email ?? '') }}"
                    class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-blue-200"
                    placeholder="email@domain.com" required>

                @error('email')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- PASSWORD (HANYA CREATE) -->
            @if(!isset($user))
            <div>
                <label class="block text-sm font-medium">
                    Password <span class="text-red-500">*</span>
                </label>

                <input type="text" name="password"
                    class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-blue-200"
                    placeholder="Password user" required>

                @error('password')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
            @endif

            <!-- ROLE -->
            <div>
                <label class="block text-sm font-medium">
                    Role <span class="text-red-500">*</span>
                </label>

                <select name="role_id" class="w-full border px-3 py-2 rounded-lg focus:ring-2 focus:ring-blue-200"
                    required>

                    <option value="">-- Pilih Role --</option>

                    @foreach($roles as $r)
                    <option value="{{ $r->id }}" {{ old('role_id', $user->role_id ?? '') == $r->id ? 'selected' : '' }}>
                        {{ $r->nama }}
                    </option>
                    @endforeach

                </select>

                @error('role_id')
                <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>

        </div>

    </div>

</div>

<!-- BUTTON -->
<div class="flex justify-end gap-2 mt-6">

    <a href="{{ route('user.index') }}"
        class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-gray-200 text-gray-700 hover:bg-gray-300 transition">

        <i class="ph ph-arrow-left text-lg"></i>
        Batal
    </a>

    <button type="submit"
        class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-blue-600 text-white hover:bg-blue-700 shadow transition">

        <i class="ph ph-floppy-disk text-lg"></i>
        Simpan
    </button>

</div>