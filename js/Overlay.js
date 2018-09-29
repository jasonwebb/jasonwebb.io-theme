/*
========================================================================================
  Overlay

  The Overlay component is a full-screen promotional message that is actuated by
  a teaser "pulldown tab" inviting users to click.

  TODO:
========================================================================================
*/

class Overlay {
  constructor() {
    this.overlay = document.querySelector('.overlay');
    this.pulldownTab = document.querySelector('.overlay .pulldown-tab');
    this.closeIcon = document.querySelector('.overlay .icon.close');
    this.sendMessage = document.querySelector('.overlay .send-message');
    this.keyHandler;

    this.opened = false;

    // Open the overlay on click of pulldown tab
    this.pulldownTab.addEventListener('click', () => {
      this.show();
    });

    // Close the overlay on click of the 'X' icon
    this.closeIcon.addEventListener('click', () => {
      this.hide();
    });
  }

  show() {
    this.overlay.classList.add('is-open');

    // Manipulate ARIA
    // Capture current keyboard focus

    // Place keyboard focus onto "send me a message" button
    this.sendMessage.focus();

    // Set up keyUp listener to close overlay on Esc
    document.addEventListener('keyup', this.keyHandler = (e) => {
      if(e.key == 'Escape') {
        this.hide();
      }
    });

    this.opened = true;
  }

  hide() {
    this.overlay.classList.remove('is-open');

    // Manipulate ARIA
    // Return keyboard focus to previous spot

    // Remove keyUp listener for Esc
    document.removeEventListener('keyup', this.keyHandler);
    
    this.opened = false;
  }
}

module.exports = Overlay;