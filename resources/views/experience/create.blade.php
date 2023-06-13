@extends('layouts.admin')
@section('content')
<div class="pb-3">
    <a href="{{ route('experience.index') }}" class="btn btn-secondary">
        << Back</a>
</div>
<form action="{{ route('experience.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Job Title</label>
        <input type="text" class="form-control form-control-sm" name="title" id="title" aria-describedby="helpId" placeholder="Job Title" value="{{ Session::get('title') }}">
    </div>
    <div class="mb-3">
        <label for="info1" class="form-label">Employer</label>
        <input type="text" class="form-control form-control-sm" name="info1" id="info1" aria-describedby="helpId" placeholder="Employer" value="{{ Session::get('info1') }}">
    </div>
    <div class="mb-3">
        <div class="row">
            <div class="col-auto">start date</div>
            <div class="col-auto"><input type="date" class="form-control form-control-sm" name="date_start" placeholder="dd/mm/yyy" value="{{ Session::get('date_start') }}"></div>
            <div class=" col-auto">end date</div>
            <div class="col-auto"><input type="date" class="form-control form-control-sm" name="date_end" placeholder="dd/mm/yyy" value="{{ Session::get('date_end') }}"></div>
        </div>
    </div>
    <div class=" mb-3">
        <label for="content" class="form-label">Isi</label>
        <textarea class="form-control summernote" name="content" rows="5">{{ Session::get('content') }}</textarea>
    </div>
    <button class="btn btn-primary" name="simpan" type="submit">Save</button>
</form>
@endsection
