var audio;
var src;
var albumTrack;
var isPaused;
var audio = document.getElementById("audio_player");
var src = 'http://basic/assets/musics/';
var count = 0;

window.onload = function () {    
    isPaused = true;
    albumTrack = 0;
}

function playClick(button) {
    var content = $(button.parentElement.parentElement.childNodes[1]).text();
    var span = button.childNodes[0]; 
    setAudioValues(button.value, content);
    toggleBtn(span);
    if (isPaused) {
        audio.play();
        isPaused = false;
    } else {
        audio.pause();
        isPaused = true;
    }

}

function setAudioValues(audioSrc, content) {
    audio.src = src+''+audioSrc;
    $('#label_play').text(content);
}

/**
 * Переключает класс у тега span
 * @param {string} span 
 */
function toggleBtn(span) {
    $(span).toggleClass('oi-media-play oi-media-pause');
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

/**
 * Событие нажатия на кнопку
 * @param {string} album HTML tag
 */
function albumClick(album) {
    $.ajax({
        url: 'index.php',
        dataType: 'json',        
        data: {"r": 'albums/load-music', "album_id": album.id},
        success: function(data) {  
            albumPlay(data);
        },
    });
}

/**
 * Запускает воспроизведение альбома
 * @param {array} list
 */
function albumPlay(album) {     
    var keys = Object.keys(album);
    setAudioValues(album[keys[albumTrack]], keys[albumTrack]);
    audio.play();
    let audioPlay = setInterval(function() {
        let audioTime = Math.round(audio.currentTime);
        let audioLength = Math.round(audio.duration);
        if (audioTime == audioLength && albumTrack < keys.length) {
            albumTrack++;
            switchTrack(albumTrack, album);
        } else if (albumTrack >= keys.length) {
            albumTrack = 0;
            switchTrack(albumTrack, album);
        }
    }, 10);
    if (album.length < 1) {
        clearInterval(audioPlay);
    }
}

/**
 * Переключает трек альбома
 * @param {int} numTrack
 * @param {array} playlist
 */
function switchTrack (numTrack, playlist) {
    var names = Object.keys(playlist);
    var paths = Object.values(playlist);
    setAudioValues(paths[numTrack], names[numTrack]);
    audio.currentTime = 0;
    audio.play();
}
