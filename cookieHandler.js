let cart_array = [];
// check if a cookie exists
if (getCookie('cart_array') != null) {
  cart_array = JSON.parse(getCookie('cart_array'));
}

// updates the cart counter
function getLen() {
  update(cart_array.length);
}

// set a cookie
function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
  let expires = 'expires=' + d.toUTCString();
  document.cookie = cname + '=' + cvalue + ';' + expires + ';';
}

// get a cookie
function getCookie(cname) {
  let name = cname + '=';
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return '';
}

// add an item and update the cart cookie
function addItem(id) {
  event.preventDefault;

  cart_array.push(id);

  setCookie('cart_array', JSON.stringify(cart_array), 90);

  console.log(cart_array + 'Cookie' + getCookie('cart_array'));

  update(cart_array.length);
}

// remove and item
function removeItem(id) {
  const index = cart_array.indexOf(id);
  if (index > -1) {
    cart_array.splice(index, 1); // 2nd parameter means remove one item only
  }

  setCookie('cart_array', JSON.stringify(cart_array), 90);

  console.log(cart_array + 'Cookie' + getCookie('cart_array'));
}
