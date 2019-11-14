var sub_flg = true;
function chkSub(fm) {
	if(sub_flg==false) {
		alert('只今、処理実行中です');
	} else if(sub_flg==true) {
		sub_flg = false;
		simpleSub(fm);
		return true;
	}
	return false;
}
function simpleSub(fm) {
	$('#'+fm).submit();
	return true;
}
function pSub(fm, act, hid, hval) {
	$('#'+fm).prop('action', act);
	hSet(hid, hval);
	return chkSub(fm);
}
function psSub(fm, act, hid, hval) {
	$('#'+fm).prop('action', act);
	hSet(hid, hval);
	return simpleSub(fm);
}
function chgTab(fm, num) {
	if(sub_flg==false) {
		alert('只今、処理実行中です');
	} else if(sub_flg==true) {
		sub_flg = false;
		$('#sbi').val(num);
		$('#'+fm).find("textarea, :text, select").val("").end().find(":checked").prop("checked", false);
		$('#'+fm).submit();
		return true;
	}
	return false;
}
function hSet(hid, hval) {
	$('#'+hid).val(hval);
}
function p_slt(page){
	document.form1["p"].value = page;
	hSet('act', '');
	document.form1.reset();
	document.form1.submit();
}
function cnt_slt(page_max){
	document.form1["page_max"].value = page_max;
	document.form1["p"].value = "";
	hSet('act', '');
	document.form1.submit();
}

function sort_slt(sort){
	document.form1["sort"].value = sort;
	document.form1["p"].value = "";
	hSet('act', '');
	document.form1.submit();
}

// Cookeiセット 引数に Cookieの名前 Cookieの値 設定日数
function setCookie(name, data) {
  var e = new Date();
  e.setTime(e.getTime() + 3600 * 24 * 1000 * 7);
  document.cookie = name +'='+data+'; path=/manage/;  expires=' + e.toUTCString();
}
// Cookie取得 引数に Cookieの名前
function getCookie(name){
  var r = null;
  var c = name + '=';
  var allcookies = document.cookie;
  var position = allcookies.indexOf( c );
  if( position != -1 ){
    var startIndex = position + c.length;
    var endIndex = allcookies.indexOf( ';', startIndex );
    if( endIndex == -1 ){
        endIndex = allcookies.length;
    }
    r = decodeURIComponent(allcookies.substring( startIndex, endIndex ) );
  }
  return r;
}

$(document).ready(function(){
	var wH = $(window).height()-82;
	$('#main-right').css('min-height',wH+'px');

	wH = $(window).height()-50;
	$('#container').css('min-height',wH+'px');

	if($('input[name="bpf[]"]').size()>0) {
		$('input[name="bpf[]"]').on('click', function() {
			var str = "";
			if(!$(this).prop('checked')) {
				var target = $(this).data("gp");
				$("#"+target).prop('checked', false);
				$('#bpf'+$(this).val()).remove();
			} else {
				str  = '<li id="bpf'+$(this).val()+'">';
				str += $(this).data("bpf");
				str += '<input type="hidden" name="bpf[]" value="'+$(this).val()+'">';
				str += '</li>';
				$('#t-bpref').append(str);
			}
		});

		$('input[name="bpfg[]"]').on('click', function() {
			var str = "";
			var cpg = $(this);
			var cpf = cpg.data('prefgroup');
			var obj = $('.'+cpf);

			if(cpg.prop('checked')) {
				var str = "";
				for( var i=1; i<obj.length; i++ ) {
					$('#bpf'+obj.eq(i).val()).remove();
					str += '<li id="bpf'+obj.eq(i).val()+'">';
					str += obj.eq(i).data("bpf");
					str += '<input type="hidden" name="bpf[]" value="'+obj.eq(i).val()+'">';
					str += '</li>';
				}
				$('#t-bpref').append(str);
			} else {
				for( var i=1; i<obj.length; i++ ) {
					var target = obj.eq(i).data("gp");
					$("#"+target).prop('checked', false);
					$('#bpf'+obj.eq(i).val()).remove();
				}
			}
		});
	}

	$('input[name="pf[]"]').on('click', function() {
		var str = "";
		if(!$(this).prop('checked')) {
			var target = $(this).data("gp");
			$("#"+target).prop('checked', false);
			$('#pf'+$(this).val()).remove();
		} else {
			str  = '<li id="pf'+$(this).val()+'">';
			str += $(this).data("pf");
			str += '<input type="hidden" name="pf[]" value="'+$(this).val()+'">';
			str += '</li>';
			$('#t-pref').append(str);
		}
	});

	$('input[name="pfg[]"]').on('click', function() {
		var str = "";
		var cpg = $(this);
		var cpf = cpg.data('prefgroup');
		var obj = $('.'+cpf);

		if(cpg.prop('checked')) {
			var str = "";
			for( var i=1; i<obj.length; i++ ) {
				$('#pf'+obj.eq(i).val()).remove();
				str += '<li id="pf'+obj.eq(i).val()+'">';
				str += obj.eq(i).data("pf");
				str += '<input type="hidden" name="pf[]" value="'+obj.eq(i).val()+'">';
				str += '</li>';
			}
			$('#t-pref').append(str);
		} else {
			for( var i=1; i<obj.length; i++ ) {
				var target = obj.eq(i).data("gp");
				$("#"+target).prop('checked', false);
				$('#pf'+obj.eq(i).val()).remove();
			}
		}
	});

  $('#menuBtn').on('click', function() {
	  if($('#wrapper').hasClass('is-expanded')) {
      setCookie('expanded', '');
    } else {
      setCookie('expanded', 'off');
    }
  });

  function preview() {
    var size = $('.previewSize_item'),
      body = $('#previewBody');

    size.on('click', function() {
      var data = $(this).attr('data-size');
      if (data == 'pc') {
        body.removeClass();
        body.addClass('is-pc');

      } else if (data == 'tablet') {
        body.removeClass();
        body.addClass('is-tablet');
      } else {
        body.removeClass();
        body.addClass('is-mobile');
      }
      size.removeClass('is-active');
      $(this).addClass('is-active');

    });
  }
  preview();

  $(".sideNavi_item").on("click", function() {
    var gp = $(this).data("gp");
    $("." + gp).toggle("slow");
  });

	if($('#interview_name').size()>0 && $('#interview_name_unknown').size()>0) {
	  $("#interview_name_unknown").on("click", function() {
	    $('#interview_name').val('【未定】');
	  });
	}
});
$(window).on('load resize', function(){
	var wH = $(window).height()-82;
	$('#main-right').css('min-height',wH+'px');
});

