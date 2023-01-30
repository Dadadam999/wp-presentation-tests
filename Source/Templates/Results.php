<div class="wppt-results-wrapper">
<?php
      $html = '';
      foreach ( $this->tests as $test )
      {
          $html .= '<div class="wppt-test">';
          $html .= '<div class="wppt-test-name">'. ( (int)$test['number'] + 1 ) . ') '  . $test['title'] . '</div>';
          $html .= '<div class="wppt-questuions-wrapper">';

          $questions = unserialize($test['questions']);

          $max = 0;
          foreach ($questions as $question)
          {
            if( $max < (int)$question['counter'] )
                $max = (int)$question['counter'];
          }

          if( $max == 0 )
              $max = 1;

          foreach ( $questions as  $question )
          {
              $procent = (int)$question['counter'] * 100 / $max;
              $html .= '<div class="wppt-questuion">';
              $html .= '<div class="wppt-questuion-name">' . $question['name'] . '</div>';
              $html .= '<div style="width:'.$procent.'%" class="wppt-questuion-counter">' . $question['counter'] . '</div>';
              $html .= '</div>';
          }

          $html .= '</div>';
          $html .= '</div>';
      }

      echo $html;
?>
</div>
<button type="button" name="refrash"><a href="<?= get_permalink(); ?>">Обновить данные</a></button>
