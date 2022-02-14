<div id="wrapper" class="d-flex align-items-center justify-content-center">
  <div class="auth-box register">
    <div class="content">
      <div class="header">
        <div class="logo text-center">STOCK BARANG</div>
        <div class="logo text-center">PT.BERLIAN UTAMA NIAGA</div>
        <p class="lead">LOGIN</p>
        <div>
          <?php echo $this->session->flashdata("message") ? custom_alert_messages("error", $this->session->flashdata("message")) : "" ?>
        </div>
      </div>
      <form autocomplete="off" class="form-auth-small" method="POST" data-parsley-validate action="<?= base_url("authcontroller/auth") ?>">
        <div class="form-group">
          <label for="signup-email" class="control-label sr-only">Email</label>
          <input type="email" class="form-control" name="email" id="signup-email" placeholder="Your email" required>
        </div>
        <div class="form-group">
          <label for="signup-password" class="control-label sr-only">Password</label>
          <input type="password" name="password" class="form-control" required id="signup-password" placeholder="Password">
          <span class="errorspannewpassinput"></span>
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
      </form>
    </div>
  </div>
</div>