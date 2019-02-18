@extends('layouts.base')
@section('content')




<section id="intro">
<style>#about::before {background: rgba(35, 32, 32, 0.92) !important }</style>
<section id="about">
<div class="container" style="margin-top: 10%; max-width: 3000px;">
<div class="row about-cols">
       
        <div class="col-md-10" style="float: none; margin: 0 auto;">
        

                    <center>

                    <ul class="nav nav-tabs  justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active btn btn-get-started scrollto" id="vuelo-tab" data-toggle="tab" href="#vuelo" role="tab" aria-controls="vuelo" aria-selected="true" href="#">VUELOS</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link btn btn-get-started scrollto" href="#">HOTELES</a>
                    </li>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link btn btn-get-started scrollto" href="#">SEGUROS</a>
                    </li>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link btn btn-get-started scrollto" href="#">PAQUETES</a>
                    </li>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link btn btn-get-started scrollto" href="#">AUTOS</a>
                    </li>
                    </ul>

                    </center>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="vuelo" role="tabpanel" aria-labelledby="vuelo-tab">
                            @include('includes.admin_vuelos')
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
                    </div>
            
        </div>
        
    </div>
</div>

</section><!-- #about -->
</section>
</form>

@endsection
