<!DOCTYPE html>

<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <?php
    date_default_timezone_set('America/El_Salvador');
    $date = date('Y-m-d');
    ?>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>La Guía De La Vida | Cuestionario</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="assets/js/config.js"></script>
    
    <!-- Quiz JS and CSS IFrame -->
    <script src="quiz.js"></script>
    <style>
      .iframe-responsivo {
        display: inline-block;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        border: 0;
      }

      #inicio{ 
        color: #0e3a3b;; 
      }

      #inicio:hover{ 
        color: #b99853; 
      }

      #buttonForm{ 
        background-color: #0e3a3b;; 
      }

      #buttonForm:hover{ 
        background-color: #b99853 !important; 
      }

      #siguiente{ 
        background-color: #0e3a3b; 
      }

      #siguiente:hover{ 
        background-color: #b99853 !important; 
      }

      #cuestionario-form{
        color: #b99853;
      }

      a:link {
        color: #b99853;
      }

      a:visited {
        color: #b99853;
      }

      .d-block{
        border-radius:10px;
      }

      /* Fondo oscuro del modal */
      .modal-content {
        background-color: #0e3a3b;
        color: white;
        border: 2px solid #b99853; /* Contorno dorado */
        border-radius: 10px;
      }

      /* Cabecera del modal */
      .modal-header {
        border-bottom: 2px solid #b99853; /* Línea divisoria dorada */
        background-color: #0e3a3b;
        color: white;
      }

      /* Botón de cierre */
      .modal-header .close {
        color: #b99853;
        font-size: 1.5rem;
        opacity: 1;
      }

      /* Título del modal */
      .modal-title {
        font-weight: bold;
        color: #b99853;
      }

      /* Fondo del carrusel caption */
      .carousel-caption {
        background-color: rgba(0, 0, 0, 0.5);
        padding: 1rem;
        border-radius: 8px;
      }

      /* Fondo oscuro detrás del modal */
      .modal-backdrop.show {
        background-color: rgba(0, 0, 0, 0.85);
      }

      .carousel-control-prev-icon{
        background-color: #b99853
      }

      .carousel-control-next-icon{
        background-color: #b99853
      }
    </style>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        

        <!-- Layout container -->
        <div class="layout-page" style="background-color:#0e3a3b;font-family:'Montserrat', sans-serif;">
          <!-- Navbar -->

          <nav
            class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
            id="layout-navbar">
            <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
              <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
              </a>
            </div>

            <!-- Search -->
            <div class="navbar-nav align-items-center">
              <img src="assets/img/backgrounds/buho.png">
            </div>
            
            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
              <!-- Search -->
              <div class="navbar-nav align-items-center">
                <div class="nav-item d-flex align-items-center">
                  <h1 style="margin-top:10%;color:#0e3a3b;"><b>La Guía de la Vida</b></h1>
                </div>
              </div>
            </div>

            <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Place this tag where you want the button to render. -->
                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                  <a class="nav-link dropdown-toggle hide-arrow" href="https://laguiadelavida.com.mx/">
                    <span class="app-brand-text menu-text fw-bolder ms-2"><h3 id="inicio"><b> <i class="bx bx-home"></i> Inicio </b></h3></span>
                  </a>
                </li>
                <!--/ User -->
              </ul>
            </div>
          </nav>

          <!-- / Navbar -->

          <!-- Content wrapper -->
            <!-- Content -->
            <div class="container-xxl flex-grow-1 container-p-y">

              <!-- Basic Layout & Basic with Icons -->
              <div class="col-xl-12">
                  <div class="nav-align-top mb-4">
                    <ul class="nav nav-tabs nav-fill" role="tablist">
                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link active"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-justified-home"
                          aria-controls="navs-justified-home"
                          aria-selected="true"
                          id = "button-justified-home"
                          disabled = "true"
                        >
                          <i class="tf-icons bx bx-edit-alt"></i> Sección de cuestionarios
                        </button>
                      </li>
                      <li class="nav-item">
                        <button
                          type="button"
                          class="nav-link"
                          role="tab"
                          data-bs-toggle="tab"
                          data-bs-target="#navs-justified-messages"
                          aria-controls="navs-justified-messages"
                          aria-selected="false"
                          id = "button-justified-messages"
                          disabled = "true"
                        >
                          <i class="tf-icons bx bx-mail-send"></i> Notificación
                        </button>
                      </li>
                    </ul>
                    
                    <!-- section primary quiz -->
                    <div class="tab-content" style="background-color:#0e3a3b;border:2px solid #b99853;">
                      <div class="tab-pane fade show active" id="navs-justified-home" role="tabpanel">
                        <div class="row">
                          <!-- Basic with Icons -->
                          <div class="col-xl">
                            <div class="card mb-4" style="background-color:#0e3a3b;" id="cuestionario-form">
                              <div class="card-header d-flex justify-content-between align-items-center">
                                <h5 class="mb-0" style="color:#b99853;">¡Ayúdanos contestando el siguiente cuestionario para saber más sobre ti!</h5>
                                <small class="text-muted float-end" style="color:#b99853;"><b style="color:#b99853;">Los datos con * son requeridos. </b></small>
                              </div>
                              <div class="card-body">
                                <form id="formQuiz">
                                  <div class="mb-3">
                                    <label class="form-label" for="basic-icon-default-fullname" style="color:#b99853;">Nombre(s)</label>
                                    <div class="input-group input-group-merge" style="border:3px solid #b99853; border-radius:11px;">
                                      <span id="basic-icon-default-fullname2" class="input-group-text"
                                        ><i class="bx bx-user"></i
                                      ></span>
                                      <input
                                        type="text"
                                        class="form-control"
                                        id="basic-icon-default-fullname"
                                        placeholder=" Juan Agustin"
                                        aria-label=" Juan Agustin"
                                        aria-describedby="basic-icon-default-fullname2"
                                      />
                                      <span class="input-group-text" id="basic-default-fullname2">*</span>
                                    </div>
                                  </div>
                                  <div class="mb-3">
                                    <label class="form-label" for="basic-icon-default-lastname" style="color:#b99853;">Apellidos</label>
                                    <div class="input-group input-group-merge" style="border:3px solid #b99853; border-radius:11px;">
                                      <span id="basic-icon-default-lastname2" class="input-group-text"
                                        ><i class="bx bxs-user"></i
                                      ></span>
                                      <input
                                        type="text"
                                        id="basic-icon-default-lastname"
                                        class="form-control"
                                        placeholder=" Perez Hernandez"
                                        aria-label=" Perez Hernandez"
                                        aria-describedby="basic-icon-default-lastname2"
                                      />
                                      <span class="input-group-text" id="basic-default-lastname2">*</span>
                                    </div>
                                  </div>
                                  <!-- div doble form-->
                                  <div class="row"> 
                                    <div class="col-lg-6 mb-4 mb-xl-0">
                                      <div class="mb-3">
                                        <label class="form-label" for="basic-icon-default-email" style="color:#b99853;">Correo</label>
                                        <div class="input-group input-group-merge" style="border:3px solid #b99853; border-radius:11px;">
                                          <span class="input-group-text"><i class="bx bxs-envelope"></i></span>
                                          <input
                                            type="text"
                                            id="basic-icon-default-email"
                                            class="form-control"
                                            placeholder=" ejemplo.correo@ejemplo.com"
                                            aria-label=" ejemplo.correo@ejemplo.com"
                                            aria-describedby="basic-icon-default-email2"
                                          />
                                          <span class="input-group-text" id="basic-default-email2">*</span>
                                        </div>
                                        <div class="form-text" style="color:#b99853;">Puedes agregar números, letras y caracteres.</div>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <label class="form-label" for="basic-icon-default-psw" style="color:#b99853;">Contraseña <i class='bx  bx-help-circle' title="La contraseña que ingreses aquí sera usada para tu perfil que vamos a crear." id="activarCarrusel"></i> </label>
                                      <div class="input-group input-group-merge" style="border:3px solid #b99853; border-radius:11px;">
                                        <span id="basic-icon-default-psw2" class="input-group-text"><i class="bx bxs-key"></i></span>
                                        <input
                                          type="text"
                                          id="basic-icon-default-psw"
                                          class="form-control"
                                          placeholder=" Mi_contraseña123"
                                          aria-label=" Mi_contraseña123"
                                          aria-describedby="basic-icon-default-psw2"
                                          onkeyup="maskInput()"
                                        />
                                        <span class="input-group-text" id="basic-default-psw2">*</span>
                                      </div>
                                      <div class="form-text" style="color:#b99853;">La contraseña debe ser minimo de 8 caracteres puedes agregar números, letras y caracteres.</div>
                                    </div>
                                  </div>
                                  <!-- termina div doble form-->
                                  <div class="mb-3">
                                    <label class="form-label" for="html5-date-input" style="color:#b99853;">Fecha de Nacimiento <i class='bx  bx-help-circle' title="Agrega tu fecha de nacimiento, ocupando el icono de calendario del lado derecho." id="activarCarrusel"></i> </label> 
                                    <div class="input-group input-group-merge" style="border:3px solid #b99853; border-radius:11px;">
                                      <span id="basic-icon-default-date2" class="input-group-text"
                                        ><i class="bx bx-calendar"></i
                                      ></span>
                                      <input 
                                          class="form-control" 
                                          type="date" 
                                          value="<?php echo $date; ?>"
                                          id="html5-date-input" />
                                      <span class="input-group-text" id="basic-default-date2">*</span>
                                    </div>
                                  </div>
                                  <div class="mb-3">
                                    <label class="form-label" for="basic-icon-default-achi" style="color:#b99853;">¿Cuál es el logro del que te sientes más orgullos@ hasta ahora?</label>
                                    <div class="input-group input-group-merge" style="border:3px solid #b99853; border-radius:11px;">
                                      <span id="basic-icon-default-achi2" class="input-group-text"
                                        ><i class="bx bx-comment-detail"></i
                                      ></span>
                                      <textarea
                                        id="basic-icon-default-achi"
                                        class="form-control"
                                        placeholder=" Escribe aqui tu respuesta..."
                                        aria-label=" Escribe aqui tu respuesta..."
                                        aria-describedby="basic-icon-default-achi2"
                                      ></textarea>
                                    </div>
                                  </div>
                                  <!-- div doble form-->
                                  <div class="row"> 
                                    <div class="col-lg-6 mb-4 mb-xl-0">
                                      <div class="mb-3">
                                        <label class="form-label" for="basic-icon-default-pasion" style="color:#b99853;">¿Hay alguna materia o tema que te apasione especialmente en la escuela?</label>
                                        <div class="input-group input-group-merge" style="border:3px solid #b99853; border-radius:11px;">
                                          <span class="input-group-text"><i class="bx bxs-book"></i></span>
                                          <input
                                            type="text"
                                            id="favorite-theme"
                                            class="form-control"
                                            placeholder=" Escribe tu respuesta..."
                                            aria-label=" Escribe tu respuesta..."
                                            aria-describedby="basic-icon-default-pasion2"
                                          />
                                          <span class="input-group-text" id="basic-default-pasion2">*</span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <label class="form-label" for="basic-icon-default-whypasion" style="color:#b99853;">¿Por qué?</label>
                                      <div class="input-group input-group-merge" style="border:3px solid #b99853; border-radius:11px;">
                                        <span id="basic-icon-default-whypasion2" class="input-group-text"
                                          ><i class="bx bx-comment-detail"></i
                                        ></span>
                                        <textarea
                                          id="basic-icon-default-whypasion"
                                          class="form-control"
                                          placeholder=" Escribe aqui tu respuesta..."
                                          aria-label=" Escribe aqui tu respuesta..."
                                          aria-describedby="basic-icon-default-whypasion2"
                                        ></textarea>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- termina div doble form-->
                                  <div class="mb-3">
                                    <label class="form-label" for="basic-icon-default-activities" style="color:#b99853;">¿Qué actividades te apasionan fuera del salón de clases?</label>
                                    <div class="input-group input-group-merge" style="border:3px solid #b99853; border-radius:11px;">
                                      <span id="basic-icon-default-activities2" class="input-group-text"
                                        ><i class="bx bx-comment-detail"></i
                                      ></span>
                                      <textarea
                                        id="basic-icon-default-activities"
                                        class="form-control"
                                        placeholder=" Escribe aqui tu respuesta..."
                                        aria-label=" Escribe aqui tu respuesta..."
                                        aria-describedby="basic-icon-default-activities2"
                                      ></textarea>
                                    </div>
                                  </div>
                                  <!-- div doble form-->
                                  <div class="row"> 
                                    <div class="col-lg-6 mb-4 mb-xl-0">
                                      <div class="mb-3">
                                        <label class="form-label" for="basic-icon-default-materials" style="color:#b99853;">¿Qué materias o actividades en la escuela no te gustan?</label>
                                        <div class="input-group input-group-merge" style="border:3px solid #b99853; border-radius:11px;">
                                          <span class="input-group-text"><i class="bx bxs-book-open"></i></span>
                                          <input
                                            type="text"
                                            id="basic-icon-default-materials"
                                            class="form-control"
                                            placeholder=" Escribe tu respuesta..."
                                            aria-label=" Escribe tu respuesta..."
                                            aria-describedby="basic-icon-default-materials2"
                                          />
                                          <span class="input-group-text" id="basic-default-materials2">*</span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <label class="form-label" for="basic-icon-default-whymaterials" style="color:#b99853;">¿Por qué?</label>
                                      <div class="input-group input-group-merge" style="border:3px solid #b99853; border-radius:11px;">
                                        <span id="basic-icon-default-whymaterials2" class="input-group-text"
                                          ><i class="bx bx-comment-detail"></i
                                        ></span>
                                        <textarea
                                          id="basic-icon-default-whymaterials"
                                          class="form-control"
                                          placeholder=" Escribe aqui tu respuesta..."
                                          aria-label=" Escribe aqui tu respuesta..."
                                          aria-describedby="basic-icon-default-whymaterials2"
                                        ></textarea>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- termina div doble form-->
                                  <div class="mb-3">
                                    <label class="form-label" for="basic-icon-default-admire" style="color:#b99853;">¿A quién admiras y por qué razones le admiras?</label>
                                    <div class="input-group input-group-merge" style="border:3px solid #b99853; border-radius:11px;">
                                      <span id="basic-icon-default-admire2" class="input-group-text"
                                        ><i class="bx bx-comment-detail"></i
                                      ></span>
                                      <textarea
                                        id="basic-icon-default-admire"
                                        class="form-control"
                                        placeholder=" Escribe aqui tu respuesta..."
                                        aria-label=" Escribe aqui tu respuesta..."
                                        aria-describedby="basic-icon-default-admire2"
                                      ></textarea>
                                    </div>
                                  </div>
                                  <!-- div doble form-->
                                  <div class="row"> 
                                    <div class="col-lg-6 mb-4 mb-xl-0">
                                      <div class="mb-3">
                                        <label class="form-label" for="basic-icon-default-parents" style="color:#b99853;">¿Tus papás están inclinados o prefieren que estudies una carrera y/o en una universidad en específico?</label>
                                        <div class="input-group input-group-merge" style="border:3px solid #b99853; border-radius:11px;">
                                          <span class="input-group-text"><i class="bx bxs-group"></i></span>
                                          <input
                                            type="text"
                                            id="basic-icon-default-parents"
                                            class="form-control"
                                            placeholder=" Escribe tu respuesta..."
                                            aria-label=" Escribe tu respuesta..."
                                            aria-describedby="basic-icon-default-parents2"
                                          />
                                          <span class="input-group-text" id="basic-default-parents2">*</span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <label class="form-label" for="basic-icon-default-whyparents" style="color:#b99853;">¿Cuál y por qué?</label>
                                      <div class="input-group input-group-merge" style="border:3px solid #b99853; border-radius:11px;">
                                        <span id="basic-icon-default-whyparents2" class="input-group-text"
                                          ><i class="bx bx-comment-detail"></i
                                        ></span>
                                        <textarea
                                          id="basic-icon-default-whyparents"
                                          class="form-control"
                                          placeholder=" Escribe aqui tu respuesta..."
                                          aria-label=" Escribe aqui tu respuesta..."
                                          aria-describedby="basic-icon-default-whyparents2"
                                        ></textarea>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- termina div doble form--> 
                                  <!-- div doble form-->
                                  <div class="row"> 
                                    <div class="col-lg-6 mb-4 mb-xl-0">
                                      <div class="mb-3">
                                        <label class="form-label" for="basic-icon-default-careerspecific" style="color:#b99853;">¿Tú estás inclinado o prefieres estudiar una carrera y/o en una universidad en específico?</label>
                                        <div class="input-group input-group-merge" style="border:3px solid #b99853; border-radius:11px;">
                                          <span class="input-group-text"><i class="bx bxs-book-bookmark"></i></span>
                                          <input
                                            type="text"
                                            id="basic-icon-default-careerspecific"
                                            class="form-control"
                                            placeholder=" Escribe tu respuesta..."
                                            aria-label=" Escribe tu respuesta..."
                                            aria-describedby="basic-icon-default-careerspecific2"
                                          />
                                          <span class="input-group-text" id="basic-default-careerspecific2">*</span>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <label class="form-label" for="basic-icon-default-whycareerspecific" style="color:#b99853;">¿Cuál y por qué?</label>
                                      <div class="input-group input-group-merge" style="border:3px solid #b99853; border-radius:11px;">
                                        <span id="basic-icon-default-whycareerspecific2" class="input-group-text"
                                          ><i class="bx bx-comment-detail"></i
                                        ></span>
                                        <textarea
                                          id="basic-icon-default-whycareerspecific"
                                          class="form-control"
                                          placeholder=" Escribe aqui tu respuesta..."
                                          aria-label=" Escribe aqui tu respuesta..."
                                          aria-describedby="basic-icon-default-whycareerspecific2"
                                        ></textarea>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- termina div doble form--> 
                                  <div class="mb-3">
                                    <label class="form-label" for="basic-icon-default-companys" style="color:#b99853;">Enlista 3 empresas en las cuales te gustaría trabajar</label>
                                    <div class="input-group input-group-merge" style="border:3px solid #b99853; border-radius:11px;">
                                      <span id="basic-icon-default-companys2" class="input-group-text"
                                        ><i class="bx bxs-buildings"></i
                                      ></span>
                                      <input
                                        type="text"
                                        id="basic-icon-default-companys"
                                        class="form-control"
                                        placeholder=" Empresa1, Empresa2, Empresa3"
                                        aria-label=" Empresa1, Empresa2, Empresa3"
                                        aria-describedby="basic-icon-default-companys2"
                                      />
                                      <span class="input-group-text" id="basic-default-careerspecific2">*</span>
                                    </div>
                                  </div>
                                  <!-- div doble form-->
                                  <div class="row"> 
                                    <div class="col-lg-6 mb-4 mb-xl-0">
                                      <div class="mb-3">
                                        <label class="form-label" for="basic-icon-default-companys" style="color:#b99853;">
                                          <a href="https://www.16personalities.com/es/test-de-personalidad" target="_blank" title="Da clic aquí para abrir el segundo cuestionario"><i class="bx bx-link"></i>  
                                          Vamos al segundo cuestionario ...</label></a> 
                                      </div>
                                    </div>
                                    <div class="col-lg-6">
                                      <div class="mb-3">
                                        <label class="form-label" for="basic-icon-default-companys" style="color:#b99853;" onclick="showCarrusel();">
                                          <i class='bx  bx-help-circle' title="Da clic aquí si tienes dudas" id="activarCarrusel"></i> 
                                          Da clic aqui si tienes dudas sobre como contestar y agregar el segundo cuestionario.</label>
                                      </div>
                                    </div>
                                  </div>
                                  <!-- termina div doble form-->
                                  <div class="mb-3">
                                    <label class="form-label" for="basic-icon-default-link" style="color:#b99853;">Agrega tus resultados del segundo cuestionario</label>
                                    <div class="input-group input-group-merge" style="border:3px solid #b99853; border-radius:11px;">
                                      <span id="basic-icon-default-link2" class="input-group-text"
                                        ><i class="bx bxs-news"></i
                                      ></span>
                                      <input
                                        type="text"
                                        id="basic-icon-default-link"
                                        class="form-control"
                                        placeholder=" Url de tus resultados aquí"
                                        aria-label=" Url de tus resultados aquí"
                                        aria-describedby="basic-icon-default-link2"
                                      />
                                      <span class="input-group-text" id="basic-default-careerspecific2">*</span>
                                    </div>
                                  </div>
                                </div>
                                  <button type="button" style="background-color:#0e3a3b;border-color:#b99853;"
                                    id="buttonForm"
                                    class="btn btn-primary nav-link" 
                                    onclick = "saveValidateForm();">
                                      <b>Siguiente</b>
                                  </button>
                                </br>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      

                      <!-- section quiz | seccion eliminada recuperar en archivo quiz-backup.txt -->

                        <!-- section message -->
                        <div class="tab-pane fade" id="navs-justified-messages" role="tabpanel" style="text-align: center;">
                          <h3 style="color:#b99853;">¡Gracias por responder el cuestionario!</h3>
                          <p class="mb-0" style="color:#b99853;">
                            Revisa tu correo para las instrucciones de los siguientes pasos.
                          </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
            <!-- / Content -->

            <!-- Footer -->
            <footer class="content-footer footer bg-footer-theme">
              <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                  ©
                  <script>
                    document.write(new Date().getFullYear());
                  </script>
                  , elaborado por
                  <a href="https://laguiadelavida.com.mx/" target="_blank" class="footer-link fw-bolder">La Guía De La Vida</a>
                </div>
              </div>
            </footer>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->
     <!-- Modal -->
    <div class="modal fade" id="modalCarrusel" tabindex="-1" role="dialog" aria-labelledby="modalCarruselLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalCarruselLabel">Pasos para llenar y agregar el segundo cuestionario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
              <span aria-hidden="true" onclick="hideCarrusel();">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <!-- Carrusel dentro del modal -->
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <span style="color:#b99853;">1. Contesta el cuestionario hasta terminar los 10 bloques de preguntas.</span>
                  <br/>
                  <img class="d-block w-100" src="assets/img/elements/step1.png" alt="Primer slide">
                </div>
                <div class="carousel-item">
                  <span style="color:#b99853;">2. Al estar cerca de finalizar marca tu sexo para tu avatar, clic en "Ver resultados".</span>
                  <br/>
                  <img class="d-block w-100" src="assets/img/elements/step2.png" alt="Segundo slide">
                </div>
                <div class="carousel-item">
                  <span style="color:#b99853;">3. Dale un vistazo a tus resultados, al finalizar dale clic en "Comparte tus resultados".</span>
                  <br/>
                  <img class="d-block w-100" src="assets/img/elements/step3.png" alt="Tercer slide">
                </div>
                <div class="carousel-item">
                  <span style="color:#b99853;">4. Al abrir la ventana emergente ve a la sección "Tus resultados personales" y da clic en el icono para compartir.</span>
                  <br/>
                  <img class="d-block w-100" src="assets/img/elements/step4.png" alt="Cuarto slide">
                </div>
                <div class="carousel-item">
                  <span style="color:#b99853;">5. Se abrirara una ventana similar a esta, da clic en el icono para copiar el link de tus resultados.</span>
                  <br/>
                  <img class="d-block w-100" src="assets/img/elements/step5.png" alt="Quinto slide">
                </div>
                <div class="carousel-item">
                  <span style="color:#b99853;">6. Ahora solo pega el link de tus resultados en el formulario "La Guía de la Vida".</span>
                  <br/>
                  <img class="d-block w-100" src="assets/img/elements/step6.png" alt="Sexto slide">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Anterior</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Siguiente</span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="assets/vendor/libs/jquery/jquery.js"></script>
    <script src="assets/vendor/libs/popper/popper.js"></script>
    <script src="assets/vendor/js/bootstrap.js"></script>
    <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/css/alertify.min.css" rel="stylesheet"/>
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.11.0/build/alertify.min.js"></script>
    <!-- jQuery, Popper.js, and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>
