@extends('layouts.base')
@section('content')

@if (session('paqueteReservado'))
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<div class="modal fade" id="ModalPaqueteReservado" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" id="modal-content" style="margin-top: 100%; background-color: #2c3e50d9;">
      <div class="modal-body" id="modal-body" style="color: white;">
        <p style="color: white;">Se ha generado la reserva del paquete correctamente.</p> 
      </div>
      <div class="modal-footer">
        <a style="margin: auto;"class="btn btn-success " data-dismiss="modal">Cerrar</a>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
  // Show the Modal on load
  $("#ModalPaqueteReservado").modal("show");
});
</script>
@endif

@if (session('statusReservaVuelo'))
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<div class="modal fade" id="ModalVueloReservado" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" id="modal-content" style="margin-top: 100%; background-color: #2c3e50d9;">
      <div class="modal-body" id="modal-body" style="color: white;">
        <p style="color: white;">Se ha generado la reserva para el/los asientos del vuelo seleccionado.</p> 
      </div>
      <div class="modal-footer">
        <a style="margin: auto;"class="btn btn-success " data-dismiss="modal">Cerrar</a>
      </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
  // Show the Modal on load
  $("#ModalVueloReservado").modal("show");
});
</script>
@endif



@if (session('statusCheckIn2'))
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<div class="modal fade" id="ModalCheckIn2" role="dialog">
  <div class="modal-dialog modal-sm">
    <div class="modal-content" id="modal-content" style="margin-top: 100%; background-color: #2c3e50d9;">
      <div class="modal-body" id="modal-body" style="color: white;">
        <p style="color: white;">{{session('statusCheckIn2')}}</p> 
      </div>
      <div class="modal-footer">
        <a style="margin: auto;"class="btn btn-success " data-dismiss="modal">Cerrar</a>
      </div>
    </div>
  </div>
