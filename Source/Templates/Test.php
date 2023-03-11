<?php
  $answers = explode(';', $_SESSION['questions'] );
  $answered = in_array( 'q' . $this->currentTestNumber , $answers );
  $questions = unserialize( $this->currentTest['questions'] );
?>
<div class="wppt-test-wrapper">
    <form class="wppt-form" enctype="application/x-www-form-urlencoded" method="post">
    <?php wp_nonce_field('wppt-test-submit', 'wppt-test-submit') ?>
    <input type="hidden" name="wppt-number" value="<?= $this->currentTestNumber; ?>">
    <span class="wppt-title"> <?= ( (int)$this->currentTest['number'] + 1 ) . ') ' . $this->currentTest['title'] ?> </span>
    <?php
      if( $answered )
      {
          ?>
          <input type="submit" name="wppt-test-submit" disabled value="Отвечено">
          <?php
      }
      else
      {
          ?>
          <div class="wppt-form-questions">
              <?php
                  $number = 0;
                  foreach ($questions as $question)
                  {
                     ?>
                     <div class="wppt-form-question">
                        <input type="radio" name="wppt-question-<?= $number; ?>" value="select">
                        <label for="question-<?= $number; ?>"><?= $question['name'] ?></label>
                     </div>
                     <?php
                     $number++;
                  }
               ?>
          </div>
          <input type="submit" name="wppt-test-submit" value="Ответить">
          <?php
      }
     ?>
    <div class="wppt-navigation">
    <?php
      if( $this->currentTestNumber > 0 )
      {
          ?>
          <a class="wppt-button-link" href="<?= get_permalink() . '?wppt_question=' . ( $this->currentTestNumber - 1 ); ?>"><button type="button" name="test-preview" class="wppt-button">Назад</button></a>
          <?php
      }

      if( $this->currentTestNumber < count($this->tests) - 1 )
      {
          ?>
          <a class="wppt-button-link" href="<?= get_permalink() . '?wppt_question=' . ( $this->currentTestNumber + 1 ); ?>"><button type="button" name="test-next" class="wppt-button">Вперёд</button></a>
          <?php
      }
     ?>
     </div>
    </form>
</div>
