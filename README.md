# CaçaLog

Esse sistema foi desenvolvido como um sistema de logística.


## Primeiros Passos

Para ter acesso à API do Caçalog, é necessário primeiramente requisitar um token de acesso com o pessoal do Caçalog, forncendo nome, cnpj, telefone, email e senha para cadastro no sistema.

## Como utilizar a API

Após ter o token em mãos, é preciso fazer uma requisição POST para o link http://webalunos.cacador.ifsc.edu.br/cacalog/public/api/entregas, passando como parâmetros as seguintes informações:


    "token": "Token gerado",
    "cep": "Cep de destino do produto",
    "numeroCasa": "Numero da casa de destino",
    "id_pedido": "Numero do pedido na sua aplicação",
    "cliente": "Nome do cliente destinatário",
    "qtdProdutos": "Total de quantidade de produtos"


Essa requisição irá retornar todos os dados cadastrados, entre eles o ID da Entrega, que será necessário para fazer o acompanhamento do pedido.

## Acompanhamento do Pedido

Feito isso, o pedido toda vez que for atualizado, ele enviará uma requisição do tipo PATCH para o endereço {seu link Ngrok}/api/vendas/{id_pedido} informando o status da entrega do pedido através do parâmetro 'statusEntrega'. Por exemplo: {"statusEntrega": "Entregue"}




