//2014年04月10日00:03:53
//ver 0.1.0
//MRC i#cornelia.in

$(document).ready(function(){
	//--- global ---///
	//var s_tmp = $('#tmp').value();
	//--- submit setting ---//
	$('#setting-submit').click(function(){
		var tmp = $('#tmp').val(),
			light = $('#light').val(),
			open = $('input[name="swi"]:checked').val();
			$.getJSON('http://cornelia.com.cn/i/post2.php?callback=?',{tmp:tmp,light:light,open:open},function(data){
           	 		console.log(data);
    				}
    			);
	});
	//--- add mode ---//
	$('#addmode-submit').click(function(){
		var tmp = $('#addmode-tmp').val(),
			light = $('#addmode-light').val(),
			open = $('input[name="addmode-swi"]:checked').val(),
			name = $('#addmode-name').val();
			$.getJSON('http://cornelia.com.cn/i/post2.php?callback=?',{name:name,tmp:tmp,light:light,open:open},function(data){
           	 		console.log(data);
    				}
    			);
	});
	//--- do the check ---//
	$('.check-link').click(function(){
		//$.ajax(){
			$('#now-mode').html('abc');
			$('#now-tmp').html('abc');
			$('#now-light').html();
			$('#now-swi').html();
		//}
	});
});

