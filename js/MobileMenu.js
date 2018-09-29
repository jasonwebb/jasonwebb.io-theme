/*
========================================================================================
  Mobile Menu

  The Mobile Menu component 

  TODO:
========================================================================================
*/

class MobileMenu {
  constructor() {
    this.menu = document.querySelector('#mobile-menu')
    this.icon = document.querySelector('.js-open-mobile-menu');
    this.container = document.querySelector('body > .container');
    this.content = document.querySelector('body > .container > .columns > .content');
    this.keyHandler;

    this.opened = false;

    // Attach click listener to icon to invoke toggle()
    this.icon.addEventListener('click', () => {
      this.toggle();
    });
  }

  // Open the mobile menu
  open() {
    this.container.classList.add('has-open-mobile-menu');
    this.content.classList.add('is-inactive');
    this.menu.classList.add('is-active');
    this.icon.classList.add('is-active');

    // Change the hamburger to an 'X'
    this.icon.querySelector('.fa').classList.remove('fa-bars');
    this.icon.querySelector('.fa').classList.add('fa-times');

    // Manipulate ARIA
    this.menu.setAttribute('aria-expanded', 'true');

    // Attach keyUp listener for Esc to invoke close()
    document.addEventListener('keyup', this.keyHandler = (e) => {
      if(e.key == 'Escape') {
        this.close();
      }
    });

    // Capture current keyboard focus location

    // Force keyboard focus to first element in mobile menu
    this.menu.querySelector('.primary-pages > li:first-of-type > a').focus();

    this.opened = true;
  }

  // Close the mobile menu
  close() {
    this.container.classList.remove('has-open-mobile-menu');
    this.content.classList.remove('is-inactive');
    this.menu.classList.remove('is-active');
    this.icon.classList.remove('is-active');

    // Change the 'X' icon back to a hamburger
    this.icon.querySelector('.fa').classList.add('fa-bars');
    this.icon.querySelector('.fa').classList.remove('fa-times');

    // Manipulate ARIA
    this.menu.setAttribute('aria-expanded', 'true');

    // Detach the key listener
    document.removeEventListener('keyup', this.keyHandler);

    // Return keyboard focus to previous element

    this.opened = false;
  }

  // Alternate state of mobile menu
  toggle() {
    if(this.opened) {
      this.close();
    } else {
      this.open();
    }
  }
}

module.exports = MobileMenu;