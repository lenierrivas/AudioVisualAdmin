$(document).ready(function() {
	reproductor()
})

function reproductor () {

	var songs = document.querySelectorAll('ul>li.song')
	var audio = document.getElementsByTagName("audio")[0]	
	var video = document.getElementById("video")	

	Array.prototype.forEach.call(songs, function(el, i){	

		el.querySelectorAll(".iconPP")[0].addEventListener('click', function(e) {
			var button = e.target
			var list = el.parentNode
			
			$(list).find('.playing').removeClass('playing')
			$(button).addClass('playing')	
			$(list).find('.iconPP').text('>')
			if($(el.parentNode).find('.playing').hasClass('playing'))
				$(button).text('||')

			var type = el.getAttribute('data-type')

			if (type == 'song') {
				video.pause()
				video.style.display = "none"								
				audio.style.display = "block"

				var song = el.getAttribute('data-id')
				audio.src = 'songs/'+ song + '.mp3'
				audio.load()		
				audio.play()				
			}	
			else {				
				audio.pause()
				audio.style.display="none"										
				video.style.display="block"

				var id = el.getAttribute('data-id')							
				var source = document.getElementsByTagName('source')[0]	
				source.src = 'songs/'+id+'.mp4'	
				video.load()		
				video.play()		
			}		
		})

	});	
}