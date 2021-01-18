var audio = document.getElementById('audio_player');

function playClick(buttonPlay) {
    var play_btn = document.getElementById(buttonPlay.id);
    audio.src = 'http://basic/assets/musics/'+play_btn.value+'';
    var parent = play_btn.parentElement.parentElement;
    var _text = parent.childNodes[1];
    $('#label_play').text($(_text).text());

    var playPromise = audio.play();
    if (playPromise !== undefined) { 
        playPromise.then(_ => {
            
        }) 
        .catch(error => {
        // Auto-play was prevented
        // Show paused UI.
        });
    }

}

function pauseClick(player) {
    if (player.play()) {
        player.pause();
    }
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






