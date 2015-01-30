<!doctype html>
<html>
<head>
<title>玩！就现在</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="Edge mode" />
<meta http-equiv="Window-Target" content="_top" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<meta name="description" content="" />
<meta name="author" content="joenix" />
<meta name="robots" content="all" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>
<body>

<style type="text/css">
section{
    width: 640px; height: 480px;
    margin: -240px 0 0 -320px;
    left: 50%; top: 50%;
    position: fixed;
    border: 1px solid silver;
    background-image: url("data:image/PEG;base64,/9j/4QAYRXhpZgAASUkqAAgAAAAAAAAAAAAAAP/sABFEdWNreQABAAQAAABkAAD/4QMsaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLwA8P3hwYWNrZXQgYmVnaW49Iu+7vyIgaWQ9Ilc1TTBNcENlaGlIenJlU3pOVGN6a2M5ZCI/PiA8eDp4bXBtZXRhIHhtbG5zOng9ImFkb2JlOm5zOm1ldGEvIiB4OnhtcHRrPSJBZG9iZSBYTVAgQ29yZSA1LjUtYzAxNCA3OS4xNTE0ODEsIDIwMTMvMDMvMTMtMTI6MDk6MTUgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCBDQyAoTWFjaW50b3NoKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo1OUUzNUQwMzYxNzgxMUU0OEYzMUNCMjM0QThEMDQ1OCIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo1OUUzNUQwNDYxNzgxMUU0OEYzMUNCMjM0QThEMDQ1OCI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjU5RTM1RDAxNjE3ODExRTQ4RjMxQ0IyMzRBOEQwNDU4IiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjU5RTM1RDAyNjE3ODExRTQ4RjMxQ0IyMzRBOEQwNDU4Ii8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+/+4ADkFkb2JlAGTAAAAAAf/bAIQAAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQEBAQICAgICAgICAgICAwMDAwMDAwMDAwEBAQEBAQECAQECAgIBAgIDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMDAwMD/8AAEQgACgAKAwERAAIRAQMRAf/EAF4AAAMBAAAAAAAAAAAAAAAAAAAEBgoBAQAAAAAAAAAAAAAAAAAAAAAQAAEDAgMJAAAAAAAAAAAAAAIBAwQAESFBEpJTs9M0dAUGFhEBAAAAAAAAAAAAAAAAAAAAAP/aAAwDAQACEQMRAD8A3nR45+DNZctQcbcBY4jHVTNDNRdRVR0WR0aWVzve2FA59DC3UrYa59Aew9E13QcJ+gjaD//Z");
}

.barrag{
    position: relative;
    overflow: hidden;
}
.barrag i{
    position: absolute;
    white-space: nowrap;
}
</style>

<section></section>

<script type="text/javascript" src="script/jQuery.min.js"></script>
<script type="text/javascript">

$.extend({
    barrage: function( options ){

        // 参数容错
        options = options || {}
        // 宽度
      , options.width = options.width || 640
        // 高度
      , options.height = options.height || 480
        // 弹幕文字
      , options.subs = $.type( options.subs ) == 'array' ? options.subs : []
        // 速度
      , options.speed = options.speed || 3600
        // 是否循环
      , options.loop = $.type( options.loop ) == 'boolean' ? options.loop : ( $.type( options.loop ) == 'number' ? options.loop : 1 )
        // 施法对象
      , options.area = $( options.area )
        // 弹幕屏
      , options.board = $('<div class="barrag"></div>')
        // 启始位置
      , options.start = options.width;

        // 对象
        var it = this;

        // 随机
        it.random = function( start, end ){
            return parseInt( Math.random() * ( end - start ) );
        },

        // 克隆
        it.clone = function( arr ){
            return [].concat( arr );
        },

        // 计时器
        it.time = function( time, callback ){
            !function( out ){
                out(function(){
                    callback(), clearTimeout( out );
                }, time );
            }( setTimeout );
        },

        // 递归
        it.recursive = function( arr, callback ){

            if( arr.length ){

                !function( one ){
                    it.time( one.time || 0, function(){
                        callback( one ), it.recursive( arr, callback );
                    });
                }( arr.shift() );

                return;
            }

            return callback(), arr;
        },

        // 样式
        it.skin = function( stylesheet ){
            options.board.css( stylesheet );
        }({
            width: options.width,
            height: options.height
        }),

        // 截取字长
        it.long = function( sub, mag ){

            var
                type = $.isNumeric( sub ),
                size = Number( $( type ? document.body : sub ).css('font-size').match(/^\d+/) ),
                mag = mag || 1,
                length = type ? sub : sub.text().length;

            return length * size * mag;
        },

        // 销毁
        it.destroy = function( sub ){
            return sub.remove();
        },

        // 运行
        it.run = function( sub ){
            !function( i, text ){
                i
                .text( text )
                .css({
                    top: it.random( 0, options.height - it.long( text.length ) ),
                    left: options.start
                })
                // Maybe: transform: translate3d(0, 0, 0);
                .animate({
                    left: -it.long( text.length )
                }, options.speed, function(){
                    it.destroy( i );
                })
                .appendTo( options.board );
            }( $('<i>'), sub.text );
        },

        // 初始化
        it.init = function( subs ){

            options.board.appendTo( options.area );

            it.recursive( it.clone( subs ), function( sub ){
                sub ? it.run( sub ) : ( options.loop ? it.recursive( it.clone( subs ), arguments.callee ) : undefined );
            });

        };

        // 执行
        it.init( options.subs );
    }
});

$.barrage({
    // 容器
    area: 'section',
    // 弹幕文字
    subs:
        [
            {
                text: '传说中的文字',
                offset: 0, // 未实现
                time: 500,
                type: 'infinite' // 未实现
            },
            {
                text: '前方高能~',
                offset: 0,
                time: 1000,
                type: 'infinite'
            },
            {
                text: '弹幕君, 出现吧!',
                offset: 0,
                time: 200,
                type: 'infinite'
            },
            {
                text: '传说中的文字',
                offset: 0,
                time: 200,
                type: 'infinite'
            },
            {
                text: '前方高能~',
                offset: 0,
                time: 300,
                type: 'infinite'
            },
            {
                text: '弹幕君, 出现吧!',
                offset: 0,
                time: 600,
                type: 'infinite'
            },
            {
                text: '前方高能，高能，高能，高能，高能，高能~',
                offset: 0,
                time: 1000,
                type: 'infinite'
            },
            {
                text: '弹幕君, 出现吧!',
                offset: 0,
                time: 200,
                type: 'infinite'
            },
            {
                text: '撸管娃，撸管娃，LOVE，撸管娃！！！',
                offset: 0,
                time: 200,
                type: 'infinite'
            },
            {
                text: '三根皮带~~~',
                offset: 0,
                time: 300,
                type: 'infinite'
            },
            {
                text: '音浪君, 来袭!',
                offset: 0,
                time: 600,
                type: 'infinite'
            }
        ],
    // 速度
    speed: 5000,
    // 循环 // 未完全实现
    loop: true
});

</script>
</body>
</html>
