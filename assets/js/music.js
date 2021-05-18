var albumTrack = 0;
var isPaused = true;
var audio = document.getElementById("audio_player");
var src = 'http://basic/assets/musics/';

$(function() {
    $("button[name='play']").on('click', function() {
        loadPlaylist(this);
    });
    $("button[name='heart']").on('click', function(){
        heartClick(this);
    });
    $("button[name='album']").on('click', function(){
        albumClick(this);
    });
});

function loadPlaylist(btn) {
    $.ajax({
        url: 'index.php',
        type: 'get',
        dataType: 'json',
        data: {r: 'music/playlist'},
        success: function(data) {            
            playlistPlay(btn, data);
        }
    });  
}

function playlistPlay(button, playlist) {
    var span = button.childNodes[0]; 
    var path = Object.values(playlist[button.value]);
    var name = Object.keys(playlist[button.value]);

    setAudioValues(path, name); 
    audio.load();
    if (isPaused) {
        toggleBtn(button, span);
        audio.play();
        isPaused = false;
    } else {
        toggleBtn(button, span);
        audio.pause();
        isPaused = true;
    }
    var len = Object.keys(playlist).length;
    var num = button.value;
    let timer = setInterval(function() {
        let audioTime = Math.round(audio.currentTime);
        let audioLength = Math.round(audio.duration);
        if (audioTime == audioLength && num < len) {            
            num++;
            switchTrack(Object.values(playlist[num]), Object.keys(playlist[num]));
        } else if (num >= len) {
            num = 0;
            switchTrack(Object.values(playlist[num]), Object.keys(playlist[num]));
        }        
    }, 10);
    console.log(Object.keys(playlist).length);
//    console.log(Object.keys(playlist[button.value]));
    if (Object.keys(playlist).length < 1) {
        clearInterval(timer);
    }
}

function setAudioValues(audioSrc, content) {
    $('audio').attr("src", src+audioSrc);
    $('#label_play').text(content);
}

/**
 * Переключает класс у тега span
 * @param {string} span 
 */
function toggleBtn(btn, span) {  
    $('span[name="play"].oi-media-pause').toggleClass('oi-media-play oi-media-pause');
    $(span).toggleClass('oi-media-play oi-media-pause');
    
}

function plusClick() {
    
}

function heartClick(heart) {        
    $.ajax({
        url: 'index.php',
        type: 'get',
        dataType: 'json',
        data: {r: 'music/heart', id: heart.value},
        success: function(data) {
            return data;
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
        }
    });
}

/**
 * Запускает воспроизведение альбома
 * @param {array} list
 */
function albumPlay(album) {     
    var keys = Object.keys(album);
    var paths = Object.values(album);
    setAudioValues(paths[albumTrack], keys[albumTrack]);
    audio.play();
    let audioPlay = setInterval(function() {
        let audioTime = Math.round(audio.currentTime);
        let audioLength = Math.round(audio.duration);
        if (audioTime == audioLength && albumTrack < keys.length) {
            albumTrack++;
            switchTrack(paths[albumTrack], keys[albumTrack]);
        } else if (albumTrack >= keys.length) {
            albumTrack = 0;
            switchTrack(paths[albumTrack], keys[albumTrack]);
        }
    }, 10);
    if (keys.length <= 1) {
        clearInterval(audioPlay);
    }
}

/**
 * Переключает трек альбома
 * @param {int} numTrack
 * @param {array} playlist
 */
function switchTrack (path, name) {
    setAudioValues(path, name);
    audio.currentTime = 0;
    audio.play();
}
