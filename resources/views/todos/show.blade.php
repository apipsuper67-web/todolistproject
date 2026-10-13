@extends('layouts.app')
@section('title', 'Edit Tugas')
@section('content')
<h1>Edit Tugas</h1>
<form action="{{ route('todos.update', $todo) }}" method="POST">
    @csrf
    @method('PUT')
    <label for="title">Judul <span>(wajib)</span></label>
    <input id="title" name="title" type="text" maxlength="255" value="{{ old('title', $todo->title) }}" required>
    <label for="description">Deskripsi <span>(opsional)</span></label>
    <textarea id="description" name="description" rows="5" maxlength="5000">{{ old('description', $todo->description) }}</textarea>
    <input type="hidden" name="is_completed" value="0">
    <label><input type="checkbox" name="is_completed" value="1" @checked(old('is_completed', $todo->is_completed))> Sudah selesai</label>
    <div><button type="submit">Simpan Perubahan</button><a href="{{ route('todos.index') }}">Batal</a></div>
</form>
@endsection
