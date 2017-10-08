var genre = 'All';
var pageNumber = 1;

// next/prev
// if pageNumber > 1 = > pagenumber - 1 and recall photospage();
$(document).ready(function () {
    var btnGenre = $('.btnGenre');
    for (var i = 0; i < btnGenre.length; i++) {
        $(btnGenre[i]).click(function () {
            genre = $(this).text();
            photosPage();
        })
    }
    photosPage();

    //END
});

function photosPage() {
    $.ajax({
        url: './webApi/getPhotos.php?name=' + genre + '&page=' + pageNumber,
        data: {
            format: 'json'
        },
        error: function () {
            alert('An error has occurred');
        },
        success: function (data) {
            var result = JSON.parse(data);
            $('#photos').empty();
            for (var i = 0; i < result.photos.length; i++) {
                var imgSrc = './photos/' + result.photos[i].name;
                $('#photos').append('<img src="' + imgSrc + '" alt="' + result.photos[i].name + '" class="img">');
            }
            $('#pagesBtn').empty();
            for (var i = 0; i < result.totalNumPages; i++) {
                $('#pagesBtn').append('<button class="paginationBtn">' + (i + 1) + '</button>');
            }
            var allBtn = $('.paginationBtn');
            for (var i = 0; i < allBtn.length; i++) { // if curr. i+1 = pageNumber = > assign to this buttn class Active
                $(allBtn[i]).click(function onClickPage() {
                    pageNumber = $(this).text();
                    photosPage();
                });
            }
        },
        type: 'GET'
    });
}





