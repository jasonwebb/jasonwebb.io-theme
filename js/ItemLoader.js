class ItemLoader {
  constructor() {}

  static load(category = undefined, count = undefined) {
    return fetch('/wp-content/themes/minimal-for-jasonwebbio-v2/php/getItems.php', {
      method: 'POST',
      body: JSON.stringify({
        category: category,
        count: count
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