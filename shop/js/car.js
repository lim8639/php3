$(document).on("click", "#car", function () {
     // alert("hello world");
    $.ajax({
        type: "POST",
        url: "car.php",
        data: {action:"queryListCar"},
        dataType: "json",
        async:false,
        success: function(data) {
            $n =  $('#num-car')
            if (data==""){
                $n.html('');
                $n.append(0);
                return false;
            }
            var $i = 0;
            var $ul =  $('#car-ul');
            $ul.html('');
            // console.log(data);
            while (data[$i]){
                var $car = "<li>\n" +
                    "                       <div class=\"row\">\n" +
                    "                           <div class=\"pic col-xs-2 col-sm-2 col-md-2 col-lg-2\">\n" +
                    "                               <img src=\"../admin/"+data[$i].picture+"\" alt=\"\">\n" +
                    "                           </div>\n" +
                    "                           <div class=\"name col-xs-6 col-sm-6 col-md-6 col-lg-6\">\n" +
                    "                              <p>"+data[$i].modityname+"</p>\n" +
                    "                           </div>\n" +
                    "                           <div class=\"name number col-xs-3 col-sm-3 col-md-3 col-lg-3\">\n" +
                    "                               <button class=\"btn btn-xs minus\"><span class=\" glyphicon glyphicon glyphicon-minus\"></span></button>\n" +
                    "                               <label>\n" +
                    "                                   <input type=\"number\" name=\"shopnum\" readonly value=\""+data[$i].shopnum+"\">\n" +
                    "                               </label>\n" +
                    "                               <button class=\"btn btn-xs plus\"><span class=\" glyphicon glyphicon-plus\"></span>\n" +
                    "                               </button>\n" +
                    "                           </div>\n" +
                    "                           <div class=\"dele col-xs-1 col-sm-1 col-md-1 col-lg-1\">\n" +
                    "                               <div class=\"delete-one-car\">\n" +
                    "                                   <button class=\"btn btn-sm deleteOneCar\">\n" +
                    "                                       <span class=\" glyphicon glyphicon-trash\"></span>\n" +
                    "                                   </button>\n" +
                    "                               </div>\n" +
                    "                           </div>\n" +
                    "                       </div>\n" +
                    "                    </li>";
                $i++;
                $ul.append($car);
            }
           // $n =  $('#num-car')
            $n.html('');
            $n.append($i);
        }
    });
    var $input = $(this).parent('li').children('input');
    var i = $input.val();
    if (i>0){
    i--;
    $input.attr('value',i);
}
});
    $(document).on("click", ".minus", function () {
    var nump = $(this).parent('div').children('label').children('input');
    var num =  nump.val();
    if (num>0)
    num--;
    nump.attr('value',num);
});
/**
 * 删除全部数据
 */
$(document).on("click", "#delete-all", function () {
    $n =  $('#num-car');
    if ($n.text()==0){
        alert("当前没有商品");
    }
    $.ajax({
    type: "POST",
    url: "car.php",
    data: {action:"deleteall"},
    dataType: "text",
    async:false,
    success: function(data) {
        var $ul =  $('#car-ul');
        $ul.html('');
        $n.html('');
        $n.append(0);
    }

});
});
    $(document).on("click", "#submit", function () {

});
    $(document).on("click", ".plus", function () {
    var nump = $(this).parent('div').children('label').children('input');
    var num =  nump.val();

    num++;
    nump.attr('value',num);
    });
    $(document).on("click", ".minus", function () {
    var nump = $(this).parent('div').children('label').children('input');
    var num =  nump.val();
    if (num>0)
    num--;
    nump.attr('value',num);
    });

    $('.cancel-order').click(function () {
    var order = $(this);
    order.css('display','none');
});
