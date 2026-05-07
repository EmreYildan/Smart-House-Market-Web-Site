@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold">Kullanıcı Yönetimi</h1>

    <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:underline">
        ← Admin Panele Dön
    </a>
</div>

@if(session('success'))
    <div class="bg-green-100 text-green-700 p-4 rounded-lg mb-6">
        {{ session('success') }}
    </div>
@endif

<div class="bg-white rounded-xl shadow overflow-hidden">
    <table class="w-full">
        <thead class="bg-gray-100">
            <tr>
                <th class="text-left p-4">ID</th>
                <th class="text-left p-4">Ad Soyad</th>
                <th class="text-left p-4">Email</th>
                <th class="text-left p-4">Rol</th>
                <th class="text-left p-4">Bakiye</th>
                <th class="text-left p-4">Durum</th>
                <th class="text-left p-4">İşlem</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $user)
                <tr class="border-t">
                    <td class="p-4">#{{ $user->id }}</td>
                    <td class="p-4 font-semibold">{{ $user->name }}</td>
                    <td class="p-4">{{ $user->email }}</td>

                    <td class="p-4">
                        <form method="POST" action="{{ route('admin.users.update', $user) }}" class="flex gap-3 items-center">
                            @csrf
                            @method('PUT')

                            <select name="role" class="rounded-lg border-gray-300 shadow-sm">
                                <option value="user" {{ $user->role === 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                    </td>

                    <td class="p-4">{{ $user->balance }} TL</td>

                    <td class="p-4">
                            <label class="inline-flex items-center gap-2">
                                <input type="checkbox" name="is_active" value="1"
                                       {{ $user->is_active ? 'checked' : '' }}
                                       class="rounded border-gray-300 text-blue-600">
                                <span>{{ $user->is_active ? 'Aktif' : 'Pasif' }}</span>
                            </label>
                    </td>

                    <td class="p-4 flex gap-2">
                            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                                Güncelle
                            </button>
                        </form>

                        <form method="POST" action="{{ route('admin.users.destroy', $user) }}">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('Bu kullanıcıyı silmek istediğinize emin misiniz?')"
                                    class="bg-red-500 text-white px-4 py-2 rounded-lg hover:bg-red-600">
                                Sil
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
