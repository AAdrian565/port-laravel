@extends('layouts.admin')
@section('content')
<form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row justify-content-between">
        <h3>Profile</h3>
        <div class="col-5">
            <div class="mb-3">
                <label for="_photo" class="form-label">Foto</label>
                <input type="file" class="form-control form-control-sm" name="_photo" id="_photo">
            </div>
            <div class="mb-3">
                <label for="_city" class="form-label">city</label>
                <input type="text" class="form-control form-control-sm" name="_city" id="_city" value="{{get_meta_value('_city')}}">
            </div>
            <div class="mb-3">
                <label for="_phone" class="form-label">phone</label>
                <input type="text" class="form-control form-control-sm" name="_phone" id="_phone" value="{{get_meta_value('_phone')}}">
            </div>
            <div class="mb-3">
                <label for="_email" class="form-label">email</label>
                <input type="text" class="form-control form-control-sm" name="_email" id="_email" value="{{get_meta_value('_email')}}">
            </div>
        </div>
        <div class="col-5">
            <div class="mb-3">
                <label for="_github" class="form-label">github</label>
                <input type="text" class="form-control form-control-sm" name="_github" id="_github" value="{{get_meta_value('_github')}}">
            </div>
            <div class="mb-3">
                <label for="_linkedin" class="form-label">linkedin</label>
                <input type="text" class="form-control form-control-sm" name="_linkedin" id="_linkedin" value="{{get_meta_value('_linkedin')}}">
            </div>
        </div>
    </div>

    <button class="btn btn-primary" name="simpan" type="submit">Save</button>
</form>
@endsection
