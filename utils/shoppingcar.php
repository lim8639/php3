<div id="car" data-toggle="modal" data-target="#myModal1">
    <div id="num-car"></div>
    <img src="../asset/src/img2/car.png" alt="">
</div>
<script>
    $(function () {
        $.ajax({
            type: "POST",
            url: "car.php",
            data: {action:"getcount"},
            dataType: "text",
            async:false,
            success:function (data) {
                var n = $('#num-car');
                n.html('');
                n.append(data);
            }
        })
    })
</script>
<!-- Modal -->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title" id="myModalLabel">新语购物车</h3>
            </div>
            <div id="car-list" class="modal-body">
                <ul id="car-ul" class="car-ul">
<!--                    <li>-->
<!--                       <div class="row">-->
<!--                           <div class="pic col-xs-2 col-sm-2 col-md-2 col-lg-2">-->
<!--                               <img src="../admin/images/222.png" alt="">-->
<!--                           </div>-->
<!--                           <div class="name col-xs-6 col-sm-6 col-md-6 col-lg-6">-->
<!--                              <p>卡姿兰大眼睛护肤水</p>-->
<!--                           </div>-->
<!--                           <div class="name number col-xs-3 col-sm-3 col-md-3 col-lg-3">-->
<!--                               <button class="btn btn-xs minus"><span class=" glyphicon glyphicon glyphicon-minus"></span></button>-->
<!--                               <label>-->
<!--                                   <input type="number" name="shopnum" readonly value="1">-->
<!--                               </label>-->
<!--                               <button class="btn btn-xs plus"><span class=" glyphicon glyphicon-plus"></span>-->
<!--                               </button>-->
<!--                           </div>-->
<!--                           <div class="dele col-xs-1 col-sm-1 col-md-1 col-lg-1">-->
<!--                               <div class="delete-one-car">-->
<!--                                   <button class="btn btn-sm deleteOneCar">-->
<!--                                       <span class=" glyphicon glyphicon-trash"></span>-->
<!--                                   </button>-->
<!--                               </div>-->
<!--                           </div>-->
<!--                       </div>-->
<!--                    </li>-->

     <li>     <div class="name col-xs-6 col-sm-6 col-md-6 col-lg-6">
              <p>您的购物车空空如也</p>
         </div></li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" id="delete-all" class="btn btn-warning" data-dismiss="modal">清空购物车</button>
                <form action="order.php" method="post" style="display:inline-block">
                    <label>
                        <input type="hidden" id="value" name="order" value="">
                    </label>
                    <button type="submit" id="submit" class="btn btn-success">立即结算</button>
                </form>
            </div>
        </div>
    </div>
</div>