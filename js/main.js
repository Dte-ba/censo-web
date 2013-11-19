;

!function($, ko, _, window, undefined){

  var cueRegex = /^0[0-9]{8}$/;

  var vm = {
    pageLoading: ko.observable(true),
    isLoading: ko.observable(true),
    data: ko.observableArray([]),
    cue: ko.observable(),
    hasResult: ko.observable(false),
    result: ko.observable(null),
    wrongLink: ko.observable(false)
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
    var finded = findSchool(vm.cue().toString(), vm.data());

    if (finded == undefined) {
      vm.hasResult(false);
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
  });

  // initialize
  $(function(){
    ko.applyBindings(vm);
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
