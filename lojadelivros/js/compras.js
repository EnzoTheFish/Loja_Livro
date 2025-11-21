let carrinho = {};

function adicionarCarrinho(id, nome, preco, estoque) {

    if (!carrinho[id]) {
        carrinho[id] = {
            nome: nome,
            preco: preco,
            quantidade: 1,
            estoque: estoque
        };
    } else {

        if (carrinho[id].quantidade + 1 > estoque) {
            alert("Quantidade solicitada excede o estoque!");
            return;
        }

        carrinho[id].quantidade++;
    }

    atualizarCarrinho();
}

function atualizarCarrinho() {
    let container = document.getElementById("itensCarrinho");
    container.innerHTML = "";
    let total = 0;

    for (let id in carrinho) {
        let item = carrinho[id];

        total += item.preco * item.quantidade;

        container.innerHTML += `
            <div class="item-carrinho">
                <strong>${item.nome}</strong> — R$ ${item.preco.toFixed(2)} <br>
                Quantidade: 
                <button onclick="alterarQuantidade(${id}, -1)">-</button>
                ${item.quantidade}
                <button onclick="alterarQuantidade(${id}, 1)">+</button>
                <br>
            </div>
        `;
    }

    document.getElementById("total").innerText = total.toFixed(2);
}

function alterarQuantidade(id, delta) {
    let item = carrinho[id];

    if (!item) return;

    let novaQtd = item.quantidade + delta;

    if (novaQtd <= 0) {
        delete carrinho[id];
    } else if (novaQtd > item.estoque) {
        alert("Quantidade maior que o estoque disponível!");
        return;
    } else {
        item.quantidade = novaQtd;
    }

    atualizarCarrinho();
}
