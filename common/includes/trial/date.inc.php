<?php
    function showDate($nm_year, $nm_month, $nm_day, $yearSt, $yearEnd) { ?>
        <select name="<?= $nm_year ?>">
        <option value="">--</option>
        <?php
            for ($i = $yearEnd; $i >= $yearSt; $i--) {
                echo "<option value='$i'>$i</option>";
            }
        ?>
        </select>年

        <select name="<?= $nm_month ?>">
        <option value="">--</option>
        <?php
            for ($i = 1; $i <= 12; $i++) {
                echo "<option value='".(($i < 10) ? "0$i" : $i)."'>$i</option>";
            }
        ?>
        </select>月

        <select name="<?= $nm_day ?>">
        <option value="">--</option>
        <?php
            for ($i = 1; $i <= 31; $i++) {
                echo "<option value='".(($i < 10) ? "0$i" : $i)."'>$i</option>";
            }
        ?>
        </select>日 
<?php
    }
?>
