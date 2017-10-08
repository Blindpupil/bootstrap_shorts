/**
 * @name BootstrapShorts WordPress Parent THeme
 * @description
 * @version 0.1.0
 */

// #==
// Underscores Default
import './underscores/skip-link-focus-fix';
import './underscores/navigation';
import './underscores/customizer';

// #==
// BootstrapShorts Components
import './components/bootstrap';
import './components/image-defer';

/* globals Popover Modal */
const bs = {
  Popover,
  Modal
};

(($, bootstrap) => {
  Object.keys(bootstrap).forEach((plugin) => {
    $[plugin] = bootstrap[plugin];
  });

  $('[data-toggle="popover"]').popover();
})(window.jQuery, bs);
