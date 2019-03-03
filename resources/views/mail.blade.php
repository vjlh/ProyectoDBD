@extends('layouts.base')
@section('content')




<section id="intro">
<style>#about::before {background: rgba(35, 32, 32, 0.92) !important }</style>
<section id="about">
<div class="container" style="margin-top: 10%;">

<div class="row justify-content-center">
<div class="col-md-12">

        <form method="POST" action="{{url('send/email')}}">
            
            <div class="card dbd-auth" style=" margin-bottom: 20%; color: white; background-color: #212529c7;">
            <center>
                <h1><small> PRUEBA DE MAIL >:C</h1></small>
            </center>
                <div class="card-header">{{ __('') }}</h5></div>

                <div class="card-body">


                    <center>
                    <th><h5 class="card-title">Acción</h5></th>
                    </center>

                    @guest
                    <!-- Trigger the modal with a button -->
                    

                    @else

                    <center>
                    <th><button type="submit" class="btn btn-get-started scrollto">Enviar Mail</button></th>
                    
                    </center>
                    
                    
                    

                    @endguest




                    </tr>


                    </table>

                        </div>
                </div>

        </div>
        
    </div>
</div>
</div>

</section><!-- #about -->
</section>
</form>
