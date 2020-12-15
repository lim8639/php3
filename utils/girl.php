
<script src="https://cdn.jsdelivr.net/npm/jquery@1.12.4/dist/jquery.min.js"></script>
<!-- 加载 Bootstrap 的所有 JavaScript 插件。你也可以根据需要只加载单个插件。 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js"></script>
<div id="page_end_html">
    <script src="https://cdn.jsdelivr.net/npm/live2d-widget@3.1.4/lib/L2Dwidget.min.js"></script>
    <script>
        L2Dwidget.init({
            "model": {
                //jsonpath控制显示模型，
                jsonPath: "https://cdn.jsdelivr.net/npm/live2d-widget-model-koharu@1.0.5/assets/koharu.model.json",
                "scale": 1
            },

            "display": {
                "position": "left", //看板娘的表现位置
                "width": 150, //小萝莉的宽度
                "height": 300, //小萝莉的高度
                "hOffset": 0,
                "vOffset": -20,
                "superSample": 2
            },
            "mobile": {
                "show": true,
                "scale": 0.5
            },
            "react": {
                "opacityDefault": 1.0,
                "opacityOnHover": 1.0,
            }
        });
    </script>
</div>
<div id="live2d-widget" class="live2d-widget-container" style="position: fixed;left: 0px;bottom: -40px;width: 152px;height: 300px;z-index: 99999;opacity: 1;pointer-events: none;">
    <canvas id="live2dcanvas" width="300" height="600" style="position: absolute; left: 0px; top: 0px; width: 150px; height: 300px;">
        hello world
    </canvas>
</div>