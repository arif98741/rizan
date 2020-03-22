// scroll back to top
var mybutton = document.getElementById("arrowUp");
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

// search bar
function showSearch() {
  document.getElementById("hidden-search-bar").style.display = "block";
}
function hideSearch() {
  document.getElementById("hidden-search-bar").style.display = "none";
}

// home search
if ($(window).width() < 576) {
  document.getElementById("placeholder-text-change").placeholder = "Search";
}