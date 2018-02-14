<style>
  body {
    overflow: hidden;
  }
  .hole {
    position: absolute;
    background-color: #000;
    border-radius: 200%;
    padding: 10px;
    cursor: not-allowed;
    -webkit-animation: rotation 200s infinite linear;
  }
  .hole:hover {
    border: 1px solid #000;
    background-color: transparent;
  }

  @-webkit-keyframes rotation {
		from {
				-webkit-transform: rotate(0deg);
		}
		to {
				-webkit-transform: rotate(359deg);
		}
  }
</style>

<?php

error_reporting(E_ERROR);

include('./mcapi.php');

use \DrewM\MailChimp\MailChimp;

$MailChimp = new MailChimp('36b5bbe5bd55981f9fc019809a43dcb7-us17');

$list_id = '63940a5b0a';

$array = $MailChimp->get("lists/$list_id/members?offset=0&count=50");

  foreach((array) $array as $inner) {

      $innerSlice = array_slice($inner, 0, 50);

        foreach((array) $innerSlice as $value) {

          $thisthing = ($value['email_address']);

            $min=-5;
            $max=105;
            $y = rand($min,$max);
            $x = rand($min,$max);

          echo '<div class="hole" style="top:' . $y . 'vw;left:' . $x . 'vw;">' . $thisthing . '</div>';

          // echo '<pre>'; var_dump($value);

        }
  }



?>
