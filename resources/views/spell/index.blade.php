@extends ("layout")

@section ("styles")

    <link
        href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css"
        rel="stylesheet"
    >

@endsection

@section ("content")

    <table
        id="spells_table"
        class="table table-striped table-bordered"
        cellspacing="0"
        width="100%"
    >
        <thead>
            <tr>
                <td>Name</td>
                <td>Level</td>
                <td>School</td>
            </tr>
        </thead>
        <tbody>

            @foreach ($spells as $spell)
                <tr>
                    <td>
                        <a href="/spell/{{ $spell->id }}">
                            {{ $spell->name }}
                        </a>
                    </td>
                    <td>
                        @if ($spell->level == '0')
                            Cantrip
                        @else
                            {{ $spell->level }}
                        @endif
                    </td>
                    <td>
                        {{ $spell->school }}
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
            $('#spells_table').DataTable();

        } );
    </script>

@endsection
