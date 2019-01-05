const ItemLoader = require('../js/ItemLoader');

const isHomePage = document.querySelector('.home-page') != undefined ? true : false;
const isWorkPage = document.querySelector('.work-page') != undefined ? true : false;
const isResumePage = document.querySelector('.resume-page') != undefined ? true : false;


//======================================
//  Mobile menu functionality
//======================================

let mobileMenuOpenIcon = document.querySelector('body > header .hamburger-icon');
let mobileMenuCloseIcon = document.querySelector('body > .mobile-menu > .close-icon');
let mobileMenu = document.querySelector('body > .mobile-menu');
let mainAppEl = document.querySelector('body > main');
let headerEl = document.querySelector('body > header');

mobileMenuOpenIcon.addEventListener('click', () => {
  mobileMenu.classList.add('is-open');
  mainAppEl.classList.add('is-mobile-menu-open');
  headerEl.classList.add('is-mobile-menu-open');
});

mobileMenuCloseIcon.addEventListener('click', () => {
  mobileMenu.classList.remove('is-open');
  mainAppEl.classList.remove('is-mobile-menu-open');
  headerEl.classList.remove('is-mobile-menu-open');
});


//======================================
//  Page functionality
//======================================

// Home page - load all work items
if(isHomePage) {
  loadWorkItems(undefined, 8);

// Work page = load work items by category based on selected tag (hash)
} else if(isWorkPage) {
  loadWorkItemsFromHash();

  window.addEventListener('hashchange', () => {
    document.querySelectorAll('.work-controls .tag').forEach((element) => {
      element.classList.remove('is-active');
    });

    loadWorkItemsFromHash();
  });

// Resume page = toggle full and web-only versions
} else if(isResumePage) {

  document.querySelectorAll('[name="version"]').forEach(function(element) {
    element.addEventListener('change', e => {
      switch(e.target.getAttribute('value')) {
        // Full = hide all web-only items, show all non-web-only items
        case 'full':
          document.querySelectorAll('.is-web-only').forEach((element) => {
            element.classList.add('is-hidden');
          });

          document.querySelectorAll('.is-non-web').forEach((element) => {
            element.classList.remove('is-hidden');
          });

          break;

        // Web = hide all non-web-only items, show all web-only items
        case 'web':
          document.querySelectorAll('.is-web-only').forEach((element) => {
            element.classList.remove('is-hidden');
          });

          document.querySelectorAll('.is-non-web').forEach((element) => {
            element.classList.add('is-hidden');
          });

          break;
      }
    });
  });

}


//===================================================
//  Load appropriate work items based on hash
//===================================================

function loadWorkItemsFromHash() {
  if(location.hash.length == 0) {
    document.querySelector('.work-controls .tag[href*="/work"]').classList.add('is-active');
  } else {
    document.querySelector('.work-controls .tag[href*="' + location.hash + '"]').classList.add('is-active');
  }

  loadWorkItems(location.hash.slice(1, location.hash.length));
}


//==============================================
//  Load work items with provided category
//==============================================

function loadWorkItems(category = undefined, count = undefined) {
  // Remove all previously-loaded work items
  document.querySelector('.work-items').innerHTML = '';

  // Load new items using hash
  let itemStream;
  itemStream = ItemLoader.load(category, count);

  // Templateize and inject items onto page
  itemStream.then(items => {
    for(const item of items) {
      let innerHTML = createWorkItem(item);
      let container = document.createElement('a');
      container.classList.add('work-item');
      container.setAttribute('href', item.url);
      container.innerHTML = innerHTML;

      document.querySelector('.work-items').appendChild(container);
    }
  });
}

// Template data into a "work item" component
function createWorkItem(data) {
  return `
    <img src="${data.thumbnail}" alt="${data.title}">

    <div class="details">
      <h2>${data.title}</h2>
      <span class="date">(${data.year})</span>
    </div>
  `;
}