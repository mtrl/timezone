/* Author:

*/
$(document).ready(function(){
	setDateTime();
	
});

function setDateTime(){
	var d = new Date();
	var minutes = d.getMinutes();
	if(minutes.toString().length == 1) {
		minutes = minutes.toString() + '0';
	} else {
		minutes = minutes.toString();
	}
	var time = d.getHours() + ':' + minutes;
	if($('input[name=time]').val() == '') {
		$('input[name=time]').val(time);
	}
	// date
	var month = d.getMonth() + 1;
	var date = d.getFullYear() + '\/' + month + '\/' + d.getDate();
	if($('input[name=date]').val() == '') {
		$('input[name=date]').val(date);
	}
}