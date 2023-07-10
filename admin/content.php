<?php

if (!session_id()) {
	session_start();
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . "/language.php";
require_once __DIR__ . "/libs/redirect.class.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/common/functions.php";



use Redirect\Redirect as Redirect;

if (checkLogin("admin") !== true)
	new Redirect('login.php');

require_once __DIR__ . "/view/template/header/normal.php";
$title   = $lang["title"];

?>
<style>

</style>
<!-- Back to top button -->
<a id="scrolltop"></a>
<img id="scloading" style="position: absolute; right: 42%; top: 500px; z-index: 9999; background-color: rgb(51, 51, 51); padding: 2%;" src="assets/images/icon_loading.gif">

<!-- modal delete -->
<div class="modal fade" id="modalDel" data-backdrop="static" data-keyboard="false" data-toggle="modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

	<div class="modal-dialog modal-dialog-centered modal-sm" role="document">
		<!--Content-->
		<div class="modal-content">
			<!--Header-->
			<!-- <div class="modal-header">
                <p class="heading lead">Modal Danger</p>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="white-text">&times;</span>
                </button>
            </div> -->

			<!--Body-->
			<div class="modal-body">
				<div class="text-center">
					<p class="message">この項目を削除してよろしいでしょうか？</p>
					<p class="error_import"></p>
					<p class="btnCenter">
						<button id="submit_del_ok" class="btnDel btnDel_a" href="javascript:;" data-dismiss="modal" style="display:none">OK</button>
						<!-- get value from onclick onclick="testDel(this.id)" -->
						<button name="btnDel_a" id="submit_del" onclick="deletecontent(this.value)" value="" class="btnDel btnDel_a">はい</button>
						<a title="Close" id="btnCloseFc" class="btn btnClose" href="javascript:;" data-dismiss="modal">いいえ</a>
					</p>
				</div>
			</div>
			</section>

		</div>
	</div>

</div>
<!-- modal delete -->



<!-- modal include show table create and update -->
<!-- class input when opendialog then delete data  -->
<!-- Central Modal Medium Danger -->
<div class="modal fade" id="centralModalDanger" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-md" role="document">
		<!--Content-->
		<div class="modal-content">
			<!--Header-->
			<!-- <div class="modal-header"><p class="heading lead">Modal Danger</p><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="white-text">&times;</span></button></div> -->
			<!--Body-->
			<div class="modal-body">
				<div class="text-center">
					<div class="row">
						<div class="col">
							<h2 class="h2Title">
								<?= $lang['title'] ?>
							</h2>
						</div>
						<div class="col">
							<button type="button" style="border: 5px solid black;" class="close" data-dismiss="modal">&times;</button>
						</div>
					</div>
					<hr style="height:3px; background-color: #b4b4b4;">
					<img class="dialogLoading" src="assets/images/icon_loading.gif" />
					<div class="frmSection">
						<div class="error error_inline0 pb0">
							<p>&nbsp;</p>
						</div>
						<div class="show_parent">
							<!-- 公開フラグ, カテゴリーNo., 短縮タイトル, 正式タイトル, 解説, アラートメッセージ, コメント, リンク先URL, 別ウィンドウ区分, 画像1, 画像2, 
                        TOP非表示, FREE, 簿記9, 簿記10, 簿記11, JA9, JA10, JA11, JA接続キット, 日誌6, 日誌6P -->
							<form action="" accept-charset="utf-8">
								<table cellpadding="0" cellspacing="0" class="dialogCreate">
									<tr id="keyMember">
										<td colspan="10">
											<div class="row">
												<div class="col-4">
													<p>ID</p>
													<img class="show_pc" src="./assets/images/content/hissu_12px.gif" alt="必須項目" style="display: inline-block;">
												</div>
												<div class="col-8">
													<!-- <textarea type="text" rows="2" cols="50" class="input w-100" name="shortTittleContent" id="shortTittleContent" value="11"></textarea> -->
													<input type="text" style="width: 100%;" class="input" name="id" id="id" value="11" disabled>
												</div>
										</td>
									</tr>
									<tr>
										<td colspan="10">
											<div class="row">
												<div class="col-4">
													<p>ログインID</p>
													<img class="show_pc" src="./assets/images/content/hissu_12px.gif" alt="必須項目" style="display: inline-block;">
												</div>
												<div class="col-8">
													<!-- <textarea type="text" rows="2" cols="50" class="input w-100" name="shortTittleContent" id="shortTittleContent" value="11"></textarea> -->
													<input type="text" style="width: 100%;" class="input" name="memberId" id="memberId" value="11">
												</div>
										</td>
									</tr>

									<tr class="showPw">
										<td colspan="10">
											<div class="row">
												<div class="col-4">
													<p>現在の暗号化されたパスワード</p>
												</div>
												<div class="col-8">
													<!-- <textarea type="text" rows="2" cols="50" class="input w-100" name="shortTittleContent" id="shortTittleContent" value="11"></textarea> -->
													<input type="text" style="width: 100%;" class="input" name="membershowPw" id="membershowPw" value="11" disabled>
												</div>
										</td>
									</tr>

									<tr>
										<td colspan="10">
											<div class="row">
												<div class="col-4">
													<p><span class="new_pass"></span>パスワード</p>
													<img class="show_pc pw" src="./assets/images/content/hissu_12px.gif" alt="必須項目" style="display: inline-block;">
												</div>
												<div class="col-8">
													<!-- <textarea type="text" rows="2" cols="50" class="input w-100" name="longTittleContent" id="longTittleContent" value="11"></textarea> -->
													<input type="password" style="width: 100%;" class="input" name="memberPw" id="memberPw" value="11">
													<!-- <a href="javascript:;" class="" onclick="ShowHide($(this))">Show</a> -->
												</div>
										</td>
									</tr>
									<tr id="rePassword">
										<td colspan="10">
											<div class="row">
												<div class="col-4">
													<p><span class="new_pass"></span>パスワード(再)</p>
													<img class="show_pc pw" src="./assets/images/content/hissu_12px.gif" alt="必須項目" style="display: inline-block;">
												</div>
												<div class="col-8">
													<!-- <textarea type="text" rows="2" cols="50" class="input w-100" name="longTittleContent" id="longTittleContent" value="11"></textarea> -->
													<input type="password" style="width: 100%;" class="input" name="rememberPw" id="rememberPw" value="11">
													<!-- <a href="javascript:;" class="" onclick="ShowHide(this)">Show</a> -->
													<div class="show_pass" style="margin-top: 20px;">
														<input type="checkbox" id="showhide" name="showhide" value="" onclick="ShowHide()">
														<label for="showhide">パスワードを表示する</label>
													</div>

												</div>
										</td>
									</tr>

									<tr>
										<td colspan="10">
											<div class="row">
												<div class="col-4">
													<p>メンバー種別</p>
													<img class="show_pc" src="./assets/images/content/hissu_12px.gif" alt="必須項目" style="display: inline-block;">
												</div>
												<div class="col-8">
													<!-- <textarea type="text" rows="2" cols="50" class="input w-100" name="notifyContent" id="notifyContent" value="11"></textarea> -->
													<select class="browser-default" name="memberStatus" id="memberStatus" style="width: 50%;">
														<!-- ↓↓　<2022/27/04> <KhanhDinh> <update document 【HP合同PRJ】SKK-Members-site_レビュー報告書.xlsx> -->
														<!-- <option selected="" value="0">0:ソリマチ社員</option>
                                                        <option value="1">1:都道府県連 職員</option>
                                                        <option value="2">2:商工会 職員</option>
                                                        <option value="3">3:(未定)</option> -->
														<option value="0">0:都道府県連 職員</option>
														<option value="1">1:商工会 職員</option>
														<!-- ↑↑　<2022/27/04> <KhanhDinh> <update document 【HP合同PRJ】SKK-Members-site_レビュー報告書.xlsx> -->
													</select>
												</div>
											</div>
										</td>
									</tr>
									<tr>
										<td colspan="10">
											<div class="row">
												<div class="col-4">
													<p>コメント</p>
												</div>
												<div class="col-8">
													<!-- <input type="text" class="input" id="alertContent"> -->
													<textarea type="text" rows="2" cols="50" class="input w-100" name="memberComment" id="memberComment" value="11"></textarea>
												</div>
											</div>
										</td>
									</tr>

									<!-- <tr><td colspan="2"><div class="row"><div class="col-4"><span>JA9</span></div><div class="col-8"><input type="text" class="input" id="JA9Content"><span></div></div></td><td colspan="2"><div class="row"><div class="col-4"><span>JA10</span></div><div class="col-8"><input type="text" class="input" id="JA10Content"><span></div></div></td><td colspan="2"><div class="row"><div class="col-4"><span>JA11</span></div><div class="col-8"><input type="text" class="input" id="JA11Content"><span></div></div></td></tr> -->
						</div>
					</div>
					</table>
					</form>
				</div>
				<p class="center">
					<input type="hidden" id="possiton" />
					<input type="submit" name="submit_ud" id="submit_ud" value="登録" onclick="savecontent()" style="width: 150px; font-size: 15px;" />
					<!-- <a title="Close" class="btn btnClose" href="javascript:;" onclick="" style="width: 150px; font-size: 15px;">キャンセル</a> -->
					<a title="Close" id="btnCloseFc" class="btn btnClose" href="javascript:;" style="width: 150px; font-size: 15px; padding: 11px;" data-dismiss="modal">キャンセル</a>
					<!-- <a title="Close" class="btn btnClose" href="javascript:;" onclick="$.fancybox.close();" style="width: 150px; font-size: 15px;">キャンセル</a> -->
				</p>
			</div>
			</section>
		</div>
	</div>
</div>
<!--/.Content-->
</div>
</div>
<!-- Central Modal Medium Danger-->


<!-- show listData -->
<article id="main" class="clearfix">
	<img id="scLoading" style="position:absolute; right:42%; top:500px; z-index:9999; display:none; background-color:#333; padding:2%;" src="assets/images/icon_loading.gif" />
	<section id="main_content">
		<div class="clearfix" style="text-align: justify;vertical-align: middle; display: flex;">
			<!-- <p class="contentTitle pb0"> <span><?= $lang["title"] ?></span> </p> -->
			<div class="contentCon">
				<button type="button" class="btn btn-primary nav" onclick="openDialog(this.id,false);" data-toggle="modal" data-target="#centralModalDanger"><?= $lang["add"] ?></button>
				<button type="button" class="btn btn-primary nav" onclick="$('#ipExcel').click();"><?= $lang["file"] ?></button>
				<button type="button" class="btn btn-primary nav" onclick="importMember()"><?= $lang["import"] ?></button>
				<input type="file" style="display: none;" id="ipExcel" class="btn btn-primary" onchange="$('#inputExcel').html($(this).val());" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"></input>
			</div>
			<div style="font-size: 10px;display: flex;flex-direction: column;justify-content: center; margin-left:10px"><label for="ipExcel" id="inputExcel"></label></div>
			<div class="searchParent" style="display: flex;width:100%;position: absolute;">
				<div class="searchCon">
					<div class="search_task" style="display: flex;">
						<select class="browser-default" name="memberStatustest" id="memberStatustest" onchange="">
							<option selected="" value="member-id">member-id (完全一致のみ)</option>
							<option value="member-status">member-status</option>
							<option value="member-comment">member-comment</option>
						</select>
						<input type="text" id="searchtest">
						<button type="button" style="margin-left: 10px; padding:10px 10 10 10" id="searchbtn" class="btn btn-primary nav"><?= @$lang["find"] ?></button>
						<button type="button" style="margin-left: 10px; padding:10px 10 10 10" id="resetbtn" class="btn btn-primary nav"><?= @$lang["reset"] ?></button>
					</div>
					<div class="search_label" style="display: flex;overflow-y: hidden;word-break: break-all;max-height: 25px;">
						<label id="showRecommend" style="font-size: 10px; margin:0"></label>
						<!-- <textarea name="" id="showRecommend" cols="70" rows="1" style="font-size: 10px;" disabled></textarea> -->
					</div>
				</div>
			</div>

			<!-- <p class="contentSe1" style="float:left; width:100%; text-align:center;">
                    <label id="inputExcel"></label>
                </p> -->
		</div>
		<!-- Content -->
		<table id="table_idTest" class="display" style="width:100%">
			<thead>
				<tr>
					<!-- 公開フラグ, カテゴリーNo., 短縮タイトル, 正式タイトル, 
                        解説, アラートメッセージ, コメント, リンク先URL, 別ウィンドウ区分, 画像1, 画像2,
                         TOP非表示, FREE, 簿記9, 簿記10, 簿記11, JA9, JA10, JA11, JA接続キット, 日誌6, 日誌6P -->

					<th style="width:50px"><span>ID</span></th>
					<th style="width:auto"><span>member-id</span></th>
					<th style="width:auto"><span>member-status</span></th>
					<th style="width:auto"><span>member-comment</span></th>

					<th style="width:100px"><span>操作</span></th> <!-- 79% -->
					<!-- 79% -->
				</tr>
			</thead>

		</table>


		<input type="hidden" id="scId">
		<input type="hidden" id="isEdit">
		<input type="hidden" id="oldPdf">
	</section>
</article>
<!-- show listData -->

<?php require_once __DIR__ . "/view/template/footer/normal.php"; ?>

<!-- proccess add,edit,delete -->
<script type="text/javascript" src="assets/js/proccess/P_shokokai.js"></script>

<!-- properties language datatable -->
<script>
	$(document).ready(function() {
		var table = $('#table_idTest').DataTable({
			// scrollY: 600,
			// scrollX: true,
			// scrollCollapse: true,
			"paging": true,
			// "searching": true,
			"processing": true,
			"serverSide": true,
			"info": true,
			// "order": [
			//     [0, "desc"]
			// ],
			"lengthMenu": [
				[1000, 5000, -1],
				[1000, 5000, "全て"]
			],
			// fixedColumns: {
			//     leftColumns: 1
			// },

			"ajax": {
				"url": "src/view/V_shokokai.class.php",
				"type": "POST",
				// "contentType": "application/json",
				// "dataType": "json",
				// "dataSrc": "data",
				// "data": {

				// }
			},
			"language": {
				"decimal": "",
				"emptyTable": "<?= $lang["emptyTable"] ?>",
				"info": "<?= $lang["info"] ?>",
				"infoEmpty": "<?= $lang["infoEmpty"] ?>",
				"infoFiltered": "",
				"infoPostFix": "",
				"thousands": ",",
				"lengthMenu": "<?= $lang["lengthMenu"] ?>",
				"loadingRecords": "<?= $lang["loadingRecords"] ?>",
				"processing": "<?= $lang["processing"] ?>",
				"search": "<?= $lang["search"] ?>",
				"zeroRecords": "<?= $lang["zeroRecords"] ?>",
				"paginate": {
					"first": "<?= $lang['paginate']["first"] ?>",
					"last": "<?= $lang['paginate']["last"] ?>",
					"next": "<?= $lang['paginate']["next"] ?>",
					"previous": "<?= $lang['paginate']["previous"] ?>"
				},
				"aria": {
					"sortAscending": "",
					"sortDescending": ""
				}
			}
		});
		$("div.dataTables_filter input").unbind(); // disable keyup input search
		value_search = $("div.dataTables_filter input");
		$("#searchbtn").click(function() {
			table.search($("#memberStatustest").val() + ":" + $('#searchtest').val()).draw();
			showCommend();
		});

		//button reset search
		$("#resetbtn").click(function() {
			table.search('').draw()
			$('#searchtest').val('')
			$('#showRecommend').html('')

		});

		let showCommend = function() {
			var test = '【検索条件】';
			test += $("#memberStatustest").val();
			test += ':';
			test += ($("#memberStatustest").val() == 'member-comment') ? "「" : "";
			test += $('#searchtest').val();
			test += ($("#memberStatustest").val() == 'member-comment') ? '」を含む' : 'と一致する';
			($('#searchtest').val() != '') ? $('#showRecommend').text(test): $('#showRecommend').text('');
		}

		$.fn.dataTableExt.sErrMode = 'none';
	});
</script>

<!-- scroll top -->
<script>
	$(document).ready(function() {
		$('#scloading').hide();
	});

	// back top scroll top
	var btn = $('#scrolltop');
	$(window).scroll(function() {
		if ($(window).scrollTop() > 300) {
			btn.addClass('show');
		} else {
			btn.removeClass('show');
		}
	});
	btn.on('click', function(e) {
		e.preventDefault();
		$('html, body').animate({
			scrollTop: 0
		}, '300');
	});
</script>