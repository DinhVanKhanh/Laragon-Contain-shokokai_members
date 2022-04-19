<?php
    namespace Redirect;
    class Redirect {
        function __construct( $link ) {
            echo "<script>window.location.href = '" . trim( $link ) . "'</script>";
            exit;
        }
    }
?>