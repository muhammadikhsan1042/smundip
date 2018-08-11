$(document).ready(function() {

  /*===================================================*/
  /*=================== SEARCH MENU ===================*/
  /*===================================================*/

  $('#Pencarian').click(function() {
    $('.hHidden').hide('fast');
    $('.aSearch').show('fast');
    return false;
  });

  $('body').click(function() {
    $('#HMenu1').click(function(event) {
      return false;
    });
    $('.hHidden').show('fast');
    $('.aSearch').hide('fast');
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
