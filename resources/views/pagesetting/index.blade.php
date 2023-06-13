@extends('layouts.admin')
@section('content')
<form action="{{ route('pagesetting.update') }}" method="POST">
    @csrf
    <div class="form-group row">
        <label class="col-sm-2">About</label>
        <div class="col-sm-6">
            <select class="form-control form-control-sm" name="_page_about">
                <option value="">-pilih-</option>
                @foreach ($pagedata as $item)
                <option value="{{ $item->id }}" {{ get_meta_value('_page_about') == $item->id ? 'selected' : '' }}>
                    {{ $item->title }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2">Interest</label>
        <div class="col-sm-6">
            <select class="form-control form-control-sm" name="_page_interest">
                <option value="">-pilih-</option>
                @foreach ($pagedata as $item)
                <option value="{{ $item->id }}" {{ get_meta_value('_page_interest') == $item->id ? 'selected' : '' }}>
                    {{ $item->title }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-sm-2">Award</label>
        <div class="col-sm-6">
            <select class="form-control form-control-sm" name="_page_award">
                <option value="">-pilih-</option>
                @foreach ($pagedata as $item)
                <option value="{{ $item->id }}" {{ get_meta_value('_page_award') == $item->id ? 'selected' : '' }}>
                    {{ $item->title }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <button class="btn btn-primary" name="simpan" type="submit">SIMPAN</button>
</form>
@endsection
