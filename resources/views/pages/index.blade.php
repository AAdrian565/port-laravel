@extends('layouts.admin')
@section('content')
<h1 class="card-title m-3">Pages</h1>
<div class="pb-3"><a href="{{ route('pages.create') }}" class="btn btn-primary">add page</a></div>
<div class="table-responsive">
    <table class="table table-stripped">
        <thread>
            <tr>
                <th class="col-1">No</th>
                <th class="col-8">Title</th>
                <th class="col-3">Action</th>
            </tr>
        </thread>
        <tbody>
            <?php $i = 1 ?>
            @foreach ($data as $item)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $item->title }}</td>
                <td>
                    <a href="{{ route('pages.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form onsubmit="return confirm('Yakin ingin menghapus data ini?')" action="{{ route('pages.destroy',$item->id) }}" class="d-inline" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" type="submit" name="submit">Del</button>
                    </form>
                </td>
            </tr>
            <?php $i++; ?>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
