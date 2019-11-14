$(document).ready(function(){
  const del_btn = document.getElementById('del_btn');
  if (del_btn) {
    del_btn.onclick = function(){
    let del_display = document.getElementById('temporary');
    let del_flg = document.getElementById('del_flg');
    del_display.classList.add('not-display');
    del_flg.value = 'delete';
   }
  }
  
   // スライダー並び替え操作
   $('#sortdata').sortable();
   // $('#sortdata').bind('sortstop',function(){
   //   // 番号を設定している要素に対しループ処理
   //   $(this).find('[name="slider_num"]').each(function(idx){
   //     // タグ内に通し番号を設定（idxは0始まりなので+1する）
   //     $(this).html(idx+1);
   //   });
   // });
   
   // var slider_nums = [];
   // slider_elements = document.getElementsByClassName('');
  
  document.getElementById('image1').addEventListener('change', function (e) {
    // 1枚だけ表示する
    var file = e.target.files[0];

    // ファイルのブラウザ上でのURLを取得する
    var blobUrl = window.URL.createObjectURL(file);

    // img要素に表示
    var img = document.getElementById('preview');
    img.src = blobUrl;
  });
  
 
  
  
}); 
