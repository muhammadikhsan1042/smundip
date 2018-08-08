$(document).ready(function() {

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
