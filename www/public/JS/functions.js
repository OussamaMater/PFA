/*  ######################################################################################################################################################################################### */
/* NOTES: */
/* * Editor used : VScode. */
/* * Extensions Used : BetterComments, RainbowIndent, Waka, GitLens, Prettier. */
/* * File Path : WebProject/JS/ .*/
/* * File Description : Plugs. */
/* * TrackingSys : Git, @ oussama.mater@esen.tn, mohamed.trabelsi@esen.tn, MasterBranche */
/* ? #########################################################################################################################################################################################*/

window.addEventListener("scroll", function () {
  const mainNav = document.getElementById("navbar");

  if (this.window.pageYOffset > 0) {
    mainNav.classList.add("navscroll");
    mainNav.classList.add("navscroll a");
    mainNav.classList.add("navscroll #navcustom_1:hover");
    mainNav.classList.add("navscroll #navcustom_2:hover");
    mainNav.classList.add("navscroll #navcustom_3:hover");
  } else {
    mainNav.classList.remove("navscroll");
    mainNav.classList.remove("navscroll a");
    mainNav.classList.remove("navscroll #navcustom_1:hover");
    mainNav.classList.remove("navscroll #navcustom_2:hover");
    mainNav.classList.remove("navscroll #navcustom_3:hover");
  }
});
