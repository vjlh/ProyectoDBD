@extends('layouts.base')
@section('content')



<section id="intro">
<style>#about::before {background: rgba(35, 32, 32, 0.92) !important }</style>
<section id="about">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<div class="container" style="margin-top: 10%; max-width: 3000px;">
<div class="row about-cols">
       
        <div class="col-md-10" style="float: none; margin: 0 auto;">
        
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active btn-get-started " id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Vuelos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn-get-started " id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Seguros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn-get-started " id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Hoteles</a>
            </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                    @include('includes.admin_vuelos')
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                    @include('includes.admin_seguros')
                </div>
                <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                    @include('includes.admin_hospedajes')
                </div>
            </div>
                    
        </div>
        
</div>
</div>

</section><!-- #about -->
</section>
@endsection

