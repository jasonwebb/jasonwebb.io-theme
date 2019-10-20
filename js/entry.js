const ItemLoader = require('../js/ItemLoader');

const isHomePage = document.querySelector('.home-page') != undefined ? true : false;
const isWorkPage = document.querySelector('.work-page') != undefined ? true : false;
const isResumePage = document.querySelector('.resume-page') != undefined ? true : false;

let tabs = document.querySelectorAll('[role="tab"]');
let tabPanels = document.querySelectorAll('[role="tabpanel"]');

//======================================
//  Mobile menu functionality
//======================================

let mobileMenuOpenIcon = document.querySelector('body > header .hamburger-icon');
let mobileMenuCloseIcon = document.querySelector('body > .mobile-menu > .close-button');
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
  if(location.hash != undefined && location.hash != '#' && location.hash != '') {
    // Activate the tab for this hash
    let hashValue = location.hash.substr(1, location.hash.length);
    let tab = document.getElementById(hashValue + '-button');
    activateTab(tab);
  }

  let category = document.querySelector('[role="tab"][aria-selected="true"]').innerText.toLowerCase();

  // Load initial work items for whichever category is selected on load
  loadWorkItems(
    category === 'all' ? undefined : category,
    undefined,
    document.querySelector('[role="tabpanel"].is-active .tiles')
  );

  // Load new work items when category changes
  tabs.forEach(function(tab) {
    tab.addEventListener('click', function(e) {
      activateTab(e.target);
    });

    tab.addEventListener('keydown', function(e) {
      switch(e.key) {
        case 'ArrowLeft':
          focusPreviousTab();
          break;

        case 'ArrowRight':
          focusNextTab();
          break;

        case 'Home':
          e.preventDefault();
          tabs[0].focus();
          break;

        case 'End':
          e.preventDefault();
          tabs[tabs.length - 1].focus();
          break;

        case 'Enter':
        case ' ':
          e.preventDefault();
          let selectedTab = document.activeElement;
          activateTab(selectedTab, true);
          break;
      }
    })
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

function loadWorkItems(category = undefined, count = undefined, target = undefined, focus = false) {
  if(target != undefined) {
    target.innerHTML = '';
  } else {
    document.querySelector('.tiles').innerHTML = '';
  }

  // Load new items using hash
  let itemStream;
  itemStream = ItemLoader.load(category, count);

  // Templatize and inject items onto page
  itemStream.then(items => {
    for(const item of items) {
      let listItem = document.createElement('li');
      listItem.innerHTML = createWorkItem(item);

      if(target !== undefined) {
        target.appendChild(listItem);
      } else {
        document.querySelector('.tiles').appendChild(listItem);
      }
    }

    if(focus) {
      if(target !== undefined) {
        target.querySelector('.tile').focus();
      } else {
        document.querySelector('.tile').focus();
      }
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

function activateTab(tab, focus = false) {
  let category = tab.innerText.toLowerCase();

  // Deactivate any active tab
  tabs.forEach(function(tab) {
    tab.setAttribute('tabindex', -1);
    tab.setAttribute('aria-selected', false);
    tab.classList.remove('is-highlighted');
  });

  // Hide all tabpanels
  tabPanels.forEach(function(tabPanel) {
    tabPanel.classList.remove('is-active');
  });

  // Activate the provided tab
  tab.removeAttribute('tabindex');
  tab.setAttribute('aria-selected', true);
  tab.classList.add('is-highlighted');

  // Show the tab panel for this tab
  let tabpanel = document.getElementById(tab.getAttribute('aria-controls'));
  tabpanel.classList.add('is-active');

  // Load initial work items for whichever category is selected on load
  loadWorkItems(
    category === 'all' ? undefined : category,
    undefined,
    document.querySelector('[role="tabpanel"].is-active .tiles'),
    focus
  );
}

function focusPreviousTab() {
  let selectedTab = document.querySelector('[role="tab"][aria-selected="true"]');

  if(selectedTab !== document.activeElement) {
    selectedTab = document.activeElement;
  }

  let selectedTabIndex = Array.prototype.slice.call(tabs).indexOf(selectedTab);

  if(selectedTabIndex > 0) {
    tabs[selectedTabIndex - 1].focus();
  } else {
    tabs[tabs.length - 1].focus();
  }
}

function focusNextTab() {
  let selectedTab = document.querySelector('[role="tab"][aria-selected="true"]');

  if(selectedTab !== document.activeElement) {
    selectedTab = document.activeElement;
  }

  let selectedTabIndex = Array.prototype.slice.call(tabs).indexOf(selectedTab);

  if(selectedTabIndex < tabs.length - 1) {
    tabs[selectedTabIndex + 1].focus();
  } else {
    tabs[0].focus();
  }
}