/*
========================================================================================
  Search

  The Search component is a collapsible input box that lets users search the site.
  It is actuated by clicking on the magnifying glass icon, which exists under the 
  sidebar menu in the desktop view, and at the top of the site on mobile devices.

  TODO:
  - Figure out how to globally manage keyboard focus so it can be returned to last
    active element.
========================================================================================
*/

class Search {
  constructor(element) {
    this.element = element;
    this.icon = this.element.querySelector('.icon .fa');
    this.input = this.element.querySelector('.input');
    this.keyHandler;
    this.blurHandler;
    this.previousActiveElement;

    this.opened = false;

    // Attach listener for click on .icon
    this.icon.addEventListener("click", () => {
      this.toggle();
    });
  }

  // Open up the search component
  show() {
    // Switch icon to 'X'
    this.icon.classList.remove('fa-search');
    this.icon.classList.add('fa-times');

    // Expand the component using the CSS class
    this.element.classList.add('is-active');

    // Capture the last element to have keyboard focus

    // Force keyboard focus on to input
    this.input.focus();

    // Attach listener for Esc key to invoke hide()
    document.addEventListener('keyup', this.keyHandler = (e) => {
      if(e.key == 'Escape') {
        this.hide();
      }
    });

    // Attach listener for blur on input to invoke hide()
    this.input.addEventListener('blur', this.blurHandler = () => {
      this.hide();
    });

    // Manipulate ARIA?

    this.opened = true;
  }

  // Close the search component
  hide() {
    // Switch icon to magnifier glass
    this.icon.classList.remove('fa-times');
    this.icon.classList.add('fa-search');

    // Collapse the component using CSS
    this.element.classList.remove('is-active');

    // Destroy listener for Esc key
    if(this.keyHandler != undefined) {
      document.removeEventListener('keyup', this.keyHandler);
    }

    // Destroy listener for blur
    if(this.blurHandler != undefined) {
      this.input.removeEventListener('blur', this.blurHandler);
    }

    // Move keyboard focus back to where it was
    // Manipulate ARIA?

    this.opened = false;
  }

  toggle() {
    if(this.opened) {
      this.hide();
    } else {
      this.show();
    }
  }
}

module.exports = Search;