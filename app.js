var imie = null;
var start = 0;
var url = './chat.php';
var msg = document.getElementsByClassName('msg');


$(document).ready(function(){
    
    load();

    imie = nick;

    $('form').submit(function(e){
        $.post(url, {
            message: $('#message').val(),
        });
        $('#message').val('');
        return false;
    })
});

function load(){
    $.get(url + '?start=' + start, function(result){
       if(result.select){
           result.select.forEach(item => {
             start = item.id;
             $('#messages').append(renderMessage(item)); 
           });

           $('#messages').animate({scrollTop: $('#messages')[0].scrollHeight});
       } 
       load();
    })
}

function renderMessage(item){
    
    let time = new Date(item.data);
    let data = `${time.getDate() < 10 ? '0' : ''}${time.getDate()}.${time.getMonth()+1 < 10 ? '0' : ''}${time.getMonth()+1}.${time.getFullYear()}`;  
    let today = new Date();

    if(time.setHours(0,0,0,0) == today.setHours(0,0,0,0))
    {
        time = new Date(item.data);
        time = `${time.getHours()}:${time.getMinutes() < 10 ? '0' : ''}${time.getMinutes()}` 
    }
    else
    {
        time = new Date(item.data);
        time = `${data} \xa0\xa0 ${time.getHours()}:${time.getMinutes() < 10 ? '0' : ''}${time.getMinutes()}` 
    }
    
    return `<p class='name'>${item.imie == imie ? '<b>Ty</b>':item.imie}<span>${time}</span></p><div class="msg">${item.wiadomosc}</div>`;
    
}









