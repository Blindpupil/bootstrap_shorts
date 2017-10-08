/* eslint no-plusplus: ["error", { "allowForLoopAfterthoughts": true }] */
export default (() => {
  const defer = document.getElementsByTagName('img');
  for (let i = 0; i < defer.length; i++) {
    (defer[i].getAttribute('data-src')) &&
      defer[i].setAttribute('src', defer[i].getAttribute('data-src'));
  }
})();
