<!DOCTYPE html>

<head>
    <title>TIC TAC </title>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="style-tic.css">
</head>

<body>



<div id="first">
    <div class="main-heading" class="keepctn">
        <div class="btn">START GAME</div>
      
    </div>
</div>


<div id="second">
    <div class="main-heading">
        <div>TIC TAC TOE</div>
        <div id="select">Chance of : <span>Player:1</span></div>
        <div id="start"> Starting TIC TAC TOE    </div>
    </div>
    <div class="main-heading heading-2" id='disc'>
        <div>Choose X or O :</div>
        <span class="select" id="x">X</span><span class="select" id="o">O</span>
    </div>
    <table class="align-center" id="game">
        <tr>
            <td class="place" id="c1" data-index="1" data-value=""></td>
            <td class="place" id="c2" data-index="2" data-value=""></td>
            <td class="place" id="c3" data-index="3" data-value=""></td>
        </tr>
        <tr>
            <td class="place" id="c4" data-index="4" data-value=""></td>
            <td class="place" id="c5" data-index="5" data-value=""></td>
            <td class="place" id="c6" data-index="6" data-value=""></td>
        </tr>
        <tr>
            <td class="place" id="c7" data-index="7" data-value=""></td>
            <td class="place" id="c8" data-index="8" data-value=""></td>
            <td class="place" id="c9" data-index="9" data-value=""></td>
        </tr>
    </table>
    <div id="warn"></div>
</div>
</body>


<script>

    $(document).ready(function(){
        $('#first').css('display','block');
        $('#second').css('display','none');
    });

    $('.btn').click(function(){
        $('#first').css('display','none');
        $('#second').css('display','block');
    });
var now = '1';

var ele_1 = null;
var ele_2 = null;

$(document).ready(function() {
    $('#game').hide();
    $('#start').hide();

});

$('#x').click(function() {

    if (now == '1') {
        ele_1 = 'x';
        ele_2 = 'o';
    } else {
        ele_1 = 'o';
        ele_2 = 'x';
    }


    $('#disc').hide();
    $('#game').show();
    $('#start').show();
    $('#select').hide();

});
$('#o').click(function() {

    if (now == '1') {
        ele_1 = 'o';
        ele_2 = 'x';
    } else {
        ele_1 = 'x';
        ele_2 = 'o';
    }
    $('#disc').hide();
    $('#game').show();
    $('#start').show();
    $('#select').hide();
});


$('#game td').click(function() {

    var index = $(this).data('index');

    var is = $('#c'+index).attr('data-value');

    if(is != '')
    {
        $('#warn').html('CANNOT BE FILLED TWICE!!');
        setTimeout(function(){ $('#warn').html('') }, 1000);
        return;
    }
    if (now == '1') {
        $('#c' + index).html(ele_1);
        $('#c' + index).attr('data-value', ele_1);
    } else {
        $('#c' + index).html(ele_2);
        $('#c' + index).attr('data-value', ele_2);
    }
    check();
    if (now == '1')
        now = '2';
    else
        now = '1';
});


function check() {
    var arr = [];
    for (var x = 1; x <= 9; x++) {
        var e = $('#c' + x).attr('data-value');
        arr.push(e);
    }

    for (var i = 0; i < 9; i += 3) {
        if (arr[i] == arr[i + 1] && arr[i] == arr[i + 2] && arr[i] != '') {
            $('#game').hide();
            $('#start').html('Player ' + now + ' Wins!!');
            return;
        }
    }

    for (var i = 0; i < 3; i++) {
        if (arr[i] == arr[i + 3] && arr[i] == arr[i + 6] && arr[i] != '') {
            $('#game').hide();
            $('#start').html('Player ' + now + ' Wins!!');
            return;
        }
    }

    i = 0;
    d = 4;

    if (arr[i] == arr[i + d] && arr[i + d] == arr[i + 2 * d] && arr[i] != '') {
        $('#game').hide();
        $('#start').html('Player ' + now + ' Wins!!');
        return;
    }

    i = 2;
    d = 2;

    if (arr[i] == arr[i + d] && arr[i + d] == arr[i + 2 * d] && arr[i] != '') {
        $('#game').hide();
        $('#start').html('Player ' + now + ' Wins!!');
        return;
       
    }

    var c = 0;
    for (var i = 0; i < 9; i++) {
        if (arr[i] != '')
            c++;
    }

    if (c == 9)
    {
        $('#start').html('No player Wins!!');
        return;
    }

        

}
</script>