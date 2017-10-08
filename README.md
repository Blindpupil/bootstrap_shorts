Description
---
Here are a bunch of useful shortcodes to enable the usage of many bootstrap components in a 
WordPress theme.

I start from a fresh WordPress starter kit courtesy of underscore.me. 
My configuration uses docker, webpack and a few node scrips, but for your installation all
you really need is the [shortcodes directory](src/theme/inc/shortcodes/) and your installation
of Bootstrap 4 in your WordPress environment. You would of course also need to require the files 
in your functions.php. 

Another file that may be important is [custom trims](src/theme/inc/custom/trims.php) which
removes the empty p tags and br's that WordPress WYSIWYG adds by default.  


Shortcodes
---

### Bootstrap Components

- [ ] Alerts
- [ ] Buttons
- [ ] Carousel
- [ ] Content blocks
- [ ] Jumbotron
- [ ] Modal
- [ ] Navs

## Shortcodes

#### Alert shortcode

[shortcode: alert](src/theme/inc/shortcodes/alert.php)

```bash
# Usage
[alert [option] [option attributes]] Content [/alert]

# Options/Attributes
dismissible  # @String - Makes the alert dismissible, providing it a close button.
class        # @String - extend alert styling by declaring additional classes. Default: 'alert-primary'.

# Content
Supports text and HTML content

# Example
[alert dismissible class='alert-success']
  <h4 class="alert-heading">Well done!</h4>
  <p>Aww yeah, you successfully read this important alert message. This example text is going to run a bit longer so that you can see how spacing within an alert works with this kind of content.</p>
  <hr>
  <p class="mb-0">Whenever you need to, be sure to use margin utilities to keep things nice and tidy.</p>
[/alert]
```

#### Button shortcode

[shortcode: button](src/theme/inc/shortcodes/button.php)

```bash
# Usage
[button [option attributes]] Content [/button]

# Options/Attributes
class     # @String - extend button styling by declaring additional classes. Default: 'btn-primary'.

# Content
Supports text and HTML content, but using only text is recommended

# Example
[button class='btn-outline-danger btn-lg'] Click me! [/button]
```

### Carousel shortcode 

[shortcode: carousel](src/theme/inc/shortcodes/carousel.php)

```bash
# Usage
[carousel [option] [option attributes]]
  [carousel-slide [options attributes]] HTML Content [/carousel-slide]
[/carousel]
=======

# carousel Options/Attributes
id         # @String - provide an id for the carousel container.
style      # @String - extend styling even further with inline styles.
indicators # - show line indicators to change between slides and indicate current.
arrows     # - show left and right arrows to change slides.

# carousel-slide Options/Attributes
id         # @String - provide an id for the carousel item.
class      # @String - provide custom class to carousel item. Don't forget to add an 'active' class to your first slide.
style      # @String - extend styling even further with inline styles.
src        # @String - url or path to the img for the slider.
alt        # @String - alt attribute of the slider.
caption    # @String - provide custom class to caption div container. Default: carousel-caption d-md-block.

# Example
[carousel arrows indicators id='myCarousel']
  [carousel-slide class='active' src='https://via.placeholder.com/800x400?text=First+Slide']
    <h3>Cool Caption Title</h3>
    <p>Description of the first slider</p>
  [/carousel-slide]
  [carousel-slide src='https://via.placeholder.com/800x400?text=Second+Slide']
    <h3>Different Caption Title</h3>
    <p>The <strong>Second</strong> slider</p>
  [/carousel-slide]
  [carousel-slide][/carousel-slide]
[/carousel]
```

### Content blocks shortcodes

[shortcode: content blocks](src/theme/inc/shortcodes/bs-content-blocks.php)

```bash
# Usage
[d-block [options attributes]] Content [/d-block]
[container [options attributes]] Content [/container]
[d-flex [options attributes]] Content [/d-flex]
[row [options attributes]] Content [/row]

=======

# Content blocks Options/Attributes
id      # @String - provide an id for the block.
class   # @String - provide custom class to block.
style   # @String - extend styling even further with inline styles.

# Example
[d-flex id='myDisplayFlex' class='my-3' style='color: blue;']
```


#### Jumbotron shortcode

[shortcode: jumbotron](src/theme/inc/shortcodes/indejumbotron.php)

```bash
# Usage
[jumbotron [option] [option attributes]] Content [/jumbotron]

# Option
fluid     # @String - Sets class to fluid: expands 100% width of its container and squares corners.
style     # @String - set any css style you want

# Content
Supports text and HTML content

# Example
<h2>Plain jumbotron with color style</h2>
[jumbotron style='background-color: lightblue;']
<h2>h2: Content here</h2>
<p class="lead">This is a simple hero unit: a jumbotron-style component for calling extra attention to featured content or information. All the content here can be customised with any html or css you want.</p>
<hr class="my-4" />
<h3>h3: It uses utility classes for typography and spacing to space content out within the larger container.</h3>
[/jumbotron]
```

#### Modal shortcode

[shortcode: modal](src/theme/inc/shortcodes/modal.php)

```bash
# Usage
[modal [option attributes]] Content [/modal]

# Options/Attributes
trigger-btn-text    # @String - Sets trigger button content.
trigger-btn-class   # @String - extend trigger button styling by declaring additional classes. Default: 'btn-primary'.
btn-data-target     # @String - Sets id of the data to be shown in the modal. *If there is more than 1 modal per page, this is required.* A different value is required per modal, unless you want different buttons to trigger the same modal.
title-text          # @String - Sets modal content heading.
title-class         # @String - extend heading styling by declaring additional classes. Default (no class) is an <h5> header.
content-class       # @String - extend content block styling by declaring additional classes.

# Content
Supports text and HTML content

# Example
[modal trigger-btn-text='Launch!' trigger-btn-class='btn-secondary' title-text='Good Title' title-class='display-3' content-class='bg-dark text-light']
  <h5>An h5 in the modal</h5>
  This is a <a class="btn btn-secondary" href="#">button</a> and should do nothing.
  <hr/>
  <h5>Tooltips in a modal</h5>
  <a class="tooltip-test" title="Tooltip" href="#">This link</a> and <a class="tooltip-test" title="Tooltip" href="#">that link</a> have tooltips on hover.
[/modal]
```

### Nav shortcode 

[shortcode: nav](src/theme/inc/shortcodes/nav.php)

```bash
# Usage
[nav [options attributes]]

[nav-content-container] 
  [nav-content [options attributes]]
    Content
  [/nav-content]
[/nav-content-container]
=======

# nav Options/Attributes
id       # @String - provide an id for the nav.
class    # @String - extend button styling by declaring additional classes.
anchors  # @JSON String - '{"text":"href", "otherText":"otherHref", etc...}'.
style    # @String - extend styling even further with inline styles.

# nav-content-container Options/Attributes
id       # @String - provide an id for the nav container.
class    # @String - extend button styling by declaring additional classes.
style    # @String - extend styling even further with inline styles.

# nav-content Options/Attributes
id       # @String - This id needs to correspond to the href as declared in nav anchor.
class    # @String - The first one or the one to be shown by default requires 'show active'.
style    # @String - extend styling even further with inline styles.

# Example
[nav id='myTab' class='nav-tabs justify-content-center' anchors='{"Home":"home", "About":"about", "Info":"info"}' ]
[nav-content-container]
 [nav-content id="home" class='fade show active']
  Home tab content
 [/nav-content]
 [nav-content id="about" class='fade']
  About tab content
 [/nav-content]
 [nav-content id="info" class='fade']
  Info tab content
 [/nav-content]
[/nav-content-container]
```
