

$(function(){


//グローバル変数
var nowModalSyncer = null ;		//現在開かれているモーダルコンテンツ
var modalClassSyncer = "modal-syncer" ;		//モーダルを開くリンクに付けるクラス名

//モーダルのリンクを取得する
var modals = document.getElementsByClassName( modalClassSyncer ) ;

//モーダルウィンドウを出現させるクリックイベント
for(var i=0,l=modals.length; l>i; i++){

	//全てのリンクにタッチイベントを設定する
	modals[i].onclick = function(){

		//ボタンからフォーカスを外す
		this.blur() ;

		//ターゲットとなるコンテンツを確認
		var target = this.getAttribute( "data-target" ) ;

		//ターゲットが存在しなければ終了
		if( typeof( target )=="undefined" || !target || target==null ){
			return false ;
		}

		//コンテンツとなる要素を取得
		nowModalSyncer = document.getElementById( target ) ;

		//ターゲットが存在しなければ終了
		if( nowModalSyncer == null ){
			return false ;
		}

		//キーボード操作などにより、オーバーレイが多重起動するのを防止する
		if( $( "#modal-overlay" )[0] ) return false ;		//新しくモーダルウィンドウを起動しない
		//if($("#modal-overlay")[0]) $("#modal-overlay").remove() ;		//現在のモーダルウィンドウを削除して新しく起動する

		//オーバーレイを出現させる
		$( "body" ).append( '<div id="modal-overlay"></div>' ) ;
		$( "#modal-overlay" ).fadeIn( "fast" ) ;

		//コンテンツをセンタリングする
		centeringModalSyncer() ;

		//コンテンツをフェードインする
		$( nowModalSyncer ).fadeIn( "slow" ) ;

		//[#modal-overlay]、または[#modal-close]をクリックしたら…
		$( "#modal-overlay,#modal-close" ).unbind().click( function() {

			//[#modal-content]と[#modal-overlay]をフェードアウトした後に…
			$( "#" + target + ",#modal-overlay" ).fadeOut( "fast" , function() {

				//[#modal-overlay]を削除する
				$( '#modal-overlay' ).remove() ;

			} ) ;

			//現在のコンテンツ情報を削除
			nowModalSyncer = null ;

		} ) ;

	}

}

	//リサイズされたら、センタリングをする関数[centeringModalSyncer()]を実行する
	$( window ).resize( centeringModalSyncer ) ;

	//センタリングを実行する関数
	function centeringModalSyncer() {

		//モーダルウィンドウが開いてなければ終了
		if( nowModalSyncer == null ) return false ;

		//画面(ウィンドウ)の幅、高さを取得
		var w = $( window ).width() ;
		var h = $( window ).height() ;

		//コンテンツ(#modal-content)の幅、高さを取得
		// jQueryのバージョンによっては、引数[{margin:true}]を指定した時、不具合を起こします。
//		var cw = $( nowModalSyncer ).outerWidth( {margin:true} ) ;
//		var ch = $( nowModalSyncer ).outerHeight( {margin:true} ) ;
		var cw = $( nowModalSyncer ).outerWidth() ;
		var ch = $( nowModalSyncer ).outerHeight() ;

		//センタリングを実行する
		$( nowModalSyncer ).css( {"left": ((w - cw)/2) + "px","top": ((h - ch)/2) + "px"} ) ;

	}

} ) ;

'use strict';
;( function ($) {

    $(document).ready( function () {

        var siteTitle = document.getElementById('siteTitle');
        // var titleTxp = texpectacle(siteTitle, 1.8);
        // titleTxp.setScroll();


        var aboutTitle = document.getElementById('aboutTitle');
        // var aboutTxp = texpectacle(aboutTitle, 1.8);
        // aboutTxp.setScroll();

        var worksTitle = document.getElementById('worksTitle');
        // var worksTxp = texpectacle(worksTitle, 1.8);
        // worksTxp.setScroll();



        var $modalTrigger = $('.modal-trigger');


        var $lightHeight = $('.works-item');



        function heighter () {

            var pArray = [];

            [].forEach.call( $lightHeight, function (e, i, ary) {
                $(e).css({
                    height: 'auto'
                });
            });

            [].forEach.call( $lightHeight, function (e, i, ary) {
                pArray.push($(e).height());
            });

            var height = Math.max.apply(null, pArray);

            [].forEach.call( $lightHeight, function (e, i, ary) {
                $(e).css({
                    height: height
                });
            });



        }

        heighter();


        $modalTrigger.on( 'click', function (e) {
            e.preventDefault();
            var targetId = this.getAttribute('href');
            console.log(targetId);
            $(targetId)
                .css({
                    display: 'block'
                })
                .animate({
                    opacity: 1
                })
                .find('.modal-bg')
                .animate({
                    opacity: 1
                });
        });

        $('.modal').on( 'click', function (e) {
            if (e.target.id) {
                $('#' + e.target.id)
                    .animate({
                        opacity: 0
                    }, 'normal', 'linear', function () {
                        $(this).css({
                            display: 'none'
                        })
                    })
                    .find('.modal-bg')
                    .animate({
                        opacity: 0
                    });
            }
        });


        $(".sm_move").on('click touchstart', function () {
            event.preventDefault();

            var targetId = this.getAttribute('href');
            var distance = $(targetId).offset().top;

            $('html,body').animate({ scrollTop: distance }, 'swing');
            return false;
        });


    });
})(window.jQuery);
