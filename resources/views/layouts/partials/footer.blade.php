<footer>
  <p>&copy; 2023 Kanchan Chaudhary. All rights reserved.</p>
</footer>

<!-- Required vendor scripts (Do not remove) -->
<script src="{{ asset('js/frontend/jquery.min.js') }}"></script>
<script src="{{ asset('js/frontend/popper.min.js') }}"></script>
<script src="{{ asset('js/frontend/bootstrap.js') }}"></script>

<!-- Optional Vendor Scripts (Remove the plugin script here and comment initializer script out of index.js if site does not use that feature) -->
<!-- Autosize - resizes textarea inputs as user types -->
<script src="{{ asset('js/frontend/autosize.min.js') }}"></script>
<!-- Flatpickr (calendar/date/time picker UI) -->
<script src="{{ asset('js/frontend/flatpicker.min.js') }}"></script>
<!-- Prism - displays formatted code boxes -->
<script src="{{ asset('js/frontend/prism.js') }}"></script>
<!-- Shopify Draggable - drag, drop and sort items on page -->
<script src="{{ asset('js/frontend/draggable.bundle.legacy.js') }}"></script>
<script src="{{ asset('js/frontend/swap-animation.js') }}"></script>
<!-- Dropzone - drag and drop files onto the page for uploading -->
<script src="{{ asset('js/frontend/dropzone.min.js') }}"></script>
<!-- List.js - filter list elements -->
<script src="{{ asset('js/frontend/list.min.js') }}"></script>
<!-- Required theme scripts (Do not remove) -->
<script src="{{ asset('js/frontend/theme.js') }}"></script>

<!-- This appears in the demo only - demonstrates different layouts -->
<style>
  .layout-switcher {
    position: fixed;
    bottom: 0;
    left: 50%;
    transform: translateX(-50%) translateY(73px);
    color: #fff;
    transition: all .35s ease;
    background: #343a40;
    border-radius: .25rem .25rem 0 0;
    padding: .75rem;
    z-index: 999;
  }

  .layout-switcher:not(:hover) {
    opacity: .95;
  }

  .layout-switcher:not(:focus) {
    cursor: pointer;
  }

  .layout-switcher-head {
    font-size: .75rem;
    font-weight: 600;
    text-transform: uppercase;
  }

  .layout-switcher-head i {
    font-size: 1.25rem;
    transition: all .35s ease;
  }

  .layout-switcher-body {
    transition: all .55s ease;
    opacity: 0;
    padding-top: .75rem;
    transform: translateY(24px);
    text-align: center;
  }

  .layout-switcher:focus {
    opacity: 1;
    outline: none;
    transform: translateX(-50%) translateY(0);
  }

  .layout-switcher:focus .layout-switcher-head i {
    transform: rotateZ(180deg);
    opacity: 0;
  }

  .layout-switcher:focus .layout-switcher-body {
    opacity: 1;
    transform: translateY(0);
  }

  .layout-switcher-option {
    width: 72px;
    padding: .25rem;
    border: 2px solid rgba(255, 255, 255, 0);
    display: inline-block;
    border-radius: 4px;
    transition: all .35s ease;
  }

  .layout-switcher-option.active {
    border-color: #007bff;
  }

  .layout-switcher-icon {
    width: 100%;
    border-radius: 4px;
  }

  .layout-switcher-body:hover .layout-switcher-option:not(:hover) {
    opacity: .5;
    transform: scale(0.9);
  }

  @media all and (max-width: 990px) {
    .layout-switcher {
      min-width: 250px;
    }
  }

  @media all and (max-width: 767px) {
    .layout-switcher {
      display: none;
    }
  }
</style>
