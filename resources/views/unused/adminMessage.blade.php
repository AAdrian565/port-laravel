@extends('layouts.admin')
@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Message</h1>
    <p class="mb-4">All message the user have sent</p>

    <!-- Content Row -->
    <div class="row">

        <div class="col-xl-12 col-lg-7">

            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">From: adrian (admin@admin.gov)</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        Hello!
                    </div>
                    <hr>
                <button type="button"  class="btn btn-primary">Edit</button>
                <button type="button"  class="btn btn-danger">delete</button>
                </div>
            </div>

            <!-- Bar Chart -->

        </div>

        <!-- Donut Chart -->
    </div>

</div>
<!-- /.container-fluid -->

@endsection