function setPref() {
}
function searchZip() {
	var zip1,zip2,msg_temp;
	zip1 = document.getElementById('zip1').value;
	zip2 = document.getElementById('zip2').value;
	msg_temp = "type=zip:" + zip1 + ":" + zip2 + ":";
	$.post("/api/getdata", msg_temp, function(str) {
		var addr_ar;
		if(str != ""){
			addr_ar = str.split(":");
			document.getElementById('p').selectedIndex = addr_ar[0];
			document.getElementById(a1).value = addr_ar[1];
			document.getElementById(a2).value = addr_ar[2];
		} else {
			alert("住所がみつかりませんでした。");
		}
	});
}

function getGeo(p,a1,a2,a3) {
	var pre,ad1,ad2,ad3,address;

	pre = $('#'+p+' option:selected').text();
	ad1 = $('#'+a1).val();
	ad2 = $('#'+a2).val();
	ad3 = $('#'+a3).val();

	if(pre!="" && ad1!="" && ad2!="") {
		address = pre + ad1 + ad2 + ad3;
		place = get_gps_from_address(address);
	}
}
function getGeo2(at) {
	var address;

	address = $('#'+at).val();

	if(address!="") {
		place = get_gps_from_address(address);
	}
}
function get_gps_from_address(address) {
  var geocoder = new google.maps.Geocoder();
  //住所から座標を取得する
  geocoder.geocode(
    {
      'address': address,
      'region': 'jp'
    },
    function(results, status) {
      if (status == google.maps.GeocoderStatus.OK) {
      	var lat = results[0].geometry.location.lat();
      	var lng = results[0].geometry.location.lng();
				$('#lat').val(lat);
				$('#lng').val(lng);

				setLatLng(lat, lng);
      }
    }
  );
}
function chgLatLng() {
	var lat = $('#lat').val();
	var lng = $('#lng').val();
	if(lat!="" && lng!="") {
		setLatLng(lat, lng);
	}
}
function setLatLng(lat, lng) {
  var map_area = document.getElementById('maparea');

  // 座標をセット緯度経度をセット
  var map_location = new google.maps.LatLng(lat, lng);
  //マップ表示のオプション
  var map_options = {
						          zoom: 16,//縮尺
						          center: map_location,//地図の中心座標
						          //ここをfalseにすると地図上に人みたいなアイコンとか表示される
						          disableDefaultUI: true,
						          mapTypeId: google.maps.MapTypeId.ROADMAP//地図の種類を指定
						        };

  //マップを表示する
  var map = new google.maps.Map(map_area, map_options);

  //地図上にマーカーを表示させる
  var marker = new google.maps.Marker({
    position: map_location, //マーカーを表示させる座標
    map: map, //マーカーを表示させる地図
		draggable: true	// ドラッグ可能にする
  });

	// マーカーのドロップ（ドラッグ終了）時のイベント
  google.maps.event.addListener(marker, 'dragend', mylistener);
}
function setLatLngStatic(lat, lng) {
  var map_area = document.getElementById('maparea');

  // 座標をセット緯度経度をセット
  var map_location = new google.maps.LatLng(lat, lng);
  //マップ表示のオプション
  var map_options = {
						          zoom: 16,//縮尺
						          center: map_location,//地図の中心座標
						          disableDefaultUI: true,
						          mapTypeId: google.maps.MapTypeId.ROADMAP//地図の種類を指定
						        };

  //マップを表示する
  var map = new google.maps.Map(map_area, map_options);

  //地図上にマーカーを表示させる
  var marker = new google.maps.Marker({
    position: map_location, //マーカーを表示させる座標
    map: map //マーカーを表示させる地図
  });
}

