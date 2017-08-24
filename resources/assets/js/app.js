window.$ = window.jQuery = require('jquery');
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

let uploadBtn = document.getElementById("uploadBtn");

if(uploadBtn){
    uploadBtn.onchange = function () {
        document.getElementById("uploadFile").value = this.files[0].name;
    };
}

$('.delete-show').on('click', function(e){
    e.preventDefault();
    let id = $(this).attr('data-id');

    if(confirm('Are you sure you want to delete this show?')){
        $.ajax({
            type : 'DELETE',
            url : '/admin/shows',
            data : {
                id : id
            },
            success : function(res){
                if(res){
                    $(this).parents('.show').slideUp('slow').remove();
                }
            }.bind(this)
        });
    }
});

$('.delete-movie').on('click', function(e){
    e.preventDefault();
    let id = $(this).attr('data-id');

    if(confirm('Are you sure you want to delete this movie?')){
        $.ajax({
            type : 'DELETE',
            url : '/admin/movies',
            data : {
                id : id
            },
            success : function(res){
                if(res){
                    $(this).parents('.movie').slideUp('slow').remove();
                }
            }.bind(this)
        });
    }
});

$('.delete-season').on('click', function(e){
    e.preventDefault();
    let id = $(this).attr('data-id');

    if(confirm('Are you sure you want to delete this season?')){
        $.ajax({
            type : 'DELETE',
            url : '/admin/shows/seasons',
            data : {
                id : id
            },
            success : function(res){
                if(res){
                    $(this).parents('.season').slideUp('slow').remove();
                }
            }.bind(this)
        });
    }
});

$('.delete-episode').on('click', function(e){
    e.preventDefault();
    let id = $(this).attr('data-id');

    if(confirm('Are you sure you want to delete this episode?')){
        $.ajax({
            type : 'DELETE',
            url : '/admin/seasons/episodes',
            data : {
                id : id
            },
            success : function(res){
                if(res){
                    $(this).parents('.episode').slideUp('slow').remove();
                }
            }.bind(this)
        });
    }
});