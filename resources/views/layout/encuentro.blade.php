@extends('layout.navbar')
@section('title', 'Proyectos')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 text-center mdl-cell--hide-phone mdl-cell--hide-tablet">
            <img src="{{ asset('img/logo_color.png') }}" alt="Encuentro Internacional Sobre la Enseñanza del Cálculo, Ciencias y Matématicas" class="img-fluid" style="width: 40%;">
        </div>
        <div class="col-12 text-center mdl-cell--hide-desktop">
            <img src="{{ asset('img/logo_color.png') }}" alt="Encuentro Internacional Sobre la Enseñanza del Cálculo, Ciencias y Matématicas" class="img-fluid">
        </div>
        <div class="col-12 text-center mdl-cell--hide-phone mdl-cell--hide-tablet">
            <p class="lead">
                La Universidad Tecnológica del Valle de Toluca y el Departamento de Matemática Educativa del
                CINVESTAV hacen una cordial invitación a la comunidad académica para participar en el XIV
                Encuentro Internacional sobre la Enseñanza del Cálculo, Ciencias y Matemáticas.
            </p>
        </div>
        <div class="col-12 text-center mdl-cell--hide-desktop">
            <p>
                La Universidad Tecnológica del Valle de Toluca y el Departamento de Matemática Educativa del
                CINVESTAV hacen una cordial invitación a la comunidad académica para participar en el XIV
                Encuentro Internacional sobre la Enseñanza del Cálculo, Ciencias y Matemáticas.
            </p>
        </div>
        <div class="col-12 text-center my-4">
            <a href="{{ Storage::url('proposals/encuentroInternacional.pdf') }}" type="button" class="mdl-chip" style="background-color: #0178a0; color: white;">
                <span class="mdl-chip__text">ENCUENTRO INTERNACIONAL</span>
            </a>
        </div>
        <div class="col-sm-12 col-md-6 text-center mt-4">
            <p class="h3" style="color: #0078a0;">Comité Ejecutivo</p>
            <hr>
            <p> <strong>Presidente:</strong> <br> Dra. Magally Martínez Reyes <br> Universidad Autónoma del Estado de México </p>
            <br>
            <p> <strong>Presidente Fundador:</strong> <br> Dr. Carlos Armando Cuevas Vallejo <br> CINVESTAV-IPN </p>
            <br>
            <p> <strong>Vicepresidente:</strong> <br> Dr. Miguel Delgado Pineda <br> Universidad Nacional de Educación a Distancia </p>
            <br>
            <p> <strong>Secretario General:</strong> <br> Dr. José del Carmen Orozco Santiago <br> Benemérita Universidad Autónoma de Puebla </p>
        </div>
        <div class="col-sm-12 col-md-6 text-center mt-4">
            <p class="h3" style="color: #0078a0;">Integrantes de Comité Ejecutivo</p>
            <hr>
            <p> M.C. Heidy Cecilia Chavira <br> Universidad Autónoma de Ciudad Juárez </p>
            <br>
            <p> M.C. Juan de Dios Miramontes Miranda <br> Universidad Autónoma de Ciudad Juárez </p>
            <br>
            <p> Dra. Judith Hernández Sánchez. <br> Universidad Autónoma de Zacatecas </p>
            <br>
            <p> Dra. Rosa Elvira Páez <br> Universidad Autónoma de la Ciudad de México </p>
            <br>
            <p> Dra. Lilia López Vera <br> Universidad Autónoma de Nuevo León </p>
            <br>
            <p> Dr. Rigoberto Gabriel Argüelles <br> Universidad Veracruzana </p>
            <br>
            <p> Dra. Eloísa Benítez Mariño <br> Universidad Veracruzana </p>
            <br>
            <p> Dr. José Luis Díaz Gómez <br> Universidad de Sonora </p>
            <br>
            <p> Dr. Ramiro Ávila Godoy <br> Universidad de Sonora </p>
            <br>
            <p> Dr. Eduardo Briceño Solís <br> Universidad Autónoma de Zacatecas </p>
            <br>
            <p> Dra. Darly Kú Euán <br> Universidad Autónoma de Zacatecas </p>
        </div>
        <div class="col-sm-12 col-md-12 text-center mt-4">
            <p class="h3" style="color: #0078a0;">Universidades Participantes</p>
            <hr>
            <p>CINVESTAV-IPN</p>
            <p>Universidad Autónoma del Estado de México</p>
            <p>Universidad Nacional de Educación a Distancia</p>
            <p>Universidad Autónoma de Nuevo León</p>
            <p>Universidad Autónoma de Ciudad Juárez</p>
            <p>Universidad Autónoma de la Ciudad de México</p>
            <p>Universidad Veracruzana</p>
            <p>Universidad de Sonora</p>
            <p>Universidad Autónoma de Zacatecas</p>
            <p>Universidad Autónoma de Coahuila</p>
            <p>Benemérita Universidad Autónoma de Puebla</p>
            <p>Universidad Autónoma de Baja California</p>
            <p>Universidad Autónoma de Tlaxcala</p>
            <p>Universidad Politécnica de Texcoco</p>
            <p>Universidad Tecnológica del Valle de Toluca</p>
        </div>
        <div class="col-12 text-center mdl-cell--hide-phone mdl-cell--hide-tablet">
            <img src="{{ asset('img/CVT_LOGOS.png') }}" alt="Encuentro Internacional Sobre la Enseñanza del Cálculo, Ciencias y Matématicas" style="width: 60%;">
        </div>
        <div class="col-12 text-center mdl-cell--hide-desktop">
            <img src="{{ asset('img/CVT_LOGOS.png') }}" alt="Encuentro Internacional Sobre la Enseñanza del Cálculo, Ciencias y Matématicas" class="img-fluid">
        </div>
        <div class="col-sm-12 col-md-12 text-center mt-4">
            <p class="h3" style="color: #0078a0;">Patrocinadores</p>
            <hr>
            <p>Agradecemos la colaboración de nuestros patrocinadores
                Comunidad GeoGebra de Latinoamérica, CASIO, Red Mexicana de
                Investigación en Tecnologías Emergentes para la Educación A.C.,
                (REMITEE) y Asociación Nacional por la Inclusividad Educativa en
                México (ANIEM), para la realización con éxito del XIV EICAL.Agradecemos la colaboración de nuestros patrocinadores
                Comunidad GeoGebra de Latinoamérica, CASIO, Red Mexicana de
                Investigación en Tecnologías Emergentes para la Educación A.C.,
                (REMITEE) y Asociación Nacional por la Inclusividad Educativa en
                México (ANIEM), para la realización con éxito del XIV EICAL.</p>
        </div>
        <div class="col-12 text-center mdl-cell--hide-phone mdl-cell--hide-tablet">
            <img src="{{ asset('img/PATROCINADORES.png') }}" alt="Encuentro Internacional Sobre la Enseñanza del Cálculo, Ciencias y Matématicas" style="width: 40%;">
        </div>
        <div class="col-12 text-center mdl-cell--hide-desktop">
            <img src="{{ asset('img/PATROCINADORES.png') }}" alt="Encuentro Internacional Sobre la Enseñanza del Cálculo, Ciencias y Matématicas" class="img-fluid">
        </div>
    </div>
</div>

<script>
    var navbar = document.querySelector('#encuentro');
    navbar.className = "mdl-layout__tab is-active";
</script>

@endsection