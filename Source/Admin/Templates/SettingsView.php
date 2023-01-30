<form class="" enctype="application/x-www-form-urlencoded" method="post">
    <?php echo wp_nonce_field('mufh_settings_admin_nonce', 'mufh_settings_admin_nonce'); ?>
    <div class="settings-admin-form">
      <div class="mufh-field-form">
          <label class="mufh-field-label-regular" for="author-payment-max">Минимальная сумма вывода</label>
          <input required user_id="<?php echo $user->ID; ?>" class="mufh-field-form-input" type="number" name="author-payment-max" value="<?php echo $this->getMeta('author-payment-max'); ?>">
      </div>
    </div>
    <input type="submit" id="mufh-save-admin-settings" class="mufh-save-profile" name="save-profile" value="Сохранить">
</form>
