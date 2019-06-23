// Submit form using AJAX
$(function () {

  $('form').on('submit', function (e) {

    e.preventDefault();

    $.ajax({
      type: 'post',
      url: 'controllers/post.php',
      data: $('form').serialize(),
      success: function (html) {
        console.log(html)
        if(html){
          $('#sendmessage').show();
          $('#sendmessage').html(html);
        } else {
          $('#sendmessage').hide();
        }
      }
    });

  });
 

});

// Form Validation
$.validate({
  modules : 'html5'
});

// hide message sent
$('#sendmessage').hide();
//hide portfolio info
$('.p-info').hide();

/* MODAL FUNCTIONALITY : USE ONE MODAL : POPULATE DIFFERENT DATA
--------------------------------------------------------------------- */
$(document).ready(function () {
  $('.hovereffect').on('click', function () {
    let img = $(this).find('img')[0].src; // get img src
    let title = $(this).find('h2')[0].innerHTML; // get img h2
    let pdesc = $(this).find('.p-info')[0].innerText; // get desc
    $('#myModal').on('show.bs.modal', function () {
      $(".showimage").attr("src", img);          
      $('.modal-title').html(title);
      $('.modal-desc').html(pdesc);
      $('.p-small').hide();
    });
    $("#myModal").modal('show'); //This can also be $("#myModal").modal({ show: true });

  });
  
  
  /* signup table functionality */
  $('.filterable .btn-filter').click(function(){
    var $panel = $(this).parents('.filterable'),
      $filters = $panel.find('.filters input'),
      $tbody = $panel.find('.table tbody');
    if ($filters.prop('disabled') == true) {
      $filters.prop('disabled', false);
      $filters.first().focus();
    } else {
      $filters.val('').prop('disabled', true);
      $tbody.find('.no-result').remove();
      $tbody.find('tr').show();
    }
  });

  $('.filterable .filters input').keyup(function(e){
    /* Ignore tab key */
    var code = e.keyCode || e.which;
    if (code == '9') return;
    /* Useful DOM data and selectors */
    var $input = $(this),
      inputContent = $input.val().toLowerCase(),
      $panel = $input.parents('.filterable'),
      column = $panel.find('.filters th').index($input.parents('th')),
      $table = $panel.find('.table'),
      $rows = $table.find('tbody tr');
    /* Dirtiest filter function ever ;) */
    var $filteredRows = $rows.filter(function(){
      var value = $(this).find('td').eq(column).text().toLowerCase();
      return value.indexOf(inputContent) === -1;
    });
    /* Clean previous no-result if exist */
    $table.find('tbody .no-result').remove();
    /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
    $rows.show();
    $filteredRows.hide();
    /* Prepend no-result row if all rows are filtered */
    if ($filteredRows.length === $rows.length) {
      $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
    }
  });
  
});

//on document load run resizeFunc for carousel
$(document).ready(resizeFunc);

//on resize load run resizeFunc for carousel
$(window).resize(resizeFunc);

function resizeFunc(){
  // hide mobile carousel items on desktops
  if ($(window).width() >= 800) {
    $('#myCarousel .mobile').removeClass('carousel-item');
  } else {
    $('#myCarousel .mobile').addClass('carousel-item');
  }
}

// ===== Scroll to Top ==== 
$(window).scroll(function() {
  if ($(this).scrollTop() >= 50) {      // If page is scrolled more than 50px
    $('#return-to-top').fadeIn(200);    // Fade in the arrow
  } else {
    $('#return-to-top').fadeOut(200);   // Else fade out the arrow
  }
});
$('#return-to-top').click(function() {  // When arrow is clicked
  $('body,html').animate({
    scrollTop : 0                       // Scroll to top of body
  }, 500);
});

