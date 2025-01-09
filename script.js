let checkbox = document.getElementById("menu-check");

checkbox.addEventListener("change", function () {
  divMenu = document.getElementById("menuParent");
  classic = document.getElementById("classicMenu");
  if (this.checked) {
    divMenu.setAttribute("style", "display: flex;");
    classic.setAttribute("style", "display: none;");
  } else {
    divMenu.setAttribute("style", "display: none;");
    classic.setAttribute("style", "display: flex;");
  }
});

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

function redirectTo(url) {
  window.location.href = url;
}