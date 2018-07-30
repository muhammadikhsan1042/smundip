$(document).ready(function() {

  /*===================================================*/
  /*===================== REDIRECT ====================*/
  /*===================================================*/

  $('#beranda').click(function() {
    location.href = "/";
  });

  $('#berita').click(function() {
    location.href = "/berita";
  });

  $('#agenda').click(function() {
    location.href = "/agenda";
  });

  $('#legislasi').click(function() {
    location.href = "/produk-hukum";
  });

  $('#keanggotaan').click(function() {
    location.href = "/keanggotaan";
  });

  $('#about').click(function() {
    location.href = "/about";
  });

  $('#Line').click(function() {
    window.open('https://line.me/R/ti/p/%40smundip', '_blank');
  });

  $('#Instagram').click(function() {
    window.open('https://www.instagram.com/smundip/?hl=id', '_blank');
  });

  $('#Twitter').click(function() {
    window.open('https://twitter.com/sm_undip', '_blank');
  });

  $('#Email').click(function() {
    window.open('mailto:sm.univdiponegor@gmail.com', '_blank');
  });

  $('#Youtube').click(function() {
    window.open('https://www.youtube.com/channel/UCnVGk5URrspkuVrcCUMmr1g', '_blank');
  });

  /*===================================================*/
  /*=================== SEARCH MENU ===================*/
  /*===================================================*/

  $('body').click(function() {
    $('#HMenu1').click(function(event) {
      return false;
    });
    $('.hHidden').show('fast');
    $('.aSearch').hide('fast');
  });

  $('#Pencarian').click(function() {
    $('.hHidden').hide('fast');
    $('.aSearch').show('fast');
    return false;
  });

  /*===================================================*/
  /*=================== SEARCH MENU ===================*/
  /*===================================================*/

  $(window).scroll(function() {
      if ($(window).scrollTop()>200) {
        $('#HWrap2').addClass('Hfixed');
      }else {
        $('#HWrap2').removeClass('Hfixed');
      }
  });

});
