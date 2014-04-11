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
	$('#get-check,#check-refresh,#left-get-check').click(function() {
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
	$('#allmode,left-allmode').click(function() {
		$.getJSON(url, {type:'getall'}, function(data) {
			$.ui.hideMask();
			var i = 0;

			//pring json data -> html
			for(i;i<data.length;i++){
				//1.modelist
				var li = '<li><a href="#mode'+i+'">'+data[i].name+'</a></li>';
				$('#modelist').append(li);
				//2.body

				// <div id="mode1" class="panel" title="查看" data-nav="">
    //                 <ul class="list">
    //                     <li>当前模式 ：<span id="now-mode">--</span></li>
    //                     <li>当前温度 ：<span id="now-tmp">--</span>°c</li>
    //                     <li>当前亮度 ：<span id="now-light">--</span></li>
    //                     <li>当前开关 ：<span id="now-swi">--</span></li>
    //                 </ul>
    //                 <footer>
    //                     <a href="#" id='mode-choose-submit' class='icon check mini'>选择此模式</a>
    //                 </footer>
    //             </div>
    			if(data.open == 0){open = '关';}else{open = '开';}
				var div = '<div id="mode'+ i +'" class="panel" title="'+ data[i].name  +'" data-nav=""><ul class="list">';
					div += '<li>温度 ：<span>'+ data[i].tmp +'</span></li>';
					div += '<li>亮度 ：<span>'+ data[i].light +'</span></li>';
					div += '<li>开关 ：<span>'+ open +'</span></li></ul>';
					div += '<footer><a href="#" id="mode-choose-submit" class="icon check mini">选择此模式</a></footer>';

				console.log(data[i].name);
			}
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
