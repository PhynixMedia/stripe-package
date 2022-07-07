@extends("web::pages.index")

@section("content")

{{--    {{ dd($response) }}--}}

    {{ _value($response, "status") }}

@endsection
