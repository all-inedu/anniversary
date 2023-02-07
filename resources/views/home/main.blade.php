@extends('app')
@section('body')
    @include('home.component.navbar')
    @include('home.component.banner')
    @include('home.component.ibdp')
    @include('home.component.scholarship')
    @include('home.component.profile-essay')
    @include('home.component.university')
    @include('home.component.university-prep')
    @include('home.component.about')
    @include('home.component.footer')
    <style>
        @media only screen and (max-width: 600px) {
            .btn-lg {
                font-size: 14px !important;
            }
        }
    </style>
@endsection