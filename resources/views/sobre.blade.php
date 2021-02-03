@extends('templates.principal')

@section('content')
<div class="container mt-2">
    <h1>Sobre o sistema</h1>
    <div class="row">
        <div class="col-md-12 m-0 ">
            <p class="text-start m-0 p-1">O sistema é desenvolvido como parte dos requisitos para o processo de seleção da empresa 
                <a href='https://gamemind.com.br/index.html' target="_blank"> <strong>Game Mind</strong></a> e nos requisitos preliminares
                passados pela mesma, o sistema esta liberado como se o usuario tivesse os privilégios de um administrador de todo o site
                então ele tem poder sobre todos os recursos já implementados.
            </p>
            <h2>Sobre o desenvolvedor</h2>
            <p class="text-start m-0 p-1"> Lucas Moura Miranda, Bacharel em Sistemas de informação e Técnico de Informática, ambas as formações no Instituto Federal do Ceará.</p>
            <p class="text-start m-0 p-1">Desde sempre gosta da área de tecnologia e gosta de saber como as coisas acontecem por tras dos "panos" nos diversos
                sites que ja utilizou, é dedicado, estudioso, faz amigos fácil, muito comunicativo e atencioso.
            </p>
        </div>
        <div class="col-md-12 ">
            <!--Section: Contact v.2-->
            <section class="mb-4">

                <!--Section heading-->
                <h2 class="h1-responsive font-weight-bold text-center my-4">Entre em contato</h2>
                <!--Section description-->
                <p class="text-center w-responsive mx-auto mb-5">Alguma duvida? sugestão ou problema, 
                    entre em contato que te ajudaremos com prazer.</p>

                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-9 mb-md-0 mb-5">
                        <form id="contact-form" name="contact-form" action="mail.php" method="POST">

                            <!--Grid row-->
                            <div class="row">

                                <!--Grid column-->
                                <div class="col-md-6">
                                    <div class="md-form mb-0">
                                        <label for="name" class="">Seu nome:</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                </div>
                                <!--Grid column-->

                                <!--Grid column-->
                                <div class="col-md-6">
                                    <div class="md-form mb-0">
                                        <label for="email" class="">Seu e-mail:</label>
                                        <input type="email" id="email" name="email" class="form-control">
                                    </div>
                                </div>
                                <!--Grid column-->

                            </div>
                            <!--Grid row-->
                            <div class="row mb-2">

                                <!--Grid column-->
                                <div class="col-md-12">

                                    <div class="md-form">
                                        <label for="message">Sua mensagem:</label>
                                        <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                                    </div>

                                </div>
                            </div>
                            <!--Grid row-->

                            <div class="text-center text-md-left">
                                <button class="btn btn-primary" type="submit">Enviar</button>
                            </div>
                        </form>

                        
                        <div class="status"></div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-3 text-center">
                        <ul class="list-unstyled mb-0">
                            <li><i class="bi-2x bi-geo-alt-fill"  style="font-size:30px;" ></i>
                                <p>Cedro, São José 1010, CE</p>
                            </li>

                            <li><i class="bi bi-telephone-fill" style="font-size:30px;"></i>
                                <p>(88) 9 9312-0461</p>
                            </li>

                            <li><i class="bi bi-envelope-fill"  style="font-size:30px;" ></i>
                                <p>lucaspower8@gmail.com</p>
                            </li>
                        </ul>
                    </div>
                    <!--Grid column-->

                </div>

            </section>
        </div>
    </div>
</div>
@endsection