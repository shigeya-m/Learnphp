$(document).ready(function() {
    $('#room_table td').click(function() {
        //縦
        var row = $(this).closest('tr').index();
        //横
        var col = this.cellIndex;
        console.log('Row: ' + row + ', Column: ' + col);
        
        var room_name = $('#room_table')[0].rows[row+1].cells[1].innerHTML;
        if ($(this).hasClass('haspass')) {
        	$('#enter_room_name').val(room_name);
            $('#password_dialog').dialog('open');
        } else {
            document.location.href = "http://localhost/index.php/game/index/" + room_name;
        }
    });
    $('#newroom_dialog').dialog({
        autoOpen: false,
        title: '新規ルーム作成',
        closeOnEscape: false,
        modal: true,
    });
    $('#password_dialog').dialog({
        autoOpen: false,
        title: 'パスワード入力',
        closeOnEscape: false,
        modal: true,
    });
});

function open_newroom_dialog() {
    $('#newroom_dialog').dialog('open');
}