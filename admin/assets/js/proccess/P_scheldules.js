const _url_init = 'src/index.php';
const _controller = 'content';
const _prefix = 'DEMO_';


// Add content
function addcontent(formData) {
	jQuery.ajax({
		type: 'POST',
		dataType: 'json',
		url: _url_init,
		data: formData,
		beforeSend: function () {
			$('.dialogLoading').show();
		},
		success: function (data) {
			console.log(data);
			if (typeof data.errMsg != "undefined") {
				$('.error_inline0').html(data.errMsg);
				return;
			}
			location.reload();
		},
		error: function (xhr, textStatus, errorThrown) {
			$('.error_inline0').html('サーバーへの接続のエラーであります');
		},
		complete: function () {
			$('.dialogLoading').hide();
		}
	});
}

// Edit content
function editcontent(formData) {
	jQuery.ajax({
		type: 'POST',
		dataType: 'json',
		url: _url_init,
		data: formData,
		beforeSend: function () {
			$('.dialogLoading').show();
		},
		success: function (data) {
			console.log("function:editcontent",data);
			if (typeof data.errMsg != "undefined") {
				$('.error_inline0').html(data.errMsg);
				return;
			}
			location.reload();
			// filtercontentByArea();
		},
		error: function (xhr, textStatus, errorThrown) {
			$('.error_inline0').html('サーバーへの接続のエラーであります');
		},
		complete: function () {
			$('.dialogLoading').hide();
		}
	});
}


// Save content
function savecontent() {
	$('.error_inline0').html('');
	let message = '';
	let error = (obj) =>{
		$.each(obj, function (key, value) {
			message += value + "<br>";
			// console.log(message);
			$('#' + key).focus();
			$('.error_inline0').html(message);
		});
		return obj;
	}

	let partern = /^\s*$/;
	var err = {};

	if ($.inArray($('#flagContent').val(), ['0','1']) == -1) {
		err.flagContent = '「公開フラグ」: 入力して下さい'
	}

	if ($.inArray($('#cateContent').val(), ['1', '2', '3', '4']) == -1) {
		err.cateContent = '「短縮タイトル」: 入力して下さい'
	}

	if (partern.test($('#shortTittleContent').val())) {
		err.shortTittleContent = '「短縮タイトル」: 入力して下さい';
	}

	if (partern.test($('#longTittleContent').val())) {
		err.longTittleContent = '「正式タイトル」: 入力して下さい';
	}

	if (partern.test($('#notifyContent').val())) {
		err.notifyContent = '「解説」: 入力して下さい';
	}
	
	if (partern.test($('#linkContent').val())) {
		err.linkContent = '「リンク先URL」: 入力して下さい';
	}
	
	// check error
	if ($.isEmptyObject(error(err)) !== true){
		return;
	}


	let formData = {};
	formData.controller = _controller;
	formData.flagContent 			= $('#flagContent').val() ?? "error";
	formData.cateContent 			= $('#cateContent').val() ?? "error";
	formData.shortTittleContent 	= $('#shortTittleContent').val() ?? "error";
	formData.longTittleContent 		= $('#longTittleContent').val() ?? "error";
	formData.notifyContent 			= $('#notifyContent').val();
	formData.alertContent 			= $('#alertContent').val();
	formData.commentContent 		= $('#commentContent').val();
	formData.linkContent 			= $('#linkContent').val() ?? "error";
	formData.seperateContent 		= $('#seperateContent').val();

	formData.image2Content 			= $('#image2Content').val();
	formData.topContent 			= $('#topContent').val();
	formData.freeContent 			= $('#freeContent').val();
	formData.account9Content 		= $('#account9Content').val();
	formData.account10Content 		= $('#account10Content').val();
	formData.account11Content 		= $('#account11Content').val();
	formData.JA9Content 			= $('#JA9Content').val();
	formData.JA10Content 			= $('#JA10Content').val();
	formData.JA11Content 			= $('#JA11Content').val();
	formData.JAContent 				= $('#JAContent').val();
	formData.diary6Content 			= $('#diary6Content').val();
	formData.diary6PContent 		= $('#diary6PContent').val();

	if (Number($('#isEdit').val()) == 1) {
		console.log('edit');
		formData.action = 'edit';
		formData.image1Content = Number($('#image1Content').val());  //primary key
		editcontent(formData);
	}
	else {
		console.log(formData);
		formData.action = 'add';
		addcontent(formData);
	}
}

// Open content dialog
function openDialog(schId, isEdit) {
	resetError();
	resetDataDialog();
	$('.dialogLoading').hide();
	if (Number(isEdit) == 1) {
		jQuery.ajax({
			type: 'POST',
			dataType: 'json',
			url: _url_init,
			data: {
				controller: _controller,
				action: 'loadById',
				schId: schId
			},
			// < !--公開フラグ, カテゴリーNo., 短縮タイトル, 正式タイトル, 解説, アラートメッセージ, コメント, リンク先URL, 別ウィンドウ区分, 画像1, 画像2,
			// TOP非表示, FREE, 簿記9, 簿記10, 簿記11, JA9, JA10, JA11, JA接続キット, 日誌6, 日誌6P-- >
			success: function (data) {
				let content = data.content;
				console.log("openDialog: edit", content);
				$('#flagContent').val(content.公開フラグ);
				$('#cateContent').val(content['カテゴリーNo.']);
				$('#shortTittleContent').val(content.短縮タイトル);
				$('#longTittleContent').val(content.正式タイトル);
				$('#notifyContent').val(content.解説);
				$('#alertContent').val(content.アラートメッセージ);
				$('#commentContent').val(content.コメント);
				$('#linkContent').val(content.リンク先URL);

				$('#separateContent').val(content.別ウィンドウ区分);
				$('#image1Content').val(content.画像1);
				$('#image2Content').val(content.画像2);
				$('#seperateContent').val(content.別ウィンドウ区分);
				$('#topContent').val(content.TOP非表示);
				$('#freeContent').val(content.FREE);
				$('#account9Content').val(content.簿記9);
				$('#account10Content').val(content.簿記10);
				$('#account11Content').val(content.簿記11);

				$('#JA9Content').val(content.JA9);
				$('#JA10Content').val(content.JA10);
				$('#JA11Content').val(content.JA11);
				$('#JAContent').val(content.JA接続キット);
				$('#diary6Content').val(content.日誌6);
				$('#diary6PContent').val(content.日誌6P);

			},
			error: function (xhr, textStatus, errorThrown) {
				$('.error_inline0').html('サーバーへの接続のエラーであります。');
			}
		});

		$('#isEdit').val(1);
		// $('#scId').val(schId);
	}
	else {
		console.log('openDialog: add');
		resetDataDialog();
		$('#isEdit').val(0);
	}
}

// Delete content
function deletecontent(obj) {
	jQuery.ajax({
		type: 'POST',
		dataType: 'text',
		url: _url_init,
		data: {
			controller: _controller,
			action: 'delete',
			id: obj
		},
		success: function (data) {
			console.log('func deletecontent',data);
			$('#submit_del_ok').show();
			$('#submit_del').hide();
			$('.btnClose').hide();
			$('.message').html(data);
			// location.reload();
		},
		error: function (xhr, textStatus, errorThrown) {
			$('.error_inline0').html('サーバーへの接続のエラーであります。');
		}
	});
}

function resetDataDialog() {
	$(".input").val("");
	
	$(".custom-select").prop('selectedIndex', 0);
}

function resetError() {
	$('.error_inline0').html('');
}

//khanh
function testDel(obj) {
	$('#submit_del').val(obj);
}