$(function () {
  $('.drawer-open').click(function () { //メニューボタンタップ後の処理
    $(this).toggleClass('active'); //クリックした要素に「.active」要素を付与
    $('.gnavi').css('display', 'block');//「.gnavi」要素の非表示を表示する
    if ($(this).hasClass('active')) { //もしクリックした要素に「.active」要素があれば
      $('.gnavi').addClass('active');　 //「.active」要素を付与
    } else {                            //「.active」要素が無ければ
      $('.gnavi').removeClass('active'); //「.active」要素を外す
    }
    return false;
  });
});
