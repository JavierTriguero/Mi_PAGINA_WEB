var $manecillas = $('#liveclock div.manecilla');
 
window.requestAnimationFrame = window.requestAnimationFrame
                               || window.mozRequestAnimationFrame
                               || window.webkitRequestAnimationFrame
                               || window.msRequestAnimationFrame
                               || function(f){setTimeout(f, 60)}
 
 
function updateclock(){
	var curdate = new Date()
	var hour_as_degree = ( curdate.getHours() + curdate.getMinutes()/60 ) / 12 * 360
	var minute_as_degree = curdate.getMinutes() / 60 * 360
	var second_as_degree = ( curdate.getSeconds() + curdate.getMilliseconds()/1000 ) /60 * 360
	$manecillas.filter('.hora').css({transform: 'rotate(' + hour_as_degree + 'deg)' })
	$manecillas.filter('.minuto').css({transform: 'rotate(' + minute_as_degree + 'deg)' })
	$manecillas.filter('.segundo').css({transform: 'rotate(' + second_as_degree + 'deg)' })
	requestAnimationFrame(updateclock)
}
 
requestAnimationFrame(updateclock)