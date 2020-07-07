<?php

add_hook('AdminAreaFooterOutput', 1, function($vars) {
	
	return <<<HTML
	<script>
	$(document).ready(function(){
		var r = /\b\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\b/;
		var ip = $("table:eq(0) > tbody > tr:eq(4) > td:eq(1)").text().trim().match(r);

		fetch('https://blackbox.ipinfo.app/lookup/' + ip).then(response => response.text()).then((body) => {
			if (body == 'Y'){
				$("table:eq(0) > tbody > tr:eq(4) > td:eq(1)").prepend('<img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAQCAYAAAAf8/9hAAAACXBIWXMAAA7EAAAOxAGVKw4bAAAA80lEQVQ4jaXSP0qDQRAF8F8+viJVziBBLETEM0iuEjyJBLEOKTxEDiAG25QpRGwkVxAJQUIYi+wHyWaDfzIwsOyb997M7LZkEZygj57NGeaY4KHFe85piHUwCL6COJCr4C6oS+RxVrwMXlIuM2y8I5JUc7fZFj4r4PcNeJpa+6vAKjircCOf6XdRo1+lbf83ehW6Rwh0qyPIUFU2n6QIBp2gg0NG8xrPuCyAF/j4oYOJ4DxYF55pEVyn/Czg69iYEAwLBdPGJpgW8KGtgnbwWHAYBLeFDp+C9s4wSWR0YJxt0dEeORO6SiO9pj0sgrd0t7fsbzkc2bFtMIcBAAAAAElFTkSuQmCC" width="14px" title="Este IP foi identificado como um possível proxy ou VPN">     ');
			}
		});
	});
	</script>
	HTML;
});
