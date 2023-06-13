@extends('layouts.admin')
@section('content')
<h1 class="card-title m-3">Experience</h1>
<div class="pb-3"><a href="{{ route('experience.create') }}" class="btn btn-primary">add experience</a></div>
<div class="table-responsive">
    <table class="table table-stripped">
        <thread>
            <tr>
                <th class="col-1">No</th>
                <th>Job Title</th>
                <th>Company Name</th>
                <th>Start date</th>
                <th>End date</th>
                <th class="col-3">Action</th>
            </tr>
        </thread>
        <tbody>
            <?php $i = 1 ?>
            @foreach ($data as $item)
            <tr>
                <td>{{ $i }}</td>
                <td>{{ $item->title }}</td>
                <td>{{ $item->info1 }}</td>
                <td>{{ $item->date_start_conv }}</td>
                <td>{{ $item->date_end_conv }}</td>
                <td>
                    <a href="{{ route('experience.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form onsubmit="return confirm('Yakin ingin menghapus data ini?')" action="{{ route('experience.destroy',$item->id) }}" class="d-inline" method="POST">
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
