function toggleFullscreen() {
    const elem = document.documentElement;
    if (!document.fullscreenElement) {
        if (elem.requestFullscreen) {
            elem.requestFullscreen();
        } else if (elem.mozRequestFullScreen) { // Firefox
            elem.mozRequestFullScreen();
        } else if (elem.webkitRequestFullscreen) { // Chrome, Safari, and Opera
            elem.webkitRequestFullscreen();
        } else if (elem.msRequestFullscreen) { // IE/Edge
            elem.msRequestFullscreen();
        }
    } else {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.mozCancelFullScreen) { // Firefox
            document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) { // Chrome, Safari, and Opera
            document.webkitExitFullscreen();
        } else if (document.msExitFullscreen) { // IE/Edge
            document.msExitFullscreen();
        }
    }
}

function toggleFullscreenIcon() {
    var fullscreen = document.getElementById("fullscreen-icon");
    fullscreen.classList.toggle("fa-expand");
    fullscreen.classList.toggle("fa-compress");
}

function toggleFullwidth() {
    var fullwidthIcon = document.getElementById("fullwidth-icon");
    var ceklayar = document.getElementById("ceklayar");
    fullwidthIcon.classList.toggle("fa-expand-arrows-alt");
    fullwidthIcon.classList.toggle("fa-compress-arrows-alt");
    ceklayar.classList.toggle("container2");
}

