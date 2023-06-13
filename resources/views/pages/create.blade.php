@extends('layouts.admin')
@section('content')
<div class="pb-3">
    <a href="{{ route('pages.index') }}" class="btn btn-secondary">
        << Back</a>
</div>
<form action="{{ route('pages.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">title</label>
        <input type="text" class="form-control form-control-sm" name="title" id="title" aria-describedby="helpId" placeholder="title" value="{{ Session::get('title') }}">
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Isi</label>
        <textarea class="form-control summernote" name="content" rows="5">{{ Session::get('content') }}</textarea>
    </div>
    <button class="btn btn-primary" name="simpan" type="submit">Save</button>
</form>
@endsection
