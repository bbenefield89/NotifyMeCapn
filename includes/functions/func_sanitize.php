<?php

function validate_form_data($form_data) {
  $form_data = trim(
    stripslashes(
      htmlspecialchars(
        strip_tags(
          str_replace(
            [
              '(',
              ')',
            ],
            '', $form_data )
        ), ENT_QUOTES
      )
    )
  );
  
  return $form_data;
}
  
?>
