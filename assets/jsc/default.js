var o = false;
function seekvideo() {
	$('.overlayed').hide();
	$('#gif-anim').hide();
	$('#bubbled').hide();
	$('#bubbled-low').hide();
}
var rId = setInterval(function(){
  var tmr   = parseInt($('#video_container').find('video').get(0).currentTime);
  var lt    = parseInt($('#video_container').find('video').get(0).duration);
  if(tmr == (lt - 1)) {
    showanimation();
  }
},500);
function showmsg(msg, t, d) {
  setTimeout(function() {
    $('#'+d).html(msg);
  }, t);
}

function showanimation() {
  $('.overlayed').show('slow');
  $('#gif-anim').show('slow');
  $('#bubbled').show('slow');
  $('#bubbled-low').show('slow');
  $('.listbtn').show();
  $('#bigmenu-top').css('background-color', '#71c2e1');
  $('#bigmenu-top').css('opacity', '0.7');
  clearInterval(rId);
}
    function showmsg(msg, t, d) {
      setTimeout(function() {
        $('#'+d).html(msg);
      }, t);
    }
    $('#gif-wrap').click(function() {
      alert('hello there, how may i help you ?');
    });
function playvid() {
    $('#gif-anim').hide('slow');
    $('#bubbled').hide('slow');
    $('#bubbled-low').hide('slow');
    $('.overlayed').hide();
    $('.liststart').hide();
    showmsg('',0, 'upb');
    $('#video_container').find('video').get(0).load();
    $('#video_container').find('video').get(0).play();
}

$(document).ready(function() {
  $('#btn-starts').click(function() {
    playvid();
  });
  $('#bigmenu-top').click(function() {
    if($(window).width() > 767){
      if(! o) {
        $('.big-menu.desktop-menu').show();
        o = true
      } else {
        $('.big-menu.desktop-menu').hide();
        o = false;
      }
    } else {
      if(! o) {
        $('.big-menu.mobile-menu').show();
        o = true
      } else {
        $('.big-menu.mobile-menu').hide();
        o = false;
      }
    }

  });
	$('#parent_cat').change(function() {
		var valuenya = $('#parent_cat').val();
		var textnya = $('#parent_cat option:selected').text();
		if(valuenya == '03-02') {
		  $('#child_cat').html('<optgroup label="Tambah"><option value="03-02-01" selected>Ke Rekening BCA</option><option value="03-02-02">Ke Rekening Bank Lain - Dalam Negeri</option></optgroup><optgroup label="Lihat/Ubah/Hapus"><option value="03-02-03">Tambah Valas</option><option value="03-02-04">Lihat/Ubah/ Hapus Daftar Transfer</option></optgroup>');
		  location.href='03-02-01.html';
		} else if(valuenya == '03-03') {
		  $('#child_cat').html('<option value="03-03-01" selected>Ke Rekening Sendiri</option><option value="03-03-02">Transfer ke Rekening BCA</option><option value="03-03-03">Transfer ke Rekening Bank Lain</option><option value="03-03-04">Valas ke Bank Lain</option><option value="03-03-05">Otorisasi Rekening Sendiri</option><option value="03-03-06">Otorisasi Rekening BCA</option><option value="03-03-07">Otorisasi Rekening Bank Lain</option><option value="03-03-08">Otorisasi Valas</option><option value="03-03-09">Status Transaksi</option>');
		  location.href='03-03-01.html';
		} else if(valuenya == '05-02') {
		  $('#child_cat').html('<option value="05-02-01">Daftar Pembayaran</option><option value="05-02-02">Daftar Pembayaran â€“ Edit</option>');
		  location.href='05-02-01.html';
		} else if(valuenya == '05-03') {
		  $('#child_cat').html('<option value="05-03-01">Pembayaran Tagihan</option><option value="05-03-02">Otorisasi Transaksi</option><option value="05-03-03">Status Transaksi</option>');
		  location.href='05-03-01.html';
		} else if(valuenya == '04-02') {
		  $('#child_cat').html('<option value="04-02-01">Upload</option><option value="04-02-02">Otorisasi Transaksi</option><option value="04-02-03">Status Transaksi</option>');
		  location.href='04-02-01.html';
		} else if(valuenya == '06-02') {
		  $('#child_cat').html('<option value="06-01-01">Tunai Produk Umum</option><option value="06-01-02">Otorisasi Transaksi</option>');
		  location.href='06-01-01.html';
		} else {
		  $('#child_cat').html('<option value="' + valuenya + '">'+textnya+'</option>');
		  location.href=valuenya + '.html';
		}
	});
	$('#child_cat').change(function() {
		var val = $('#child_cat').val();
		$(this).prop('selected', true);
		location.href=val + '.html';
	});

  $('.mobile-menu .nav-bca li').click(function() {
    var data_id  = $(this).attr("data-id");
    $('.mobile-menu .nav-bca li').removeClass("active");
    $(this).addClass("active");
    if($('.mobile-menu #'+data_id).hasClass('hidden')){
      $('.mobile-menu .child-menu').addClass("hidden");
      $('.mobile-menu #'+data_id).removeClass("hidden");
    } else {
      $('.mobile-menu .child-menu').addClass("hidden");
      $('.mobile-menu #'+data_id).addClass("hidden");
    }
  });

  $('.desktop-menu .nav-bca li').click(function() {
    var data_id  = $(this).attr("data-id");
    $('.desktop-menu .nav-bca li').removeClass("active");
    $(this).addClass("active");
    if($('.desktop-menu #'+data_id).hasClass('hidden')){
      $('.desktop-menu .child-menu').addClass("hidden");
      $('.desktop-menu #'+data_id).removeClass("hidden");
    } else {
      $('.desktop-menu .child-menu').addClass("hidden");
      $('.desktop-menu #'+data_id).addClass("hidden");
    }
  });
});
$(document).ready(function(){
	//$('<meta name="viewport" content="width=1024">').insertAfter("head");
	var meta = document.createElement('meta');
	meta.name = "viewport";
	meta.content = "width=992, initial-scale=0.4, maximum-scale=100";
	document.getElementsByTagName('head')[0].appendChild(meta);
});