import SocialShare from './social-share';

/* globals Popover Modal */
window.bs = {
  Popover,
  Modal
};

export default ((window) => {
  const $ = window.jQuery;
  const { Popover, Modal, Tooltip } = window.bs;

  // Attach Bootstrap Plugins
  $.modal   = Modal;
  $.popover = Popover;
  $.tooltip = Tooltip;

  // #==
  // Enable popover's data-api
  $('[data-toggle="popover"]').popover();

  // #==
  // Enable Share Buttons
  if ($('[data-trigger=share]').length > 0) {
    const sharable = window.SocialShare.generateSocialUrls({
      url: window.location.href,
      img: $('meta[property="og:image"]').attr('content'),
      title: $('meta[property="og:title"]').attr('content'),
      desc: $('meta[property="og:description"]').attr('content')
    });

    window.SocialShare.render = opts => {
      let html = '<div class="btn-group btn-group-sm">';

      Array.isArray(opts) && opts.forEach((i) => {
        html += `<a class="dialog btn btn-sm btn-outline-secondary" href="${i.url}"><i class="ion-social-${i.class}"></i></a>`
      });

      html += '</div>';
      return html;
    };

    window.SocialShare.render(sharable)

    $('[data-trigger=share]').popover({
      html: true,
      content: window.SocialShare.render(sharable)
    });

    $('a.dialog').on('click', (e) => {
      e.preventDefault();
      e.stopPropagation();
    });
  }

})(window);