function mylistener(event) {
	var lat = $('#lat').val(event.latLng.lat());
	var lng = $('#lng').val(event.latLng.lng());
}

$(function() {
  block(); // ブロックの選択
  blockSort(); // ブロックの並び替え
  blockExpoBoothBannerSort();  // EXPOブースバナー
  blockExpoBoothTextSort();  // EXPOブーステキスト
  blockExpoCornerBannerSort();  // EXPOコーナーバナー
  blockExpoCornerTextSort();  // EXPOコーナーテキスト
  blockExpoSpecialTextSort();  // EXPO特別テキスト
  blockExpoIntroductionSort();  // EXPO紹介コーナー
  blockDraftMakerSort();  // 求人原稿車両メーカー
  blockSortSimple();  // 単純な並べ替え

  function block() {
    var item = $('.m-blockCard'),
      btn = $('.m-blockCard_btn');

    btn.on('click', function() {
      $(this).closest(item).toggleClass('is-active');
    });
  }

  function blockSort() {
    $('#blockSort').sortable({
      cursor: 'move',
      opacity: 0.7,
      handle: '.m-blockCard_drag, .m-formCard_drag',
      items: '.m-drag',
      update: function(e,ui) {
        if (this === ui.item.parent()[0]) {
          var len = document.sectionEditForm.elements['bid_arr[]'].length;
          var id_str = "";
          for (var i=0; i < len; i++) {
            if (id_str != "") {
              id_str += ",";
            }
            id_str += document.sectionEditForm.elements['bid_arr[]'][i].value;
          }
          data = "id_str="+id_str;
          $.post("/common/data/sort_base.php", data);
        }
      }
    });
  }

  function blockExpoBoothBannerSort() {
    $('#blockExpoBoothBannerSort').sortable({
      cursor: 'move',
      opacity: 0.7,
      handle: '.m-blockCard_drag, .m-formCard_drag',
      items: '.m-drag',
      update: function(e,ui) {
        if (this === ui.item.parent()[0]) {
          var len = document.sectionEditForm.elements['booth_banner_arr[]'].length;
          var id_str = "";
          for (var i=0; i < len; i++) {
            if (id_str != "") {
              id_str += ",";
            }
            id_str += document.sectionEditForm.elements['booth_banner_arr[]'][i].value;
          }
          data = "id_str="+id_str;
          $.post("/common/data/sort_expo_booth_banner.php", data);
        }
      }
    });
  }
  function blockExpoBoothTextSort() {
    $('#blockExpoBoothTextSort').sortable({
      cursor: 'move',
      opacity: 0.7,
      handle: '.m-blockCard_drag, .m-formCard_drag',
      items: '.m-drag',
      update: function(e,ui) {
        if (this === ui.item.parent()[0]) {
          var len = document.sectionEditForm.elements['booth_text_arr[]'].length;
          var id_str = "";
          for (var i=0; i < len; i++) {
            if (id_str != "") {
              id_str += ",";
            }
            id_str += document.sectionEditForm.elements['booth_text_arr[]'][i].value;
          }
          data = "id_str="+id_str;
          $.post("/common/data/sort_expo_booth_text.php", data);
        }
      }
    });
  }

  function blockExpoCornerBannerSort() {
    $('#blockExpoCornerBannerSort').sortable({
      cursor: 'move',
      opacity: 0.7,
      handle: '.m-blockCard_drag, .m-formCard_drag',
      items: '.m-drag',
      update: function(e,ui) {
        if (this === ui.item.parent()[0]) {
          var len = document.sectionEditForm.elements['corner_banner_arr[]'].length;
          var id_str = "";
          for (var i=0; i < len; i++) {
            if (id_str != "") {
              id_str += ",";
            }
            id_str += document.sectionEditForm.elements['corner_banner_arr[]'][i].value;
          }
          data = "id_str="+id_str;
          $.post("/common/data/sort_expo_corner_banner.php", data);
        }
      }
    });
  }
  function blockExpoCornerTextSort() {
    $('#blockExpoCornerTextSort').sortable({
      cursor: 'move',
      opacity: 0.7,
      handle: '.m-blockCard_drag, .m-formCard_drag',
      items: '.m-drag',
      update: function(e,ui) {
        if (this === ui.item.parent()[0]) {
          var len = document.sectionEditForm.elements['corner_text_arr[]'].length;
          var id_str = "";
          for (var i=0; i < len; i++) {
            if (id_str != "") {
              id_str += ",";
            }
            id_str += document.sectionEditForm.elements['corner_text_arr[]'][i].value;
          }
          data = "id_str="+id_str;
          $.post("/common/data/sort_expo_corner_text.php", data);
        }
      }
    });
  }

  function blockExpoSpecialTextSort() {
    $('#blockExpoSpecialTextSort').sortable({
      cursor: 'move',
      opacity: 0.7,
      handle: '.m-blockCard_drag, .m-formCard_drag',
      items: '.m-drag',
      update: function(e,ui) {
        if (this === ui.item.parent()[0]) {
          var len = document.sectionEditForm.elements['special_text_arr[]'].length;
          var id_str = "";
          for (var i=0; i < len; i++) {
            if (id_str != "") {
              id_str += ",";
            }
            id_str += document.sectionEditForm.elements['special_text_arr[]'][i].value;
          }
          data = "id_str="+id_str;
          $.post("/common/data/sort_expo_special_text.php", data);
        }
      }
    });
  }

  function blockExpoIntroductionSort() {
    $('#blockExpoIntroductionSort').sortable({
      cursor: 'move',
      opacity: 0.7,
      handle: '.m-blockCard_drag, .m-formCard_drag',
      items: '.m-drag',
      update: function(e,ui) {
        if (this === ui.item.parent()[0]) {
          var len = document.sectionEditForm.elements['introduction_arr[]'].length;
          var id_str = "";
          for (var i=0; i < len; i++) {
            if (id_str != "") {
              id_str += ",";
            }
            id_str += document.sectionEditForm.elements['introduction_arr[]'][i].value;
          }
          data = "id_str="+id_str;
          $.post("/common/data/sort_expo_introduction.php", data);
        }
      }
    });
  }

  function blockDraftMakerSort() {
    $('.blockDraftMakerSort').sortable();
  }

  function blockSortSimple() {
    $('#blockSortSimple').sortable({
      cursor: 'move',
      opacity: 0.7,
      handle: '.m-blockCard_drag, .m-formCard_drag',
      items: '.m-drag',
      update: function(e,ui) {
        if (this === ui.item.parent()[0]) {
          var len = document.sectionEditForm.elements['bid_arr[]'].length;
          var id_str = "";
          for (var i=0; i < len; i++) {
            if (id_str != "") {
              id_str += ",";
            }
            id_str += document.sectionEditForm.elements['bid_arr[]'][i].value;
          }
        }
      }
    });
  }

  $('#expo_prefecture_id').on('change', function() {
		var pid = $(this).val();
		var data = "pid=" + pid;
		$.post("/common/data/set_expo_pref.php", data, function(str) {
	  	location.reload();
		});
  });
});

