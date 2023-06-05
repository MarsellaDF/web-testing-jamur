<div class="card-body">
    <table class="table table-responsive" id="table1">
        <thead>
            <tr>
                <th>no</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($penguji as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->name }}</td>
                    <td>{{ $data->email }}</td>
                    <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                            action="{{ route('data-penguji.destroy', $data->id) }}" method="POST">
                            <a href="/data-penguji/{{ $data->id }}"><span class="badge badge-pill"
                                    style="background-color:#00AFE7"><i class="bi bi-file-text-fill"></i></span></a>
                            {{--  <a href="/data-penguji/{{ $data->id }}/edit"><span class="badge badge-pill"
                                    style="background-color:#FF5F00"><i class="bi bi-pencil-fill"></i></span></a>  --}}

                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
