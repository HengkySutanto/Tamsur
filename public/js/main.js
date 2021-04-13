function showItemMenu(id) {
    var elems = document.querySelectorAll(`.item-menu:not(#_${id})`);

    [].forEach.call(elems, function(el) {
        el.classList.add("hidden");
    });

    var menuDropdown = document.getElementById("_" + id);
        menuDropdown.classList.toggle("hidden");
  }