@extends('front.master')

@section('content')

<section class="reservation-section-three">
    <div class="auto-container">
        <!-- Title Box -->
        @foreach ($Terms as $terms)
        <div class="title-box">

            <div class="text">
                <p style="color:#000000 !important">{!!html_entity_decode($terms->content)!!}</p>
            </div>
        </div>
        @endforeach
    </div>
</section>
@include('front.instagram')
@endsection
