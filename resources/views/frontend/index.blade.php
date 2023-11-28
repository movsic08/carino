@extends('frontend.frontend-dashboard')
@section('main')

@section('title')
  FPOP Pangasinan Chapter  
@endsection

        <!-- banner-section -->
         @include('frontend.home.banner')
         <!-- banner-section end -->


        <!-- team-section -->
         @include('frontend.home.team')
        <!-- team-section end -->

        <!-- news-section -->
       @include('frontend.home.news')
        <!-- news-section end -->


        <!-- download-section -->
  
        <!-- download-section end -->

@endsection