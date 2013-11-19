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
                <h1>Censo Nacional  <a id="logo-head"></a></h1>
            </div>

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

            <div data-bind="with: result, visible: hasResult()" style="display: none">
                <p>
                    <strong>CUE :</strong>
                    <span data-bind="text: cue"></span>
                </p>
                <p>
                    <strong>Localidad :</strong>
                    <span data-bind="text: localidad"></span>
                </p>
                <p>
                    <strong>Departamento :</strong>
                    <span data-bind="text: departamento"></span>
                </p>
                <p>
                    <strong>Nombre :</strong>
                    <span data-bind="text: school_name"></span>
                </p>
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
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
