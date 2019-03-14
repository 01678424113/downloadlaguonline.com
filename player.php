<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.2.9/mediaelementplayer.min.css">
<script defer="defer" src="https://cdnjs.cloudflare.com/ajax/libs/mediaelement/4.2.9/mediaelement-and-player.min.js" type="text/javascript"></script>
<script type="text/javascript">
	$(document).ready(function(e){
		e('audio,video').mediaelementplayer({
			success: function(mediaElement, originalNode, instance){
				instance.width = "100%";
			}
		});
	});
</script>

<audio src="https://www.youtube.com/watch?v=<?php echo $api_youtube; ?>" type="video/youtube" autoplay loop preload="none"></audio>