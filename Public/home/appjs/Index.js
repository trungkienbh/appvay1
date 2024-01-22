function getYuegong (str){
	// 重新获取money存储设置其他值
	var money = parseInt(str);
	var benjin=0;
	xianshi();
}
function xianshi () {
    $.each($(".timeBtn"), function(index, val) {
    	var spanval = $("#timeSpanVal_"+index).html();
    	if(spanval == definamonth){
    		$('#'+index+'m').addClass('act').siblings('.timeBtn').removeClass('act');
    	}
    });
	$.each($(".moneyBtn"), function(index, val) {
    	var spanval = $("#money_"+index).html();
    	if(spanval == definamoney){
    		$('#'+index+'money').addClass('act').siblings('.moneyBtn').removeClass('act');
    	}
    });
}

function reset() {
	var money = $('.moneyBtn.act span').html();
	money = new Number(money).toFixed(2);
	var month = parseInt($('.timeBtn.act span').html());
	//var fuwufei = money * feilv_value / 30;
  var fuwufei = money * feilv[month - 1] / 10 / month;
	fuwufei = fuwufei.toFixed(2);
	$('#fuwufei').html(fuwufei);
	var tmpval = feilv[month - 1] * 10 / month;
	tmpval = new Number(tmpval).toFixed(2);
	$("#rixi").html(tmpval);
	var benjin = money / month;
	benjin = benjin.toFixed(2);
	$('#benjin').html('¥' + benjin);
	var yuegong = new Number(benjin) + new Number(fuwufei);
	yuegong = yuegong.toFixed(2);
	$('#yuegong').html(yuegong);
    $('#total').html('¥' + yuegong);
    nowmoney['money'] = money;
    $("#order_money").val(money);
    nowmoney['month'] = month;
    $("#order_month").val(month);
    nowmoney['fuwufei'] = fuwufei;
    nowmoney['benjin'] = benjin;
    nowmoney['yuegong'] = yuegong;
    nowmoney['total'] = parseFloat(benjin) + parseFloat(fuwufei);
}
$(function () {
        SliderSingle1.slider({
            from: MINMONEY,
            to: MAXMONEY,
            step: 1000,
            round: 0,
            dimension: '',
            skin: "round",
            onstatechange: function (a) {
                // console.log(a);
                var t = a.split(';');
                t[1] = parseInt(t[1]).toFixed(2);
               
                getYuegong(t[1]);
                reset();
            },
            callback: function (a) {
                if (num % 2 == 0) {
                    $(".jslider-pointer").css({
                        animation: 'myfirst .5s',
                        '-webkit-animation': 'myfirst .5s'
                    });
                } else {
                    $(".jslider-pointer").css({
                        animation: 'mysecond .5s',
                        '-webkit-animation': 'mysecond .5s'
                    })
                }
                num++
            }
        });
        var flag = null;
  
         
        //借款期限
        $('.timeBtn').click(function () {
            $(this).addClass('act').siblings('.timeBtn').removeClass('act');
            reset()
            return false
        });
		 $('.moneyBtn').click(function () {
            $(this).addClass('act').siblings('.moneyBtn').removeClass('act');
            reset()
            return false
        });
		
        

    	middle33();
	    function middle33(){
	        var h = $('#deowin33').height();
	        var t = -h/2 + "px";
	        $('#deowin33').css('marginTop',t);
	    }
    	$('#winbtn4').click(function(){
        	$('#deowin4').hide();
        	$('#mask3').hide();
        	$('#deowin4 iframe').attr('src',''); 
      	});
    	middle1();
    	function middle1(){
        	var h = $('#deowin4').height();
        	var t = -h/2 + "px";
        	$('#deowin4').css('marginTop',t);
    	}
    	$('#winbtn5').click(function(){
        	$('#deowin5').hide();
        	$('#mask3').hide();
        	$('#deowin5 iframe').attr('src',''); 
    	});
    	middle2();
    	function middle2(){
        	var h = $('#deowin5').height();
        	var t = -h/2 + "px";
        	$('#deowin5').css('marginTop',t);
    	}
    	//提示关闭
        $("#winbtn3").click(function() {
            $('#deowin31').hide();
            $('#mask3').hide();
        });
        middle();
        function middle() {
            var w = $('#deowin3').width();
            var h = w / 0.64;
            $('.deocon11').css('height', h);
            var t = -h / 2 + "px";
            $('#deowin3').css('marginTop', t);
        }
});