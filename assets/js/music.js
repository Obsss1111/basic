var audio = document.getElementById('audio_player');

function playClick(button) {
    var content = button.parentElement.parentElement.childNodes[1];
    var span = button.childNodes[0].classList; 
    
    audio.src = 'http://basic/assets/musics/'+button.value+'';

    $('#label_play').text($(content).text());
    
    return audio.paused ? play(span) : pause(span);

};

function play(span) {
    audio.play();  
    span.add('glyphicon-pause');
    span.remove('glyphicon-play');
}

function pause(span) {
    audio.pause();
    span.add('glyphicon-play');
    span.remove('glyphicon-pause');
}

function plusClick() {
    
}

function heartClick(buttonHeart) {
    var _music_id = document.getElementById(buttonHeart.id).value;
    var _user_id = document.getElementById('username').value;
    
    $.ajax({
        url: 'index.php',
        type: 'get',
        dataType: 'json',
        data: {r: 'favorite-music/heart-music', music_id_music: _music_id, user_id : _user_id},
        success: function(data) {
            data.music_id_music = _music_id;
            data.user_id = _user_id;
            return data['music_id_music']+' '+data['user_id'];
        }
    });
}

function viewClick() {
    
}

function deleteClick() {
    
}

function albumPlay(album) {
    
}
