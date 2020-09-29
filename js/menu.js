function mobile() {
  if (document.getElementById("nav-mobile").style.transform == "translateY(0%)") {
      document.getElementById("nav-mobile").style.transform = "translateY(-105%)";
      document.getElementById("open").style.display ="block";
      document.getElementById("close").style.display ="none";
      document.body.style.overflowY = "scroll";
  } else {
      document.getElementById("nav-mobile").style.transform = "translateY(0%)";
      document.getElementById("open").style.display ="none";
      document.getElementById("close").style.display ="block";
      document.body.style.overflowY = "hidden";
  }
}
