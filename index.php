<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Censo Nacional - Conectar Igualdad</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="shortcut icon" href="favicon.ico" type="image/ico" />

        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/font-awesome.css">
        <!--[if lt IE 7]>
            <link rel="stylesheet" href="css/font-awesome-ie7">
        <![endif]-->
        <link rel="stylesheet" href="css/main.css">

        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">Estas usando un navegador <strong>desactualizado</strong>. Porfavor <a href="http://browsehappy.com/">actualizá tu navegador</a> o <a href="http://www.google.com/chromeframe/?redirect=true">activa Google Chrome Frame</a> para mejorar tu experiencia.</p>
        <![endif]-->
            
        <div class="wrap container">
            <div class="page-header">
                <a href="http://www.conectarigualdad.gob.ar/" target="_blank" id="logo-head"></a>
                <h1>Censo Nacional</h1>
            </div>

            <ul class="breadcrumb link-files" data-bind="foreach: files">
              <li>
                <a target="_blank" data-bind="attr: { id: id, href: link, title: title }">
                    <span data-bind="text: caption"></span> <i class="icon-download"></i>
                </a>
              </li>
            </ul>
            <small>Es ideal que descargue y lea estos archivos para lograr dimensionar el tipo de preguntas que el censo aplica.</small>
            <hr>

            <div id="cue-form" data-bind="visible: !pageLoading()" style="display: none;">
                <div class="form-group">
                    <div class="input-group input-group-lg">
                      <span class="input-group-addon ">CUE</span>
                      <label for="txtCue" class="sr-only">Cue:</label>
                      <input id="txtCue" name="CUE" type="text" pattern="0[0-9]{8}"
                             class="form-control" placeholder="Ingrese el numero CUE"
                             data-bind="value: cue, valueUpdate: 'afterkeydown'">    
                      <span class="input-group-btn">
                        <button class="btn btn-default" type="button"
                                data-bind="click: search, enable: canSearch"><i class="glyphicon glyphicon-search"></i></button>
                      </span>
                    </div>
                </div>
            </div>
            
            <div class="loader" data-bind="visible: (isLoading() || pageLoading())">
              <i class="icon-spinner icon-2x icon-spin active"></i>
            </div>
            
            <div class="alert alert-danger" data-bind="visible: notFinded()" style="display: none">
                <strong>CUE no encontrado</strong><br>
                <p>Comuníquese con el coordinador regional, puede que su escuela no haya sido elegida para realizar el censo.</p>
            </div>

            <div class="alert alert-danger" data-bind="visible: cueError()" style="display: none">
                <p>El CUE ingresado es incorrecto</p>
            </div>

            <div data-bind="with: result, visible: hasResult()" style="display: none">
                
                

                <dl class="dl-horizontal">
                  <dt>CUE:</dt>
                  <dd data-bind="text: cue"></dd>

                  <dt>Localidad:</dt>
                  <dd data-bind="text: localidad"></dd>

                  <dt>Departamento:</dt>
                  <dd data-bind="text: departamento"></dd>

                  <dt>Calle:</dt>
                  <dd data-bind="text: calle"></dd>

                  <dt>Nombre:</dt>
                  <dd data-bind="text: school_name"></dd>
                </dl>
                
                <div class="alert alert-warning">
                    <p><strong><i class="icon-warning-sign"></i> ATENCIÓN</strong></p>
                    <p>Recuerde que una vez que ingrese al siguiente Link y comience el censo éste no podrá ser modificado luego de guardar la información.</p>
                </div>

                <div class="well well-sm">
                    <p><strong>Ingreso de datos: </strong></p>
                    <button data-bind="click: $parent.clickLink" class="btn btn-primary btn-lg">Ir al formulario</button>
                    <p data-bind="visible: $parent.wrongLink()"><small>Si el link no funciona haga click <a data-bind="attr: { href: link}" target="_blank">Aquí</a></small></p>
                </div>
            </div>
          <div id="push"></div>

        </div>

        <footer>
            <div class="footter-wrapper container">
              <div class="clearfix">
                  <div class="footer-dte-logo"></div>
                  <div class="footer-ba-logo"></div>
              </div>
          </div>
        </footer>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
        <script>window.jQuery || document.write('<script src="js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
        <script src="js/vendor/knockout-3.0.0.js"></script>
        <script src="js/vendor/underscore-min.js"></script>
        <script src="js/vendor/bootstrap.min.js"></script>

        <script src="js/main.js"></script>

        <script>
          (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
          (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
          m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
          })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

          ga('create', 'UA-45867786-1', 'nticx.net');
          ga('send', 'pageview');
        </script>
    </body>
</html>
