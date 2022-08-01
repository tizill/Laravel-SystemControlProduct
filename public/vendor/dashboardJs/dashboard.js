$('.price_product').mask('0000,00', {reverse: true});
$('.price_product_total').mask('#.##0,00', {reverse: true});
$('.price_sale').mask('0000,00', {reverse: true});

$('.formulario').on('submit', function () {
var confirmado = confirm('Deseja deletar esse produto?, lembre-se que a venda do mesmo sumirar ...');
if (! confirmado) return false; 
});

