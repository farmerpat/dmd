@extends ("layout")

@section ("styles")

    <link
        href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"
        rel="stylesheet"
    >

@endsection

@section ("content")

    <table
        id="schools_table"
        class="table table-striped table-bordered"
        cellspacing="0"
        width="100%"
    >
        <thead>
            <tr>
                <td>Name</td>
                <td>Description</td>
            </tr>
        </thead>
        <tbody>

            @foreach ($schools as $school)
                <tr>
                    <td>
                        <a href="/school/{{ $school->id }}">
                            {{ $school->name }}
                        </a>
                    </td>
                    <td>
                        {{ $school->desc }}
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

@endsection

@section ("scripts")

    <!-- try to find a way to get this mixed in -->
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#schools_table').DataTable();

        } );
    </script>

@endsection
