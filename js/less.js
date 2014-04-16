//2014年04月10日00:03:53
//ver 0.1.0
//MRC i#cornelia.in

$(document).ready(function(){
	//--- global ---///
	//var s_tmp = $('#tmp').value();
	function hide(){
        $.ui.hideMask();
    }
  	// var url = 'http://cornelia.com.cn/i/action.php?callback=?';
  	// localhost
  	// var url = 'http://localhost/~mrc/cornelia/i/action.php?callback=?';
  	// var url = 'http://localhost/~mrc/hello/hello/www/admin/action.php?callback=?';
  	var url = 'http://cornelia.com.cn/admin/action.php?callback=?';
  	
	//--- submit setting ---//
	$('#setting-submit').click(function(){
		var tmp = $('#tmp').val(),
			light = $('#light').val(),
			open = $('input[name="swi"]:checked').val(),
			type = 'update',
			name = 'xx',
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

			$.getJSON(url,{tmp:tmp,light:light,open:open,type:type,name:name},function(data){
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
           	 		if(blue==0){
           	 			$('#addmode-form').append('<div class="input-group notice blue">成功!</div>');
           	 		}else{
           	 			$('#addmode-form').find('.blue').remove();
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
			if(data.name == 'xx'){
				$('#now-mode').html('默认');
			}else{
				$('#now-mode').html(data.name);
			}
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
			remove_li_div();
			$.ui.hideMask();
			var i = 0;

			//pring json data -> html
			for(i;i<data.length;i++){
				//1.modelist
				var li = '<li><a href="#mode'+i+'">'+data[i].name+'</a></li>';
				$('#modelist').append(li);
				//2.body
    			if(data.open == 0){open = '关';}else{open = '开';}
				var div = '<div id="mode'+ i +'" data-id="'+ data[i].id +'" class="panel y-scroll mode-style" title="'+ data[i].name  +'" data-nav=""><ul class="list">';
					div += '<li>模式 ：<span class="list-name">'+ data[i].name +'</span></li>';
					div += '<li>温度 ：<span>'+ data[i].tmp +'</span></li>';
					div += '<li>亮度 ：<span>'+ data[i].light +'</span></li>';
					div += '<li>窗帘开关 ：<span>'+ open +'</span></li>';
					div += '<li class="hidden-data">'+ data[i].tmp + ',' + data[i].light + ',' + data[i].open +'</li></ul>';

					div += '<footer><a href="#"  class="icon check mini mode-choose" onclick="$.ui.showMask(\'处理中...\')">选择此模式</a><a href="#" class="icon close mini mode-delete" onclick="$.ui.showMask(\'处理中...\')">删除此模式</a></footer>';
				$('#modec').append(div);


				console.log(data[i]);
			}
		});
	});	
	//chose mode
		//delegate is the function like .live or .bind		
	$(document).delegate('.mode-choose','click',function() {
		var type ='choose',
			real = $(this).parents().attr('data-parent'),
			data = $('#'+real).find('.hidden-data').html(),
			this_ul =  $(this).parents().parents().find('.list'),
			arr = data.split(','),
			// idd = $('#'+real).attr('data-id'),
			this_ul =  $('#'+real).find('.list'),
			this_name =  $('#'+real).find('.list-name').html(),
			blue = this_ul.find('.notice.blue').length;
			console.log(arr);

			$.getJSON(url,{tmp:arr[0],light:arr[1],open:arr[2],type:type,type:type,name:this_name},function(data){
					console.log('done');
           	 		if(blue==0){
           	 			this_ul.append('<li class="notice blue">选择成功!</li>');
           	 			}
           	 		$.ui.hideMask();
    				}
    			);
		});
	//delete mode
	$(document).delegate('.mode-delete','click',function() {//由于mode-delete是动态创建的,所以要使用delegate绑定时间
		var type ='delete', //定义类型
			real = $(this).parents().attr('data-parent'), //获取父类的data-parent属性
			idd = $('#'+real).attr('data-id'),//根据data-parent属性获取当前模式的id
			// arr[1] is the id of the mode

			this_ul =  $(this).parents().parents().find('.list'), //获取指针内的ul.list
			blue = this_ul.find('.notice.blue').length; //获取成功提示的个数
			//	remove footer
			// 2014年04月13日02:54:57
			$(this).parent().remove(); //移除内容

			$.getJSON(url,{idd:idd,type:type},function(data){
           	 		$.ui.hideMask();
           	 		//remove
           	 		remove_li_div();
           	 		//output li & div
					output_modelist(data);
					// $.ui.goBack();
					window.location.href = 'index.html#af';
					console.log('delete');
    				}
    			);
		});


	//---remove---
	$('.settings,#af').click(function() {
		$('.notice').remove();
	});

	function output_modelist(data){
           	 var i = 0;
			//pring json data -> html
			for(i;i<data.length;i++){
				//1.modelist
				var li = '<li><a href="#mode'+i+'">'+data[i].name+'</a></li>';
				$('#modelist').append(li);
				//2.body
    			if(data.open == 0){open = '关';}else{open = '开';}
				var div = '<div id="mode'+ i +'" data-id="'+ data[i].id +'" class="panel y-scroll mode-style" title="'+ data[i].name  +'" data-nav=""><ul class="list">';
					div += '<li>模式 ：<span>'+ data[i].name +'</span></li>';
					div += '<li>温度 ：<span>'+ data[i].tmp +'</span></li>';
					div += '<li>亮度 ：<span>'+ data[i].light +'</span></li>';
					div += '<li>窗帘开关 ：<span>'+ open +'</span></li>';
					div += '<li class="hidden-data">'+ data[i].tmp + ',' + data[i].light + ',' + data[i].open +'</li></ul>';

					div += '<footer><a href="#"  class="icon check mini mode-choose" onclick="$.ui.showMask(\'处理中...\')">选择此模式</a><a href="#" class="icon close mini mode-delete" onclick="$.ui.showMask(\'处理中...\')">删除此模式</a></footer>';
				$('#modec').append(div);
				
				// console.log('doooooo');
			}
	}

	function remove_li_div(){
		$('#modelist').children().filter('li').remove();
        $('#modec').children().filter('div').remove();
	}


});
