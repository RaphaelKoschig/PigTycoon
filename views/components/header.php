<div id="mainmenu">
  <nav class="navbar navbar-expand-lg navbar-light bg-primary justify-content-between">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
      <ul class="navbar-nav">
      <a class="navbar-brand" href="index.php">PigTycoon</a>
        <li class="nav-item">
          <a class="nav-link" href="index.php"><img src="./public/images/icons/home.svg" alt="icône accueil" class="navbar-icons">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?action=listPigs"><img src="./public/images/icons/pig.svg" alt="icône cochon" class="navbar-icons">Cochons</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?action=society"><img src="./public/images/icons/briefcase.svg" alt="icône société" class="navbar-icons">Société</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?action=contact"><img src="./public/images/icons/envelope.svg" alt="icône contact" class="navbar-icons">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="index.php?action=adminListPigs"><img src="./public/images/icons/gear.svg" alt="icône gestion" class="navbar-icons">Gestion</a>
        </li>
      </ul>

    </div>
  </nav>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    var pathname = window.location.href
    var reg = /\s*\/|&\s*/;
    var truePathname = pathname.split(reg)
    console.log(truePathname[4])
    $('a[href="' + truePathname[4] + '"]').parent().addClass('active');
  })
</script>