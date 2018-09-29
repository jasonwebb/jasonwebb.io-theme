let Search = require('./Search'),
    MobileMenu = require('./MobileMenu'),
    Carousel = require('./Carousel'),
    Overlay = require('./Overlay'),
    Work = require('./Work');

/*
  TODO:
  - Load components based on route (/work, etc)
*/

// Activate the Search component on every page
let search = new Search(document.querySelector('.sidebar .search'));

// Activate the Overlay component on every page
let overlay = new Overlay();

// if(MOBILE VIEWPORT) {
  let mobileMenu = new MobileMenu();
  let mobileSearch = new Search(document.querySelector('.mobile-controls .search'));
// }

// Activate the Work component only when on the /work page
if($('.work-page').length > 0) {
  let work = new Work();
}