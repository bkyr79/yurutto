<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
<title>継続アプリ「ゆるっと」</title>
<link type="text/css" rel="stylesheet" href="./css/menu.css">
<script src="./js/jquery-3.5.1.min.js"></script>
</head>
<body>
<header>

<button type="button" id="js-buttonHamburger" class="c-button p-hamburger" aria-controls="global-nav" aria-expanded="false">
  <span class="p-hamburger__line">
    <span class="u-visuallyHidden">
      メニューを開閉する
    </span>
  </span>
</button>

<nav>
  <ul class="ul">
    <li><a href="index.php">Action</a></li>
    <li><a href="action_list.php">List</a></li>
    <li><a href="gohobi_list.php">Reward</a></li>
    <li><a href="jump_to_add.php">Reward Add</a></li>
    <li><a href="your_point.php">Point</a></li>
  </ul>
</nav>
</header>

<script>
  const btn = document.querySelector('#js-buttonHamburger');
  const nav = document.querySelector('nav');  
  btn.addEventListener('click', () => {
    nav.classList.toggle('open-menu')
  });

  (function () {
    $('#js-buttonHamburger').click(function () {
      $('body').toggleClass('is-drawerActive');

      if ($(this).attr('aria-expanded') == 'false') {
        $(this).attr('aria-expanded', true);
      } else {
        $(this).attr('aria-expanded', false);
      }
    });
  }) ();
</script>
</body>
</html>