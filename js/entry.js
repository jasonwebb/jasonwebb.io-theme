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
  loadWorkItems(undefined, 9);

// Work page = load work items by category based on selected tag
} else if(isWorkPage) {
  // Select appropriate radio based on hash on load
  if(location.hash != undefined && location.hash != '#') {
    document.querySelector('[name="category"][value="' + location.hash.substr(1, location.hash.length) + '"]').setAttribute('checked', true);
  }

  // Load initial work items for whichever category is selected on load
  loadWorkItems(document.querySelector('[name="category"]:checked').getAttribute('value'));

  // Load new work items when category changes
  document.querySelectorAll('[name="category"]').forEach(function(element) {
    element.addEventListener('change', e => {
      loadWorkItems(e.target.getAttribute('value'));
    });
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


//==============================================
//  Load work items with provided category
//==============================================

function loadWorkItems(category = undefined, count = undefined) {
  // Remove all previously-loaded work items
  document.querySelector('.tiles').innerHTML = '';

  // Load new items using hash
  let itemStream;
  itemStream = ItemLoader.load(category, count);

  // Templateize and inject items onto page
  itemStream.then(items => {
    for(const item of items) {
      let listItem = document.createElement('li');
      listItem.innerHTML = createWorkItem(item);

      document.querySelector('.tiles').appendChild(listItem);
    }

    // Set the location hash based on selected category for bookmarking
    if(category == undefined || category == '') {
      location.hash = '';
    } else {
      location.hash = category;
    }
  });
}

// Template data into a "work item" component
function createWorkItem(data) {
  return `
    <a href="${data.url}" class="tile">
      <img src="${data.thumbnail}" alt="">

      <div class="overlay">
        <span>
          <b>${data.title}</b>
          <small>(${data.year})</small>
        </span>
      </div>
    </a>
  `;
}