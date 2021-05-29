<?php

$value = Config::get('app.name');
?>
<footer class="footer">
	<p class="text-right"><strong>Copyright © {{date('Y')}} <span>{{$value}}</span></strong></p>
</footer>