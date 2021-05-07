function showItemMenu(id) {
  var elems = document.querySelectorAll(`.item-menu:not(#_${id})`);

  [].forEach.call(elems, function (el) {
    el.classList.add("hidden");
  });

  var menuDropdown = document.getElementById("_" + id);
  menuDropdown.classList.toggle("hidden");
}

function hideSessionNotif(id) {
  var notif = document.getElementById(id);
  notif.classList.add("hidden");
}

function openModalConfirmation(id) {
  var notif = document.getElementById('modal-' + id);
  notif.classList.remove("hidden");

  var menuDropdown = document.getElementById("_" + id);
  menuDropdown.classList.add("hidden");
}

function closeModalConfirmation(id) {
  var notif = document.getElementById(id);
  notif.classList.add("hidden");
}

function activateEditSession(session) {
  console.log(session)
  var elems = document.querySelectorAll(`input[name='session_id_${session.id}[]']`);
  var elemsTelat = document.querySelectorAll(`input[name='session_id_${session.id}_telat[]']`);
  
  var toggleIcon = document.getElementById('toggle-'+session.session_date);
  if(toggleIcon.classList.contains('fa-pencil-alt')) {
    toggleIcon.classList.remove("fa-pencil-alt");
    toggleIcon.classList.add("fa-times-circle");
  
    [].forEach.call(elems, function (el) {
      el.disabled = false;
    });
    [].forEach.call(elemsTelat, function (el) {
      el.disabled = false;
    });
  }else {
    toggleIcon.classList.add("fa-pencil-alt");
    toggleIcon.classList.remove("fa-times-circle");
  
    [].forEach.call(elems, function (el) {
      el.disabled = true;
    });
    [].forEach.call(elemsTelat, function (el) {
      el.disabled = true;
    });
  }
}

function toggleTelat(sessionId, studentId) {
  let toggleTelat = document.getElementById(sessionId + "-" + studentId + "-telat")
  let checkboxHadir = document.getElementById(sessionId + "-" + studentId)
  
  
  // document.getElementById('box').checked = false;
  console.log("klik: ", toggleTelat.checked == true)
  if(toggleTelat.checked == true) {
    checkboxHadir.checked = true
  }else {
    checkboxHadir.checked = false
  }
}