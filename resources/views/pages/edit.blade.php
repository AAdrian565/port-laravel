@extends('layouts.admin')
@section('content')
<div class="pb-3">
    <a href="{{ route('pages.index') }}" class="btn btn-secondary">
        << Back</a>
</div>
<form action="{{ route('pages.update', $data->id) }}" method="POST">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="title" class="form-label">Judul</label>
        <input type="text" class="form-control form-control-sm" name="title" id="title" aria-describedby="helpId" placeholder="title" value="{{ $data->title }}">
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Isi</label>
        <textarea class="form-control summernote" name="content" rows="5">{{ $data->content }}</textarea>
    </div>
    <button class="btn btn-primary" name="simpan" type="submit">Save</button>
</form>
@endsection