</div>
<script>
$(document).ready(function(){
  // Show the Modal on load
  $("#ModalCheckIn2").modal("show");
});
</script>
@endif


  

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active">
            <div class="carousel-background"><img src="{{asset('assets/img/intro-carousel/vacaciones.jpg')}}" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Tenemos los mejores paquetes turisticos!</h2>
                <p  style="color: transparent;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <a href="/buscar_vuelos" class="btn-get-started scrollto">Buscar tu vuelo soñado</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="{{asset('assets/img/intro-carousel/cabanias2.jpg')}}" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Aprovecha ahora nuestros increibles hoteles!</h2>
                <p  style="color: transparent;">Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut.</p>
                <a href="/buscar_vuelos" class="btn-get-started scrollto">Buscar tu vuelo soñado</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="{{asset('assets/img/intro-carousel/muralla.jpg')}}" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>También contamos con servicio de renta de autómoviles</h2>
                <p  style="color: transparent;">Beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt omnis iste natus error sit voluptatem accusantium.</p>
                <a href="/buscar_vuelos" class="btn-get-started scrollto">Buscar tu vuelo soñado</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="{{asset('assets/img/intro-carousel/blue.jpg')}}" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <h2>Aseguramos tu felicidad como si fuera la nuestra</h2>
                <p  style="color: transparent;">Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum.</p>
                <a href="/buscar_vuelos" class="btn-get-started scrollto">Buscar tu vuelo soñado</a>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="{{asset('assets/img/intro-carousel/caribe.jpg')}}" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <a href="/inicio#contact"> <h2>Tienes dudas? Contactanos!</h2></a>
                <p  style="color: transparent;">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                <a href="/buscar_vuelos" class="btn-get-started scrollto">Buscar tu vuelo soñado</a>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      Featured Services Section
    ============================-->
    <section id="featured-services">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 box">
            <i class="ion-ios-bookmarks-outline"></i>
            <h4 class="title"><a href="">Satisfacción</a></h4>
            <p class="description">Garantizamos tu completa satisfacción con respecto a cualquiera de los servicios que ofrecemos.</p>
          </div>

          <div class="col-lg-4 box box-bg">
            <i class="ion-ios-stopwatch-outline"></i>
            <h4 class="title"><a href="">Velocidad</a></h4>
            <p class="description">Sabemos que el tiempo es muy importante, por eso hacemos todo lo posible por evitar todo tipo de retrasos en nuestros vuelos, arriendos de vehículos u hospedajes.</p>
          </div>

          <div class="col-lg-4 box">
            <i class="ion-ios-heart-outline"></i>
            <h4 class="title"><a href="">Preocupación</a></h4>
            <p class="description">El bienestar de todos nuestros pasajeros es lo más importante.</p>
          </div>

        </div>
      </div>
    </section><!-- #featured-services -->

   <!--==========================
     SERVICIOS
    ============================-->
    <section id="about">
      <div class="container">

        <header class="section-header">
          <h3>Nuestros Servicios</h3>
          <p>Estos son los servicios que ofrece la Aerolínea G8, no te arrepentirás de explorarlos.</p>
        </header>

        <div class="row about-cols">

          <div class="col-md-4 wow fadeInUp">
            <div class="about-col" style="height:100%">
              <div class="img">
                <img src="{{asset('assets/img/destinos.jpeg')}}" alt="" class="img-fluid">
                <div class="icon"><i class="ion-plane"></i></div>
              </div>
              <h2 class="title"><a href="/buscar_vuelos">Busca tu Vuelo!</a></h2>
              <p>
                Aquí puedes encontrar todos los destinos que tenemos para ofrecerte.
              </p>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="about-col" style="height:100%">
              <div class="img">
                <img src="{{asset('assets/img/about-plan.jpg')}}" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-medkit"></i></div>
              </div>
              <h2 class="title"><a href="/buscar_seguros">Seguros</a></h2>
              <p>
                No olvides contratar tu seguro para tu viaje o durante tus vacaciones en el caribe.
              </p>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.2s">
            <div class="about-col" style="height:100%">
              <div class="img">
                <img src="{{asset('assets/img/hyatt.jpg')}}" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-home"></i></div>
              </div>
              <h2 class="title"><a href="/reservaHospedaje">Hoteles</a></h2>
              <p>
                Tenemos los mejores hoteles disponibles para que puedas disfrutar de las mejores comodidades en tus vacaciones y durante tu estadía en el destino que desees.
              </p>
            </div>
          </div>

        </div>

        <div class="row about-cols" style="margin-top: 5%;">

          <div class="col-md-4 wow fadeInUp">
            <div class="about-col" style="height:100%">
              <div class="img">
                <img src="{{asset('assets/img/paquete.jpg')}}" alt="" class="img-fluid">
                <div class="icon"><i class="ion-ios-box"></i></div>
              </div>
              <h2 class="title"><a href="/seleccion_tipo_paquetes">Paquetes</a></h2>
              <p>
                Los mejores paquetes con precios inigualables que incluyen un viaje de ida y regreso a los mejores sectores para vacacionar, con la estadía en los hoteles más destacados y los mejores vehiculos para desplazarte cómodamente.
              </p>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp" data-wow-delay="0.1s">
            <div class="about-col" style="height:100%">
              <div class="img">
                <img src="{{asset('assets/img/auto.jpg')}}" alt="" class="img-fluid">
                <div class="icon"><i class="ion-android-car"></i></div>
              </div>
              <h2 class="title"><a href="/buscar_autos">Autos</a></h2>
              <p>
                Si deseas reservar un vehículo para trasladarte, te ofrecemos una gran variedad de alternativas y los mejores precios.
              </p>
            </div>
          </div>

          <div class="col-md-4 wow fadeInUp">
            <div class="about-col" style="height:100%">
              <div class="img">
                <img src="{{asset('assets/img/destinos.jpeg')}}" alt="" class="img-fluid">
                <div class="icon"><i class="ion-plane"></i></div>
              </div>
              <h2 class="title"><a href="destinos">Destinos</a></h2>
              <p>
                Aquí puedes encontrar todos los destinos que tenemos para ofrecerte.
              </p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- #about -->

    <!--==========================
      Services Section
    ============================-->
    <section id="services">
      <div class="container">

        <header class="section-header wow fadeInUp">
          <h3>Nuestra empresa</h3>
          <p>Para garantizar solo lo mejor a nuestros clientes, la aerolinea G8 tiene ciertos pilares fundamentales al momento de entregar cualquier servicio.</p>
        </header>

        <div class="row">

          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-analytics-outline"></i></div>
            <h4 class="title"><a href="">Entrenamiento espacial</a></h4>
            <p class="description">Todos nuestros pilotos han sido capacitados en la nasa.</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-bookmarks-outline"></i></div>
            <h4 class="title"><a href="">Agendas</a></h4>
            <p class="description">Un vuelo agendado que ofrezcamos jamás será cancelado o aplazado.</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-paper-outline"></i></div>
            <h4 class="title"><a href="">Registros</a></h4>
            <p class="description">blablablabalablalba </p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
            <h4 class="title"><a href="">Eficiencia</a></h4>
            <p class="description">Siempre trataremos de entregar los servicios de la manera más puntual posible.</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-barcode-outline"></i></div>
            <h4 class="title"><a href="">Comodidad</a></h4>
            <p class="description">A toda costa haremos que los servicios que ofrecemos garanticen su comodidad y disfrute.</p>
          </div>
          <div class="col-lg-4 col-md-6 box wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
            <div class="icon"><i class="ion-ios-people-outline"></i></div>
            <h4 class="title"><a href="">Trabajo en equipo</a></h4>
            <p class="description">Con un equipo de trabajo unido y sincronizado nos aseguraremos de que no te haga falta nada.</p>
          </div>

        </div>


        

      </div>
    </section><!-- #services -->



    <!--==========================
      Team Section
    ============================-->
    <section id="team">
      <div class="container">
        <div class="section-header wow fadeInUp">
          <h3>Equipo</h3>
          <p>El equipo de trabajo encargado de darle vida a esta aerolínea es el siguiente</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 wow fadeInUp">
            <div class="member">
              <img src="{{asset('assets/img/percy.jpg')}}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Percy</h4>
                  <span>Chief Executive Officer</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
            <div class="member">
              <img src="{{asset('assets/img/jose.jpg')}}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>José Maureira</h4>
                  <span>Product Manager</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="member">
              <img src="{{asset('assets/img/vale.jpg')}}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Valentina Ligueño</h4>
                  <span>CTO</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
            <div class="member">
              <img src="{{asset('assets/img/diego.jpg')}}" class="img-fluid" alt="">
              <div class="member-info">
                <div class="member-info-content">
                  <h4>Diego Águila</h4>
                  <span>Accountant</span>
                  <div class="social">
                    <a href=""><i class="fa fa-twitter"></i></a>
                    <a href=""><i class="fa fa-facebook"></i></a>
                    <a href=""><i class="fa fa-google-plus"></i></a>
                    <a href=""><i class="fa fa-linkedin"></i></a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #team -->

      <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h3>Contactanos</h3>
          <p>Si tiene alguna duda o alguna consulta, no dude en contactarnos, intentaremos responderle a la brevedad</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Address</h3>
              <address>A108 Adam Street, PercyTown, Chile</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+155895548855">+1 5589 55488 55</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">aerolineag8@gmail.com</a></p>
            </div>
          </div>

        </div>

        <div class="form">
          <div class="alert alert-success" style="color:white;border:white" id="sendmessage"></div>
          <div id="errormessage" style="color:black;border:white" class="alert alert-success"></div>
          
          <form action="/enviar" method="post" role="form" class="contactForm">
            {{ csrf_field() }}
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Ingrese su nombre" required/>
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Ingrese su correo" required />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Asunto del mensaje" required/>
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Ingrese el contenido del mensaje"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button type="submit">Enviar Mensaje</button></div>
            <script>
            $('email').val("");
            </script>
          </form>
        </div>

      </div>
    </section><!-- #contact -->

  </main>



@endsection