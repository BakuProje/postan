@extends('layouts.landing')

@section('title', 'Postan - Sistem Kasir Modern')

@section('content')
    <!-- HOME -->
    @include('landing.sections.home')

    <!-- INFO -->
    @include('landing.sections.info')

    <!-- SHOWCASE MULTI-DEVICE -->
    @include('landing.sections.showcase')

    <!-- CONTACT & LOKASI -->
    @include('landing.sections.contact')
@endsection
