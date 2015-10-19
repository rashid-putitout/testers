<html>
<head>
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
</head>
<body>
<div id="links">
<?php for($i=0; $i<15; $i++): ?>
	<a class="show-tooltip" data-webtitle="my custom title_<?php echo $i;  ?>" data-link="my custom link_<?php echo $i;  ?>"  href="http://google.com" title="title_<?php echo $i;  ?>" data-dialog>
		<img name="gallery_items[]" id ="id_<?php echo $i; ?>" data-webtitle="my custom title_<?php echo $i;  ?>" data-link="my custom link_<?php echo $i;  ?>"  src="" alt="company_<?php echo $i;  ?>" title="title_<?php echo $i;  ?>">
	</a>
<?php endfor; ?>
</div>
<script>
	var anchors = document.getElementsByName("gallery_items[]");
	alert(anchors[0].id);
</script>	
</body>
</html>