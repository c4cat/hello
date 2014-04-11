//2014年04月10日00:03:53
//ver 0.1.0
//MRC i#cornelia.in

$(document).ready(function(){
	//--- global ---///
	//var s_tmp = $('#tmp').value();
	function hide(){
        $.ui.hideMask();
    }
  	var url = 'http://cornelia.com.cn/i/action.php?callback=?';

	//--- submit setting ---//
	$('#setting-submit').click(function(){
		var tmp = $('#tmp').val(),
			light = $('#light').val(),
			open = $('input[name="swi"]:checked').val(),
			type='update',
			//red is the count of the error ,not more than one
			red = $('#setting-form').find('.red').length,
			blue = $('#setting-form').find('.blue').length;

			//form check
			if(tmp=='' || light=='' || open==''){
				$.ui.hideMask();
				if(red==0){
					// $('.blue').remove();
					$('#setting-form').append('<div class="input-group notice red">每一项都必须填写!</div>');
				}else{
					if(blue==1){
						$('#setting-form').find('.blue').removeClass('blue').html('每一项都必须填写!!');
					}
				}
				return false;
			}

			$.getJSON(url,{tmp:tmp,light:light,open:open,type:type},function(data){
           	 		console.log('fxxk!');
           	 		if(red==0){
           	 			$('#setting-form').append('<div class="input-group notice blue">成功!</div>');
           	 		}else{
           	 			$('#setting-form').find('.red').addClass('blue').html('成功!!');
           	 		}
           	 			$.ui.hideMask();
    				}
    			);
	});

	//--- submit addmode ---//
	$('#addmode-submit').click(function(){
		//form check
		var tmp = $('#addmode-tmp').val(),
			light = $('#addmode-light').val(),
			open = $('input[name="addmode-swi"]:checked').val(),
			name = $('#addmode-name').val(),
			type='addmode',
			//red is the count of the error ,not more than one
			red = $('#addmode-form').find('.red').length,
			blue = $('#addmode-form').find('.blue').length;

			//form check
			if(tmp=='' || light=='' || open=='' || name==''){
				$.ui.hideMask();
				if(red==0){
					// $('.blue').remove();
					$('#addmode-form').append('<div class="input-group notice red">每一项都必须填写!</div>');
				}else{
					if(blue==1){
						$('#addmode-form').find('.blue').removeClass('blue').html('每一项都必须填写!!');
					}
				}
				return false;
			}
			$.getJSON(url,{tmp:tmp,light:light,open:open,type:type,name:name},function(data){
           	 		// $('#afui_mask').find('h1').html('成功!');
           	 		if(red==0){
           	 			$('#addmode-form').append('<div class="input-group notice blue">成功!</div>');
           	 		}else{
           	 			$('#addmode-form').find('.red').addClass('blue').html('成功!!');
           	 		}
           	 		$.ui.hideMask();
    				}
    			);
	});

	//--- get data:check ---//
	$('#get-check,#check-refresh').click(function() {
		$.getJSON(url, {type:'getcheck'}, function(data) {
			$.ui.hideMask();
			console.log(data);
			$('#now-mode').html(data.name);
			$('#now-tmp').html(data.tmp);
			$('#now-light').html(data.light);
			if(data.open == 0){
				open = '关';
			}else{
				open = '开';
			}
			$('#now-swi').html(open);
		});
	});
	//--- get all of the mode ---//
	$('#allmode').click(function() {
		$.getJSON(url, {type:'getall'}, function(data) {
			$.ui.hideMask();
			console.log(data);
			$('#now-mode').html(data.name);
			$('#now-tmp').html(data.tmp);
			$('#now-light').html(data.light);
			if(data.open == 0){
				open = '关';
			}else{
				open = '开';
			}
			$('#now-swi').html(open);
		});
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

	//---remove---
	$('.settings').click(function() {
		$('.notice').remove();
	});



});

