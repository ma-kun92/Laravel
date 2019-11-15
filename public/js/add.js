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
   
   const slider_ids = document.getElementById('slider_ids');
   let a = new Array();
   const slider_ids_start = document.getElementsByClassName('sliders');
  
   Array.prototype.forEach.call(slider_ids_start, function (element){
    let num = element.value;
    a.push(num);
   });
   console.log(a);
   
   slider_ids.value =a;
   
   
   
  
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
