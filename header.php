<header>
  <?php
    if (!isset($_SESSION['LOGGED_USER'] && isset($_COOKIE['email']) && isset($_COOKIE['password']))) {
      header('Location: autoconnect.php');
    }
  ?>
  <div class="classicMenu" id="classicMenu">
    <a href="/www/index.php">
      <h1>CUISINE</h1>
    </a>
    <ul class="menu desktopOnly">
      <li><a href="/www/login/login.php" style="display:flex;align-items:center;text-transform: uppercase;"><svg
            width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none" xmlns="http:/.w3.org/2000/svg"
            color="#000000">
            <path
              d="M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2Z"
              stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path d="M4.271 18.3457C4.271 18.3457 6.50002 15.5 12 15.5C17.5 15.5 19.7291 18.3457 19.7291 18.3457"
              stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            <path
              d="M12 12C13.6569 12 15 10.6569 15 9C15 7.34315 13.6569 6 12 6C10.3431 6 9 7.34315 9 9C9 10.6569 10.3431 12 12 12Z"
              stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg>
          <?php
          if (isset($_SESSION['LOGGED_USER'])) {
            echo $_SESSION['LOGGED_USER']['pseudo'];
          } else {
            echo "PROFIL";
          }
          ?>
        </a></li>
      <li><a href="/www/contact/contact.php">CONTACT</a></li>
    </ul>
    <input type="checkbox" id="menu-check" name="menu-check" hidden />
    <label class="menu mobileOnly" for="menu-check"><svg width="24px" height="24px" stroke-width="1.5"
        viewBox="0 0 24 24" fill="none" xmlns="http:/.w3.org/2000/svg" color="#000000">
        <path d="M3 5H21" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        <path d="M3 12H21" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
        <path d="M3 19H21" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
      </svg></label>
  </div>
  <div id="menuParent">
    <div id="menu">
      <div class="classicMenu" id="boxMenuDeroulant">
        <a href="/www/index.php">
          <h1>CUISINE</h1>
        </a>
        <label class="openMenu mobileOnly" for="menu-check"><svg width="24px" height="24px" stroke-width="1.5"
            viewBox="0 0 24 24" fill="none" xmlns="http:/.w3.org/2000/svg" color="#000000">
            <path
              d="M6.75827 17.2426L12.0009 12M17.2435 6.75736L12.0009 12M12.0009 12L6.75827 6.75736M12.0009 12L17.2435 17.2426"
              stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
          </svg></label>
      </div>
      <ul class="wrappable">
      </ul>
      <ul class="menuProfile">
        <li><a href="/www/contact/contact.php">CONTACT</a></li>
        <li><a href="/www/login/login.php" style="display:flex;align-items:center;text-transform: uppercase;"><svg
              width="24px" height="24px" stroke-width="1.5" viewBox="0 0 24 24" fill="none"
              xmlns="http:/.w3.org/2000/svg" color="#000000">
              <path
                d="M12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2Z"
                stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
              <path d="M4.271 18.3457C4.271 18.3457 6.50002 15.5 12 15.5C17.5 15.5 19.7291 18.3457 19.7291 18.3457"
                stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
              <path
                d="M12 12C13.6569 12 15 10.6569 15 9C15 7.34315 13.6569 6 12 6C10.3431 6 9 7.34315 9 9C9 10.6569 10.3431 12 12 12Z"
                stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <?php
            if (isset($_SESSION['LOGGED_USER'])) {
              echo $_SESSION['LOGGED_USER']['pseudo'];
            } else {
              echo "PROFIL";
            }
            ?>
          </a></li>
      </ul>
    </div>
  </div>
</header>