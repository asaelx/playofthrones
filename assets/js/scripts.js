$(function(){

    // Scroll
    var $root = $('html, body');
    $('.scroll').click(function() {
        $root.animate({
            scrollTop: $( $.attr(this, 'href') ).offset().top
        }, 500);
        return false;
    });

    var $body = $('body'),
        $window = $(window),
        $document = $(document);

    var top = $('#top'),
        top_offset = top.offset();

    $document.scroll(function(){
        var $this = $(this)
            scrollTop = $this.scrollTop();

        if(scrollTop > top_offset.top){
            top.addClass('scrolled');
        }else{
            top.removeClass('scrolled');
        }
    });

    // Torrent
    var client = new WebTorrent();

    var video = document.getElementById('video'),
        torrentId = video.getAttribute('data-magnet');

    client.add(torrentId, function (torrent) {
        // Torrents can contain many files. Let's use the .mp4 file
        var file = torrent.files.find(function (file) {
            return file.name.endsWith('.mp4');
        });

        // Display the file by adding it to the DOM.
        // Supports video, audio, image files, and more!
        file.appendTo(video, function(err, elem){
            elem.pause();
            var en_subs = document.createElement('track'),
                es_subs = document.createElement('track');

            en_subs.setAttribute('label', 'English');
            en_subs.setAttribute('kind', 'subtitles');
            en_subs.setAttribute('srclang', 'en');
            en_subs.setAttribute('src', 'subs/subs.en.vtt');

            es_subs.setAttribute('label', 'Español');
            es_subs.setAttribute('kind', 'subtitles');
            es_subs.setAttribute('srclang', 'es');
            es_subs.setAttribute('src', 'subs/subs.es.vtt');
            es_subs.setAttribute('default', true);

            elem.appendChild(en_subs);
            elem.appendChild(es_subs);
        });
    });

    client.on('error', function (err) {
      console.error(err);
    });

    // Countdown
    var countdown = $('#countdown'),
        airstamp = countdown.data('airstamp'),
        now = new Date(),
        next = new Date(airstamp),
        seconds = (next.getTime() - now.getTime()) / 1000;

    var clock = $('.clock').FlipClock(seconds, {
		clockFace: 'DailyCounter',
		countdown: true
	});

    // Modal
    var modal = $('.modal');
    if(modal.length){
        var layer = $('.layer'),
            trigger = $('.trigger-modal');

        function open_modal(id){
            var modal = $('#'+id);
            layer.fadeIn();
            modal.fadeIn();
            if(id == 'video'){
                var player = video.querySelector('video');
                player.play();
            }
        }

        function close_modal(){
            layer.fadeOut();
            modal.fadeOut();
            var player = video.querySelector('video');
            player.pause();
        }

        trigger.click(function(){
            var $this = $(this),
                id = $this.data('modal');
            open_modal(id);
            return false;
        });

        $body.on('click', '.close-modal', function(){
            close_modal();
        });

    }
});
