$(document).on('click', '.remCarrinho', function(e){
    const id = $(this).attr('produto-id');
    // console.log(id);

    $.ajax({
        url: './produto/controller/remCarrinho.php',
        type: 'POST',
        data: { id },
        success: function() {
            window.location.reload();

        }

    })

})