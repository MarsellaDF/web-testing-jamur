<x-app-layout>
    @section('content')
    <h4 class="text-center my-4">Data Penguji</h4>
    <div class="embed-responsive embed-responsive-16by9 my-5 p-2">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-dismissible" role="alert">
                <strong>{{ $message }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="page-heading">
            <section class="section">
                <div class="card">
                    {{--  <div class="card-header">
                        <a href="" class="btn btn-secondary me-1 mb-1" data-bs-toggle="tooltip"
                        data-bs-placement="top" title="Tambah Data">++ Tambah Data</a>
                    </div>  --}}
                    @include('table')
                </div>

            </section>
        </div>
    </div>
    @endsection
</x-app-layout>
