<?php
if ( in_category("information") ) {
  include(TEMPLATEPATH . "/single-information.php");
  } else if ( in_category("about_mobie") ) {
  include(TEMPLATEPATH . "/single-about_movie.php");
  }
?>