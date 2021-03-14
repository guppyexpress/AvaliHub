/**
 * Sets a cookie in the users browser.
 * @param name Name of the cookie.
 * @param value Value of the cookie.
 * @param expire How long the cookie should be valid (in days).
 */
function setCookie(name, value, expire) {
  const d = new Date();
  d.setTime(d.getTime() + (expire * 24 * 60 * 60 * 1000));
  const expires = "expires=" + d.toUTCString();
  document.cookie = name + "=" + value + ";" + expires + ";path=/";
}
