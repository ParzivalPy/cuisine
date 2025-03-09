// Ouverture du menu pour mobile

let checkbox = document.getElementById("menu-check");

checkbox.addEventListener("change", function () {
  divMenu = document.getElementById("menuParent");
  classic = document.getElementById("classicMenu");
  html = document.getElementsByTagName("html")[0];
  add_recipe = document.getElementById("add_recipe");
  if (this.checked) {
    divMenu.setAttribute("style", "display: flex;");
    classic.setAttribute("style", "display: none;");
    html.setAttribute("style", "overflow: hidden;");
    add_recipe.setAttribute("style", "display: none;");
  } else {
    divMenu.setAttribute("style", "display: none;");
    classic.setAttribute("style", "display: flex;");
    html.setAttribute("style", "overflow: auto;");
    add_recipe.setAttribute("style", "display: flex;");
  }
});

// Formulaire de contact, message de confirmation

function confirmMessage() {
  let email = document.getElementById("mail");
  let subject = document.getElementById("subject");
  let message = document.getElementById("message");
  let afficheEmail = document.getElementById("afficheMail");
  let afficheSubject = document.getElementById("afficheSubject");
  let afficheMessage = document.getElementById("afficheMessage");
  if (email.validity.typeMismatch == false) {
    afficheEmail.value = email.value;
    afficheSubject.value = subject.value;
    afficheMessage.value = message.value;
    popupParent = document.getElementById("popupParent");
    popupParent.setAttribute("style", "display: block;");
  }
}

// Fonction de redirection

function redirectTo(url) {
  window.location.href = url;
}

//Fonction de réinitialisation du formulaire de filtre

function resetFilter() {
  document.getElementById('filters').reset();
  redirectTo("index.php");
}
