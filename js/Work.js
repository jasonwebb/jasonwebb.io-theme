/*
========================================================================================
  Work

  The Work class controls the behavior of the /work page, loading and unloading
  content (lists of posts) based on the most recently selected page

  TODO:
  - Load a list of posts based on the selected page
========================================================================================
*/

let Carousel = require('./Carousel');

class Work {
  constructor() {
    this.phpFilesLocation = '/wp-content/themes/minimal-for-jasonwebbio/php/work/';
    this.currentPage = 'creative';
    this.previousPage = '';
    this.validPages = this.getValidPages();
    this.tags = document.querySelectorAll('.tag');
    this.workItemsContainer = document.querySelector('.work-page .work-items');

    // Load the default page
    this.load(this.currentPage);

    // Set up click listeners on all valid pages to unload current posts and load new posts
    document.querySelectorAll('.tag').forEach(tag => {
      tag.addEventListener("click", (e) => {
        // Deactivate all other tags
        this.tags.forEach(tag => {
          tag.classList.remove('is-active');
        });
        
        // Identify and load next page
        let page = e.target.hash.substr(1, e.target.hash.length);  // strip the # from the [href] to get page name
        this.load(page);
      })
    });
  }

  // Retrieve and inject the contents of the PHP file associated with the provided page
  load(page) {
    if(page === this.previousPage || !this.validPages.includes(page)) {
      return;
    }

    this.unload();

    this.previousPage = this.currentPage;
    this.currentPage = page;

    // Add .is-active to the right .tag
    document.querySelector('.tag[href="#' + this.currentPage + '"]').classList.add('is-active');

    let nextPosts;
    
    // Retrieve content (JSON) for the requested page
    fetch(this.phpFilesLocation + 'get-work-items.php?page=' + this.currentPage)
      .then(function(response) {
        return response.text();
      }).then(function(text) {
        nextPosts = text;
      });

    // Parse retrieved work items and display on page
    if(nextPosts != undefined && nextPosts.length > 0) {
      for(post of nextPosts) {
        // Display post data via template
        // If there is a carousel, create a Carousel object for it        
      }
    }
  }

  // Remove all posts from the page
  unload() {
    // Fade out current content - one post at a time in "falling bricks" motion
    let posts = document.querySelectorAll('.work-item');

    if(
      posts != undefined && 
      NodeList.prototype.isPrototypeOf(posts) && 
      posts.length > 0
    ) {
      Array.prototype.forEach(posts, post => {
        console.log(post);
      });  
    }
  }

  // Compile a list of all pages based on anchors in the markup
  getValidPages() {
    let links = document.getElementsByClassName('tag');
    let pages = [];

    Array.prototype.forEach.call(links, link => {
      pages.push(link.hash.substr(1, link.hash.length));
    });

    return pages;
  }
}

module.exports = Work;