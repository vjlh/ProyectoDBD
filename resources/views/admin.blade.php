@extends('layouts.base')
@section('content')



<section id="intro">
<style>#about::before {background: rgba(35, 32, 32, 0.92) !important }</style>
<section id="about">
<div class="container" style="margin-top: 10%;">
<div class="row justify-content-center">
<div class="col-md-12">      
       
        @include('includes.admin_hospedajes')
        @include('includes.admin_vuelos')
        @include('includes.admin_seguros')
</div>
</div>
</div>

</section><!-- #about -->
</section>
@endsection

