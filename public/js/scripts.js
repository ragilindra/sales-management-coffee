/*!
 * Start Bootstrap - SB Admin v6.0.3 (https://startbootstrap.com/template/sb-admin)
 * Copyright 2013-2021 Start Bootstrap
 * Licensed under MIT (https://github.com/StartBootstrap/startbootstrap-sb-admin/blob/master/LICENSE)
 */
(function ($) {
  'use strict';

  // Add active state to sidbar nav links
  var path = window.location.href; // because the 'href' property of the DOM element is the absolute path
  $('#layoutSidenav_nav .sb-sidenav a.nav-link').each(function () {
    if (this.href === path) {
      $(this).addClass('active');
    }
  });

  // Toggle the side navigation
  $('#sidebarToggle').on('click', function (e) {
    e.preventDefault();
    $('body').toggleClass('sb-sidenav-toggled');
  });
})(jQuery);

var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni'],
    datasets: [
      {
        label: '# of Votes',
        data: [20, 17, 6, 12, 3, 18],
        backgroundColor: ['rgba(54, 162, 235, 0.2)'],
        borderColor: ['rgba(54, 162, 235, 1)'],
        borderWidth: 1,
      },
    ],
  },
  options: {
    scales: {
      yAxes: [
        {
          ticks: {
            beginAtZero: true,
          },
        },
      ],
    },
  },
});
