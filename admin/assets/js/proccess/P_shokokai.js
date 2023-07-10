const _url_init = "src/index.php";
const _controller = "shokokai";
const _prefix = "CONTENT_";
const _nofomat = "の形式が正しくありません";
const _nosame = "が一致しません";
const _fail = "失敗追加: ";
const _success = "成功追加: ";
const _empty = "入力して下さい";

// Add content
let addcontent = (formData) => {
    jQuery.ajax({
        type: "POST",
        dataType: "json",
        url: _url_init,
        data: formData,
        beforeSend: function () {
            $(".dialogLoading").show();
        },
        success: function (data) {
            // console.log(data);
            if (typeof data.errMsg != "undefined") {
                $(".error_inline0").html(data.errMsg);
                return;
            }
            $("#centralModalDanger").modal("hide");
            var table = $("#table_idTest").DataTable();
            // console.log('func', table);
            // setInterval(function () {
            table.ajax.reload(null, false); // user paging is not reset on reload
            // }, 30000);
            // location.reload();
        },
        error: function (xhr, textStatus, errorThrown) {
            $(".error_inline0").html("サーバーへの接続のエラーであります");
        },
        complete: function () {
            $(".dialogLoading").hide();
        },
    });
};

// Edit content
let editcontent = (formData) => {
    jQuery.ajax({
        type: "POST",
        dataType: "json",
        url: _url_init,
        data: formData,
        beforeSend: function () {
            $(".dialogLoading").show();
        },
        success: function (data) {
            console.log("function:editcontent", data);
            if (typeof data.errMsg != "undefined") {
                $(".error_inline0").html(data.errMsg);
                return;
            }
            $("#centralModalDanger").modal("hide");

            var table = $("#table_idTest").DataTable();
            // setInterval(function () {
            table.ajax.reload(null, false); // user paging is not reset on reload
            // }, 30000);			// location.reload();
            // filtercontentByArea();
        },
        error: function (xhr, textStatus, errorThrown) {
            $(".error_inline0").html("サーバーへの接続のエラーであります");
        },
        complete: function () {
            $(".dialogLoading").hide();
        },
    });
};

