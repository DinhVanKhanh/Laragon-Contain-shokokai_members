<?php
  // グローバルナビ、及びサイト全般に関する記述です。
  // この埋め込みを使用する際には必ず HeaderSelectNo の値を宣言してきてください。
  // 20120830変更 ヘッダー宣言を各ページから削除します。
  $HPCategoryColor1 = "#3C4EAB";
  $HPCategoryColor2 = "b";

  // 今いるファイル（index.aspファイル専用）が格納されている
  // フォルダ名を取得します。
  // ※主にニュースリリースのフォルダ名取得に使用します。
  function GetLastFolderName() {
      $dir = scandir($_SERVER["SCRIPT_NAME"], 1);
      return $dir[0];
  }

  // ページの「前へ」「次へ」のデザインを一括制御します。
  // ※業務でも農業でも使用していますので注意してください。
  function PrevNextNaviAg($direct, $prevurl, $prevpage, $nexturl, $nextpage) { 
    $color = (strtolower($direct) == "next") ? 'E0E4FF' : '#F4F4F8';?>
    <DIV style="margin-bottom:1em; padding:5px 0px 4px 0px; border-top:1px #C0C0C0 solid; border-bottom:1px #C0C0C0 solid; background-color:<?= $color ?>; text-align:center;">
      <TABLE width="100%" border="0" cellspacing="0" cellpadding="0">
        <TR>
          <TD class="prd_g_pgback"><A href="<?= $prevurl ?>"><?= $prevpage ?></A></TD>
          <TD class="prd_g_pgnext" style="text-align:right;"><A href="<?= $nexturl ?>"><?= $nextpage ?></A></TD>
        </TR>
      </TABLE>
    </DIV>
<?php
  } ?>
