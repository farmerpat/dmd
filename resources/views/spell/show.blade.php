@extends ("layout")

@section ("content")
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <h1>
                    {{ $spell->name }}
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <h4>Description</h4>
                <p>
                    {{ $spell->desc }}
                </p>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <h4>More Info</h4>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <h4>More Info</h4>
            </div>
        </div>
    </div>
@endsection
