@extends('frontend.user_layout')

@section('main_content')

<section class="error-page text-center">
    <div class="container">
        <h1>404</h1>
        <p>It looks like nothing was found at this location.</p>
        <a href="{{route('userHome')}}" class="backhome">Back To Home</a>
    </div>
</section>

@endsection