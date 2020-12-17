<div id="car" data-toggle="modal" data-target="#myModal1">
    <div id="num-car">1</div>
    <img src="../asset/src/img2/car.png" alt="">
</div>
<!-- Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">新语购物车</h3>
            </div>
            <div id="car-list" class="modal-body">
                <ul class="car-ul">
                    <li><img src="../admin/images/222.png" alt="商品照片">
                        <span class="ware-name">卡姿兰大眼睛护肤水</span>

                        <label>
                            <input class="car-num" type="number" name="num" value="1">
                        </label>
                        <span class="glyphicon glyphicon-plus" ></span>

                        <button class="btn btn-lg">
                            <span class=" glyphicon glyphicon-trash"></span>
                        </button>
                    </li>

                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" id="delete-all" class="btn btn-warning" data-dismiss="modal">清空购物车</button>
                <button type="button" id="submit" class="btn btn-success">立即结算</button>
            </div>
            <input type="hidden" id="islogin" value="<?php if(empty($_SESSION['username'])){
                echo "0";
            }else{
                echo "1";
            }?>">
            <script>
                $('#car').click(function () {
                    if ($('#islogin')>0){
                        $.ajax({
                            type: "POST",
                            url: "car.php",
                            data: {action:"queryListCar"},
                            dataType: "text",
                            async:true,
                            success: function(data) {
                                alert(data);
                            }
                        });
                    }else {
                        alert("请先登录");
                        $(location).attr('href','../verfication/login.php');
                    }
                });
                $('.decline').click(function () {
                    var $input = $(this).parent('li').children('input');
                    var i = $input.val();
                    if (i>0){
                        i--;
                        $input.attr('value',i);
                    }
                });
                $('.add').click(function () {
                    var $input = $(this).parent('li').children('input');
                    var j = $input.val();
                    j++;
                    $input.attr('value',j);
                });
                $('.cancel-order').click(function () {
                    var order = $(this);
                    order.css('display','none');

                });
            </script>
        </div>
    </div>
</div>