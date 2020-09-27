class ItemLoader {
  constructor() {}

  static load(category = undefined, count = undefined, offset = undefined) {
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
}

module.exports = ItemLoader;