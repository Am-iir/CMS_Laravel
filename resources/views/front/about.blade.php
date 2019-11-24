@extends('layouts.front')

@section('content')
    @include('front.about._partials.coverimage')

    @include('front.about._partials.sectionOne')
    @include('front.about._partials.sectionTwo')
    @include('front.about._partials.sectionThree')

@endsection
