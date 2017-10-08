$(document).ready(function () {
    $('#photos').show
    var btn = document.getElementsByClassName('btn');
    function onBtnClick(e) {
        $.ajax({
            url: './db/getPhotos.php?name=' + e.target.textContent, // web api
            data: {
                format: 'json'
            },
            error: function () {
                alert('An error has occurred');
            },
            success: function (data) {
                var photos = JSON.parse(data);
                $('#photos').empty();
                for (var i = 0; i < photos.length; i++) {
                    var imgSrc = './photos/' + photos[i].name;
                    $('#photos').append('<img src="' + imgSrc + '" alt="' + photos[i].name +'" class="img">');
                }
            },
            type: 'GET'
        });

    }

    for (var i = 0; i < btn.length; i++) {
        btn[i].addEventListener('click', onBtnClick);
    }

//END
});

