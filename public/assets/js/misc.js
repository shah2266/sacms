(function($) {
  'use strict';
  $(function() {
    var body = $('body');
    var contentWrapper = $('.content-wrapper');
    var scroller = $('.container-scroller');
    var footer = $('.footer');
    var sidebar = $('.sidebar');

    //Add active class to nav-link based on url dynamically
    //Active class can be hard coded directly in html file also as required

    function addActiveClass(element) {
      if (current === "") {
        //for root url
        if (element.attr('href').indexOf("index.html") !== -1) {
          element.parents('.nav-item').last().addClass('active');
          if (element.parents('.sub-menu').length) {
            element.closest('.collapse').addClass('show');
            element.addClass('active');
          }
        }
      } else {
        //for other url
        if (element.attr('href').indexOf(current) !== -1) {
          element.parents('.nav-item').last().addClass('active');
          if (element.parents('.sub-menu').length) {
            element.closest('.collapse').addClass('show');
            element.addClass('active');
          }
          if (element.parents('.submenu-item').length) {
            element.addClass('active');
          }
        }
      }
    }

    var current = location.pathname.split("/").slice(-1)[0].replace(/^\/|\/$/g, '');
    // $('.nav li a', sidebar).each(function() {
    //   var $this = $(this);
    //   addActiveClass($this);
    // })
    //
    // $('.horizontal-menu .nav li a').each(function() {
    //   var $this = $(this);
    //   addActiveClass($this);
    // })

    //Close other submenu in sidebar on opening any

    sidebar.on('show.bs.collapse', '.collapse', function() {
      sidebar.find('.collapse.show').collapse('hide');
    });


    //Change sidebar and content-wrapper height
    applyStyles();

    function applyStyles() {
      //Applying perfect scrollbar
      if (!body.hasClass("rtl")) {
        if ($('.settings-panel .tab-content .tab-pane.scroll-wrapper').length) {
          const settingsPanelScroll = new PerfectScrollbar('.settings-panel .tab-content .tab-pane.scroll-wrapper');
        }
        if ($('.chats').length) {
          const chatsScroll = new PerfectScrollbar('.chats');
        }
        if (body.hasClass("sidebar-fixed")) {
          var fixedSidebarScroll = new PerfectScrollbar('#sidebar .nav');
        }
      }
    }

    $('[data-toggle="minimize"]').on("click", function() {
      if ((body.hasClass('sidebar-toggle-display')) || (body.hasClass('sidebar-absolute'))) {
        body.toggleClass('sidebar-hidden');
      } else {
        body.toggleClass('sidebar-icon-only');
      }
    });

    //checkbox and radios
    $(".form-check label,.form-radio label").append('<i class="input-helper"></i>');

    //fullscreen
    $("#fullscreen-button").on("click", function toggleFullScreen() {
      if ((document.fullScreenElement !== undefined && document.fullScreenElement === null) || (document.msFullscreenElement !== undefined && document.msFullscreenElement === null) || (document.mozFullScreen !== undefined && !document.mozFullScreen) || (document.webkitIsFullScreen !== undefined && !document.webkitIsFullScreen)) {
        if (document.documentElement.requestFullScreen) {
          document.documentElement.requestFullScreen();
        } else if (document.documentElement.mozRequestFullScreen) {
          document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullScreen) {
          document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        } else if (document.documentElement.msRequestFullscreen) {
          document.documentElement.msRequestFullscreen();
        }
      } else {
        if (document.cancelFullScreen) {
          document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
          document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
          document.webkitCancelFullScreen();
        } else if (document.msExitFullscreen) {
          document.msExitFullscreen();
        }
      }
    })

      $('.date1, .date2').datepicker({
          clearBtn: true,
          autoclose: true,
          format: 'dd-M-yyyy',
          daysOfWeekHighlighted: "5,6"
      });

      $('.multi_date').datepicker({
          clearBtn: true,
          multidate: true,
          format: 'dd-M-yyyy',
          daysOfWeekHighlighted: "5,6"
      });

      // Auto Message Hide
      window.setTimeout(function () {
          $(".alert").fadeTo(500, 0).slideUp(500, function () {
              $(this).remove();
          });
      }, 10000);

      document.getElementById('reloadPage').addEventListener('click', function() {
          // Reload the page when the button is clicked
          location.reload();
      });


    //Confirmation delete model
    $('#deleteModal').on('show.bs.modal', function (event) {
      const link = $(event.relatedTarget); // Get the clicked link
      const prefix = link.data('prefix');  // Get the URL prefix (e.g., 'admin/site-options')
      const entity = link.data('entity');  // Get the entity type (e.g., 'company', 'project')
      const entityId = link.data('entity-id');  // Get the entity ID

      // action url
      const actionUrl = `/${prefix}/${entity}/${entityId}`;
      $(this).find('#delete-form').attr('action', actionUrl);

      // Dynamically update the modal body text
      const modalBody = `Are you sure you want to delete the ${entity} with ID ${entityId}?`;
      $(this).find('#deleteModalBody').html(modalBody);
    });

  });
})(jQuery);
