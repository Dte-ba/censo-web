;

!function($, ko, _, window, undefined){

  var cueRegex = /^0[0-9]{8}$/;

  var files = [
    {
      id: 'to-guia',
      link: 'files/Documento_censo_Bs_AS.docx',
      title: 'Guía',
      caption: 'Guía ',
      popover: '<strong>¿Qué es?</strong> <br> <br> <p>Descargando este archivo encontrará una guía clara y concisa que le mostrará los distintos formularios que contempla el CENSO.</p>'
    },
    /*{
      id: 'to-ett',
      link: 'files/ENTREVISTA_SEGUIMIENTO_ETT.pdf',
      title: 'Entrevista Seguimiento ETT',
      caption: 'Entrevista Seguimiento ETT ',
      popover: 'Descargando este archivo en formato PDF podrá monitorear las preguntas referidas al censo.'
    },*/
    {
      id: 'to-form',
      link: 'files/ENTREVISTA_SEGUIMIENTO_ETT.pdf',
      title: 'Formulario v2',
      caption: 'Formulario v2 ',
      popover: 'Descargando este archivo en formato PDF encontrará las preguntas referidas al censo.'
    },
    {
      id: 'to-pres',
      link: 'files/PRESENTACION_RELEVAMIENTO_TECNICO_Bs_As.pptx',
      title: 'Presentación',
      caption: 'Presentación',
      popover: 'Descargando este archivo Ud. se encontrará con una presentación realizada en Power Point con toda la información necesaria para realizar el Censo y una presentación de cuál es la intensión que tenemos en convocarlo a este censo Nacional. Recomendamos ampliamente que descargar este y lo recorra de manera completa.'
    }
  ];

  var vm = {
    pageLoading: ko.observable(true),
    isLoading: ko.observable(true),
    data: ko.observableArray([]),
    cue: ko.observable(),
    hasResult: ko.observable(false),
    result: ko.observable(null),
    wrongLink: ko.observable(false),
    notFinded: ko.observable(false),
    cueError: ko.observable(false),
    files: ko.observableArray(files)
  };

  vm.canSearch = ko.computed(function(){
    try {
      
      if (this.cue() == undefined) return false;

      var c = this.cue().toString();
      return cueRegex.test(c);

    } catch(er) {
      console.error(er);
    }
  }, vm);

  vm.search = function(item, event) {

    if (!cueRegex.test(vm.cue().toString())) {
      vm.cueError(true);
      return false;
    }

    var finded = findSchool(vm.cue().toString(), vm.data());

    if (finded == undefined) {
      vm.hasResult(false);
      vm.notFinded(true);
      vm.cueError(false);
      vm.result(null);
      return false;
    }

    vm.hasResult(true);
    vm.result(finded);

    return false;
  };

  vm.clickLink = function() {
    
    try {
      var url='counter.php?region=' + vm.result().region +'&cue=' + vm.result().cue;
      $.get(url);
    } catch(er) {}

    window.open(vm.result().link, "_blank");
    vm.wrongLink(true);

    return false;
  };

  vm.cue.subscribe(function(){
    vm.hasResult(false);
    vm.result(null);
    vm.wrongLink(false);
    vm.notFinded(false);
    vm.cueError(false);
  });

  // initialize
  $(function(){
    ko.applyBindings(vm);

    _.forEach(files, function(f) {

      $('#' + f.id).popover({ 
                  html: true,
                  trigger: 'hover',
                  content: f.popover,
                  placement: 'bottom',
                  delay: { show: 200, hide: 100 }
                });  
    });

  });

  loadData();

  // functions 
  function loadData() {
    $.get('data/data.json')
     .done(function(data){
       vm.data(data);
     })
     .then(function(){
      vm.pageLoading(false);
      vm.isLoading(false);
     });

     $('#txtCue').keydown(function(event) {
        if (event.keyCode == 13) {
          return vm.search();
        }
      });
  }

  function findSchool(target, schools) {
    
    return _.find(schools, function(s){
      return s.cue == target;
    });

  }

}(jQuery, ko, _,window)
