$(document).on('click', '.addCarrinho', function(e){
    const produto = $(this).attr('produto-data');

    $.ajax({
        url: './produto/controller/addCarrinho.php',
        type: 'POST',
        data: { data: produto },
        success: function() {
            Toastify({
                text: "Produto adicionado no carrinho",
                duration: 3000,
                close: true,
                gravity: "top", // `top` or `bottom`
                position: "right", // `left`, `center` or `right`
                stopOnFocus: true, // Prevents dismissing of toast on hover
                style: {
                  background: "#97fc97",
                  color:"#000000",
                  border: '1px solid green'
                },
              }).showToast();
        }
    })

})