function oneWeekAfterDate(y, m, d) {
	var Y1,Y2,M1,M2,D1,D2,leap,feb,mon,err,AFT,dd;
	Y1  = y;
	M1  = m;
	D1  = d;
	AFT = 7;
	err = 0;

	// 日付エラー判定
	if(Y1%4==0) {
		leap = 1;
	}
	if(Y1%100==0) {
		leap = 2;
	}
	if(Y1%400==0) {
		leap = 3;
	}
	if(leap%2==1) {
		feb = 29;
	} else {
		feb = 28;
	}
	if(M1==4 || M1==6 || M1==9 || M1==11) {
		mon = 30;
	} else {
		if(M1==2) {
			mon = feb;
		} else {
			mon = 31;
		}
	}
	if(M1>12) {
		err=1;
	}
	if(M1<1) {
		err=1;
	}
	if(D1>mon) {
		err=1;
	}
	if(D1<1) {
		err=1;
	}
	///演算
	AFT = 7 * 1000 * 60 * 60 * 24;
	M1 = M1 -1;
	dd = new Date(Y1, M1, D1);
	dd.setTime(dd.getTime() + AFT);
	Y2 = dd.getFullYear();
	M2 = ('00' + (dd.getMonth() + 1)).slice( -2 );
	D2 = ('00' + dd.getDate()).slice( -2 );

	if(err==1) {
		return "異常な日付です。確認してください。";
	} else {
		return Y2 + "/" + M2 + "/" + D2;
	}
}