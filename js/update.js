$(document).ready(function () {

  // selectのカテゴリーを選択してajax通信を行う
  $('.update').click(function () {
      //var selectedCategory = $(this).val();
      
      $.ajax({
        url: './ajax_handler.php',
        type: 'GET',
        dataType: 'json',
        data: {
            
        }
    }).done(function (data) {
        // 通信成功時、商品一覧を表示させる関数を呼び出す
        displaycomment(data);

    }).fail(function (data) {
        // 通信失敗時
        alert('通信失敗！');
    });
  });

  //商品を表示させる関数
  function displaycomment(data){
      var html_response = '<table class="comment_box">';
          // json形式で受け取った配列を.each()で繰り返し、ul > liリストにする
      $.each(data, function (index, item) {
          html_response += '<tr>';
          html_response += '<th>名前：</th><td>' + item.name + '</td>';
          html_response += '<th>コメント：</th><td>' + item.comment + '</td>';
          html_response += '</tr>';
      });
      html_response += '</table>';
      $('.result').html(html_response); // 取得したHTMLを.resultに反映
  }
  
});