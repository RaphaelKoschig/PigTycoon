<div id="mainmenu">
  <nav class="navbar navbar-expand-lg navbar-light bg-primary justify-content-between">
    <a class="navbar-brand" href="#">PigTycoon</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="index.php"><img src="./public/images/icons/home.svg" alt="icône accueil" class="navbar-icons">Accueil</a>
        </li>
        <li>
          <a class="nav-link" href="index.php?action=listPigs"><img src="./public/images/icons/pig.svg" alt="icône cochon" class="navbar-icons">Cochons</a>
        </li>
        <li>
          <a class="nav-link" href="index.php?action=society"><img src="./public/images/icons/briefcase.svg" alt="icône société" class="navbar-icons">Société</a>
        </li>
        <li>
          <a class="nav-link" href="index.php?action=contact"><img src="./public/images/icons/envelope.svg" alt="icône contact" class="navbar-icons">Contact</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="./public/images/icons/gear.svg" alt="icône gestion" class="navbar-icons">
            Gestion
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Reproduction</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
      </ul>

    </div>
  </nav>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    var pathname = window.location;
    console.log(pathname)
    $('a[href="'+pathname+'"]').parent().addClass('active');
  })
</script>