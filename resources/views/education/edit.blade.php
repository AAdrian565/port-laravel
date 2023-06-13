@extends('layouts.admin')
@section('content')
<div class="pb-3">
    <a href="{{ route('education.index') }}" class="btn btn-secondary">
        << Back</a>
</div>
<form action="{{ route('education.update', $data->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="title" class="form-label">Education</label>
        <input type="text" class="form-control form-control-sm" name="title" id="title" aria-describedby="helpId" placeholder="Education" value="{{ $data->title }}">
    </div>
    <div class="mb-3">
        <label for="info1" class="form-label">Major</label>
        <input type="text" class="form-control form-control-sm" name="info1" id="info1" aria-describedby="helpId" placeholder="Major" value="{{ $data->info1 }}">
    </div>
    <div class="mb-3">
        <label for="info2" class="form-label">Department</label>
        <input type="text" class="form-control form-control-sm" name="info2" id="info2" aria-describedby="helpId" placeholder="Department" value="{{ $data->info2 }}">
    </div>
    <div class="mb-3">
        <label for="info3" class="form-label">grade</label>
        <input type="text" class="form-control form-control-sm" name="info3" id="info3" aria-describedby="helpId" placeholder="grade" value="{{ $data->info3 }}">
    </div>
    <div class="mb-3">
        <div class="row">
            <div class="col-auto">start date</div>
            <div class="col-auto"><input type="date" class="form-control form-control-sm" name="date_start" placeholder="dd/mm/yyy" value="{{ $data->date_start }}"></div>
            <div class=" col-auto">end date</div>
            <div class="col-auto"><input type="date" class="form-control form-control-sm" name="date_end" placeholder="dd/mm/yyy" value="{{ $data->date_end }}"></div>
        </div>
    </div>
    <button class="btn btn-primary" name="simpan" type="submit">Save</button>
</form>
@endsection
