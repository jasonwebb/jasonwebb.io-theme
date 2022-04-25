//======================================
//  Dark mode
//======================================
let darkModeToggleButtons = document.querySelectorAll('.dark-mode-toggle-button');
let darkModeToggleButtonDesktop = document.getElementById('dark-mode-toggle-button--desktop');
let darkModeToggleButtonMobile = document.getElementById('dark-mode-toggle-button--mobile');
let activeColorScheme = window.localStorage.getItem('active-color-scheme');

// Enable dark mode if the user requested it through an OS or UA setting.
if(activeColorScheme === null) {
  if(window.matchMedia('(prefers-color-scheme: dark)').matches) {
    window.localStorage.setItem('active-color-scheme', 'dark');
  } else {
    window.localStorage.setItem('active-color-scheme', 'light');
  }

  activeColorScheme = window.localStorage.getItem('active-color-scheme');
}

// Set the ARIA button state on page load based on localStorage
if(activeColorScheme === 'dark') {
  document.documentElement.classList.add('is-dark-mode');

  darkModeToggleButtons.forEach((button) => {
    button.setAttribute('aria-pressed', true);
  });
} else if(activeColorScheme === 'light') {
  darkModeToggleButtons.forEach((button) => {
    button.setAttribute('aria-pressed', false);
  });
}

// Toggle dark mode when any of the dark mode toggle buttons are activated.
darkModeToggleButtons.forEach((button) => {
  button.addEventListener('click', () => {
    const isPressed = button.getAttribute('aria-pressed') === 'true' ? true : false;

    darkModeToggleButtons.forEach((otherButton) => {
      otherButton.setAttribute('aria-pressed', !isPressed);
    });

    if(isPressed) {
      document.documentElement.classList.remove('is-dark-mode');
      window.localStorage.setItem('active-color-scheme', 'light');
    } else {
      document.documentElement.classList.add('is-dark-mode');
      window.localStorage.setItem('active-color-scheme', 'dark');
    }
  });
});

//======================================
//  Mobile menu functionality
//======================================
let mobileMenuOpenButton = document.querySelector('body > header .hamburger-icon');
let mobileMenuCloseButton = document.querySelector('body > .mobile-menu .close-button');
let mobileMenu = document.querySelector('body > .mobile-menu');
let firstFocusableElement = mobileMenu.querySelector('.first-focusable-element');
let lastFocusableElement = mobileMenu.querySelector('.last-focusable-element');

mobileMenuOpenButton.addEventListener('click', () => {
  mobileMenu.classList.add('is-open');
  document.body.classList.add('mobile-menu-is-open');
  mobileMenuCloseButton.focus();
});

mobileMenuCloseButton.addEventListener('click', () => {
  mobileMenu.classList.remove('is-open');
  document.body.classList.remove('mobile-menu-is-open');
  mobileMenuOpenButton.focus();
});

mobileMenu.addEventListener('keyup', (e) => {
  if(e.key == 'Escape') {
    mobileMenu.classList.remove('is-open');
    document.body.classList.remove('mobile-menu-is-open');
    mobileMenuOpenButton.focus();
  }
});

firstFocusableElement.addEventListener('keydown', (e) => {
  if(e.shiftKey && e.key == 'Tab') {
    e.preventDefault();
    lastFocusableElement.focus();
  }
});

lastFocusableElement.addEventListener('keydown', (e) => {
  if(!e.shiftKey && e.key == 'Tab') {
    e.preventDefault();
    firstFocusableElement.focus();
  }
});


//======================================
//  Page functionality
//======================================
const isHomePage = document.querySelector('.home-page') != undefined ? true : false;
const isWorkPage = document.querySelector('.work-page') != undefined ? true : false;
const isResumePage = document.querySelector('.resume-page') != undefined ? true : false;

let tabs = document.querySelectorAll('[role="tab"]');
let tabPanels = document.querySelectorAll('[role="tabpanel"]');

// Home page - load all work items
if(isHomePage) {
  loadWorkItems(undefined, 8, 1);

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
          activateTab(selectedTab);
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
function loadWorkItems(category = undefined, count = undefined, offset = undefined, target = undefined, focus = false) {
  if(target != undefined) {
    target.innerHTML = '';
  } else {
    document.querySelector('.tiles').innerHTML = '';
  }

  // Load new items using hash
  let itemStream;
  itemStream = load(category, count, offset);

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
      <div class="title">
        <h2>
          <span>
            <b>${data.title}</b>
            <small>(${data.year})</small>
          </span>
        </h2>
      </div>

      <img
        srcset="${data.image_small} 296w,
                ${data.image_medium} 444w,
                ${data.image_large} 888w"
        sizes="(max-width: 768px) 296px,
               (max-width: 1023px) 444px,
               888px"
        src="${data.image_large}"
        alt=""
      >
    </a>
  `;
}

function activateTab(tab) {
  let category = tab.innerText.toLowerCase();

  // Deactivate any active tab
  tabs.forEach(function(tab) {
    tab.setAttribute('aria-selected', false);
    tab.classList.remove('is-highlighted');
  });

  // Hide all tabpanels
  tabPanels.forEach(function(tabPanel) {
    tabPanel.classList.remove('is-active');
  });

  // Activate the provided tab
  tab.setAttribute('aria-selected', true);
  tab.classList.add('is-highlighted');

  // Show the tab panel for this tab
  let tabpanel = document.getElementById(tab.getAttribute('aria-controls'));
  tabpanel.classList.add('is-active');

  // Load initial work items for whichever category is selected on load
  loadWorkItems(
    category === 'all' ? undefined : category,
    undefined,
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

function load(category = undefined, count = undefined, offset = undefined) {
  return fetch('/wp-content/themes/jasonwebb.io-theme/php/getItems.php', {
    method: 'POST',
    body: JSON.stringify({
      category: category,
      count: count,
      offset: offset
    })
  })
    .then(response => {
      if (response.ok) {
        return Promise.resolve(response);
      } else {
        return Promise.reject(new Error('Failed to load'));
      }
    })
    .then(response => response.json())
    .then(data => {
      return data;
    })
    .catch(function (error) {
      console.log(`Error: ${error.message}`);
    });
  }