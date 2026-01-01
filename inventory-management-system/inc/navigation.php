
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top glass-nav" style="
top: 12px;
  left: 12px;
  right: 12px;
  width: auto;

  border-radius: 16px;

  /* Glass look */
  background: rgba(20, 20, 20, 0.55) !important; /* dark glass */
  backdrop-filter: blur(12px) saturate(140%);
  -webkit-backdrop-filter: blur(12px) saturate(140%);

  /* Light border like glass edge */
  border: 1px solid rgba(255, 255, 255, 0.12);

  /* Soft shadow */
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.35);

  /* Optional: smoother text */
  -webkit-font-smoothing: antialiased;
">
  <div class="container">
    <img src="<?php echo ROOT_URL; ?>assets/img/logo.svg" alt="Logo" style="width:40px;height:40px;" />
    <a class="navbar-brand" href="<?php echo ROOT_URL; ?>">ប្រព័ន្ធគ្រប់គ្រងសារពើភ័ណ្ឌសាកលវិទ្យាល័យ​</a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
      aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <span class="nav-link">សូមស្វាគមន៍ <?php echo $_SESSION['fullName']; ?></span>
        </li>
        <li class="nav-item">
          <span class="nav-link"> | </span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="model/login/logout.php">ចាកចេញ</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
