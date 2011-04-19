jQuery(document).ready(function() {

	jQuery("ul.tabs").tabs("div#tabs > div").history();

});

function setAnchor() { document.getElementById('update-options').action = "options.php" + location.hash; }
