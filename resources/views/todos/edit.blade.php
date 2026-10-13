@extends('layouts.app')
@section('title', 'Detail Tugas')
@section('content')
<h1>{{ $todo->title }}</h1>
<p>{{ $todo->is_completed ? 'Selesai' : 'Belum selesai' }}</p>
<p>{{ $todo->description ?: 'Tidak ada deskripsi.' }}</p>
<div><a href="{{ route('todos.edit', $todo) }}">Edit Tugas</a><a href="{{ route('todos.index') }}">Kembali</a></div>
@endsection