// Save content
let savecontent = () => {
    let _InpmemberPw = "「新規パスワード」";
    let _InprememberPw = "「新規パスワード(再)」";
    let _InpmemberId = "「ログインID」";
    let _InpmemberStatus = "「メンバー種別」";

    $(".error_inline0").html("");
    let message = "";
    let error = (obj) => {
        $.each(obj, function (key, value) {
            message += value + "<br>";
            // console.log(message);
            $("#" + key).focus();
            $(".error_inline0").html(message);
        });
        return obj;
    };

    let partern = /^\s*$/;
    let partern2 =
        /[ `!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]|^\s*$|^[^A-Za-z0-9]+$/g;
    let partern3 = /\s/;
    var err = {};

    if (partern2.test($("#memberId").val())) {
        err.memberId = _InpmemberId + _nofomat;
    }
    if (Number($("#isEdit").val()) != 1) {
        _InpmemberPw = "「パスワ	ード」";
        _InprememberPw = "「パスワード(再)」";
        if (partern.test($("#memberPw").val())) {
            err.memberPw = _InpmemberPw + _empty;
        }

        if (partern.test($("#rememberPw").val())) {
            err.rememberPw = _InprememberPw + _empty;
        }
    }

    if (partern3.test($("#memberPw").val())) {
        err.memberPw = _InpmemberPw + _nofomat;
    }

    if (partern3.test($("#rememberPw").val())) {
        err.rememberPw = _InprememberPw + _nofomat;
    }

    if ($("#rememberPw").val() != $("#memberPw").val()) {
        err.checkPw = _InpmemberPw + "と" + _InprememberPw + _nosame;
    }

    if ($.inArray($("#memberStatus").val(), ["0", "1"]) == -1) {
        err.memberStatus = _InpmemberStatus + _nofomat;
    }

    // check error
    if ($.isEmptyObject(error(err)) !== true) {
        return;
    }

    let formData = {};
    formData.controller = _controller;
    formData.memberId = $("#memberId").val() ?? "error";
    formData.memberPw = $("#memberPw").val() ?? "error";
    formData.memberStatus = $("#memberStatus").val() ?? "error";
    formData.memberComment = $("#memberComment").val();

    if (Number($("#isEdit").val()) == 1) {
        console.log("edit");
        formData.action = "edit";
        formData.id = Number($("#id").val()); //primary key
        editcontent(formData);
    } else {
        console.log(formData);
        formData.action = "add";
        addcontent(formData);
    }
};

// Open content dialog
let openDialog = (id, isEdit) => {
    resetError();
    resetDataDialog();
    $(".dialogLoading").hide();
    if (Number(isEdit) == 1) {
        // is edit
        console.log(id);
        $("#keyMember").show();
        $(".new_pass").html("新規");
        $(".show_pc").hide();
        $(".showPw").show();

        jQuery.ajax({
            type: "POST",
            dataType: "json",
            url: _url_init,
            data: {
                controller: _controller,
                action: "loadById",
                id: id,
            },
            // < !--公開フラグ, カテゴリーNo., 短縮タイトル, 正式タイトル, 解説, アラートメッセージ, コメント, リンク先URL, 別ウィンドウ区分, 画像1, 画像2,
            // TOP非表示, FREE, 簿記9, 簿記10, 簿記11, JA9, JA10, JA11, JA接続キット, 日誌6, 日誌6P-- >
            success: function (data) {
                console.log(data);
                let content = data.content;

                console.log("openDialog: edit", content);
                $("#imageTotal").show();
                $("#memberId").prop("disabled", true);

                $("#id").val(content.ID);
                $("#memberId").val(content["member-id"]);
                $("#membershowPw").val(content["member-pw"]);
                $("#memberStatus").val(content["member-status"]);
                $("#memberComment").val(content["member-comment"]);
                // $('#notifyContent').val(content.解説);
                // $('#alertContent').val(content.アラートメッセージ);
                // $('#commentContent').val(content.コメント);
                // $('#linkContent').val(content.リンク先URL);

                // $('#separateContent').val(content.別ウィンドウ区分);
                // $('#image1Content').val(content.画像1);
                // $('#image2Content').val(content.画像2);
                // $('#seperateContent').val(content.別ウィンドウ区分);
                // $('#topContent').val(content.TOP非表示);
                // $('#freeContent').val(content.FREE);

                // if (content.簿記9 == 'ok') $('#account9Content').prop("checked", true);
                // if (content.簿記10 == 'ok') $('#account10Content').prop("checked", true);
                // if (content.簿記11 == 'ok') $('#account11Content').prop("checked", true);

                // if (content.JA9 == 'ok') $('#JA9Content').prop("checked", true);
                // if (content.JA10 == 'ok') $('#JA10Content').prop("checked", true);
                // if (content.JA11 == 'ok') $('#JA11Content').prop("checked", true);

                // if (content.JA接続キット == 'ok') $('#JAContent').prop("checked", true);
                // if (content.日誌6 == 'ok') $('#diary6Content').prop("checked", true);
                // if (content.日誌6P == 'ok') $('#diary6PContent').prop("checked", true);
            },
            error: function (xhr, textStatus, errorThrown) {
                $(".error_inline0").html(
                    "サーバーへの接続のエラーであります。"
                );
            },
        });

        $("#isEdit").val(1);
        // $('#scId').val(schId);
    } else {
        console.log("openDialog: add");
        $("#imageTotal").show();
        $("#keyMember").hide();
        $(".new_pass").html("");
        $("#memberId").prop("disabled", false);
        $(".show_pc").show();
        $(".showPw").hide();
        resetDataDialog();
        // $('#cateContent').val(4);
        // $('#shortTittleContent').val('content');
        // $('#longTittleContent').val('content');
        // $('#notifyContent').val('content');
        // $('#alertContent').val('content');
        // $('#commentContent').val('content');
        // $('#linkContent').val(4);
        // $('#image2Content').val(408);
        $("#isEdit").val(0);
    }
};

// Delete content
let deletecontent = (obj) => {
    console.log(obj);

    jQuery.ajax({
        type: "POST",
        dataType: "text",
        url: _url_init,
        data: {
            controller: _controller,
            action: "delete",
            id: obj,
        },
        success: function (data) {
            console.log("func deletecontent", data);
            $("#submit_del_ok").show();
            $("#submit_del").hide();
            $("#btnCloseFc").hide();
            $(".message").html(data);
            // location.reload();
            var table = $("#table_idTest").DataTable();
            // console.log('func', table);
            // setInterval(function () {
            table.ajax.reload(null, false); // user paging is not reset on reload
            // }, 30000);
        },
        error: function (xhr, textStatus, errorThrown) {
            $(".error_inline0").html("サーバーへの接続のエラーであります。");
        },
    });
};

let resetDataDialog = () => {
    $(".input").val("");
    $(".checkbox1").prop("checked", false);
    $(".custom-select,.browser-default").prop("selectedIndex", 0);
};

let resetError = () => {
    $(".error_inline0").html("");
};

//khanh
let testDel = (obj) => {
    $("#submit_del_ok").hide();
    $(".message").html("この項目を削除してよろしいでしょうか？");
    $(".error_import").html("");
    $("#submit_del").show();
    $("#btnCloseFc").show();
    $("#submit_del").val(obj);
};

// Upload schedules
function importMember() {
    let ipEx = $("#ipExcel").val();
    if (/^\s*$/.test(ipEx) || ipEx == "undefined") {
        // $('#submit_del').hide();
        // $('#btnCloseFc').hide();
        // $('#submit_del_ok').show();
        // $('.message').html("取り込むファイルを選択して下さい。");
        // $('#ipExcel').val('');
        // $('#inputExcel').html('');
    } else {
        console.log($("#ipExcel")[0].files[0]);
        let formData = new FormData();
        formData.append("file", $("#ipExcel")[0].files[0]);
        formData.append("controller", _controller);
        formData.append("action", "uploadData");
        jQuery.ajax({
            type: "POST",
            dataType: "json",
            url: _url_init,
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function () {
                $("#scLoading").show();
            },
            success: function (data) {
                console.log(data);
                let msg = "";
                if (typeof data.errMsg != "undefined") {
                    msg = data.errMsg;
                }
                // else {
                // 	$('#area').val(-1);
                // 	msg = data.numSuccess + " 行の取り込みに成功しました。  " + data.numFailRows + " 行の取り込みに失敗しました。 </br>";
                // 	if (data.numFailRows > 0) {
                // 		msg += "<a href='" + data.errFile + "' target='_blank'>ファイルをダウンロードして詳細な内容をご覧下さい</a>";
                // 	}
                // }

                $("#modalDel").modal("show");
                $("#submit_del_ok").show();
                $("#submit_del").hide();
                $("#btnCloseFc").hide();
                $(".message").html(
                    _success +
                        data.numSuccess +
                        "<br>" +
                        _fail +
                        data.numFailRows
                );

                // show ID error not insert
                Object.keys(data.nameErr).forEach(function (key) {
                    msg += key + ". " + data.nameErr[key] + "<br>\n";
                });
                $(".error_import").html(msg);

                var table = $("#table_idTest").DataTable();
                table.ajax.reload(null, false); // user paging is not reset on reload

                // $('#submit_del').hide();
                // $('#btnCloseFc').hide();
                // $('#submit_del_ok').show();
                // $('.message').html(msg);
                // $('#ipExcel').val('');
                // $('#inputExcel').html('');
            },
            error: function (xhr, textStatus, errorThrown) {
                $(".error_inline0").html(
                    "サーバーへの接続のエラーであります。"
                );
            },
            complete: function () {
                $("#scLoading").hide();
            },
        });
    }
}

//show hide input password
function ShowHide(obj) {
    // console.log($("#memberPw").siblings('a').attr("href"));
    // console.log($("#memberPw"));
    // console.log(obj.siblings('input').val());

    x = $("#memberPw,#rememberPw");
    if (x.attr("type") === "password") {
        x.attr("type", "text");
    } else {
        x.attr("type", "password");
    }
}
