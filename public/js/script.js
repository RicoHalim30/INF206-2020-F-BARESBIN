$(document).ready(function() {
  $('.sideMenuToggler').on('click', function() {
    $('.wrapper').toggleClass('active');
  });

  var adjustSidebar = function() {
    $('.sidebar').slimScroll({
      height: document.documentElement.clientHeight - $('.navbar').outerHeight()
    });
  };

  adjustSidebar();
  $(window).resize(function() {
    adjustSidebar();
  });
});

  $('.btn-pesan').on('click', function(e){
    // preventDefault();

    $('.pesan-id').val(jQuery(this).data('id'));
    $('.pesan-nama').val(jQuery(this).data('nama'));
    $('.pesan-harga').val(jQuery(this).data('harga'));
    $('.pesan-meja').val(jQuery(this).data('meja'));
    $('.pesan-lantai').val(jQuery(this).data('lantai'));
    $('.pesan-gambar').val(jQuery(this).data('gambar'));
    $('.data-nama').html(jQuery(this).data('nama'));
    $('.data-meja').html(jQuery(this).data('meja'));
    $('.data-lantai').html(jQuery(this).data('lantai'));
    $('.data-harga').html(jQuery(this).data('data_harga') + "/porsi");
    $('.data-gambar').attr("src", "http://localhost:8000/img/"+ jQuery(this).data('gambar'));

  })
