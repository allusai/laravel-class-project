$( "#switch" ).toggle(function() {
  alert( "First handler for .toggle() called." );
}, function() {
  alert( "Second handler for .toggle() called." );
});