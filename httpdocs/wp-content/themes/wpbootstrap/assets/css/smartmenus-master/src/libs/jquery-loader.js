(function() {
  // Default to the local version.
  var path = '../wp-content/themes/wpbootstrap/assets/css/smartmenus-master/src/libs/jquery/jquery.js';
  // Get any jquery=___ param from the query string.
  var jqversion = location.search.match(/[?&]jquery=(.*?)(?=&|$)/);
  // If a version was specified, use that version from code.jquery.com.
  if (jqversion) {
    path = 'http://code.jquery.com/jquery-' + jqversion[1] + '.js';
  }
  // This is the only time I'll ever use document.write, I promise!
  document.write('<script src="' + path + '"></script>');
}());
