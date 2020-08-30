$(function () {
  $("#texto").hover(function () {
    fadeSwitchElements("a", "b");
  });

  function fadeSwitchElements(id1, id2) {
    var element1 = $("#" + id1);
    var element2 = $("#" + id2);

    if (element1.is(":visible")) {
      element1.fadeToggle(0);
      element2.fadeToggle(0);
    } else {
      element2.fadeToggle(0, function () {
        element1.fadeToggle(0);
      });
    }
  }
});
