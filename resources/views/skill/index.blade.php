@extends('layouts.admin')
@section('content')
<form action="{{ route('skill.update') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Programming Language</label>
        <input type="text" class="form-control form-control-sm" name="_language" id="title" aria-describedby="helpId" placeholder="Programming Language" value="{{ get_meta_value('_language' )}}">
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Workflow</label>
        <textarea class="form-control summernote" name="_workflow" rows="5">{{ get_meta_value('_workflow')}}</textarea>
    </div>
    <button class="btn btn-primary" name="simpan" type="submit">Save</button>
</form>
@endsection
