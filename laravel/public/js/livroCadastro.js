window.onload = function() {
  let btnSubmit = document.getElementById('cadastro-enviar');
  if(btnSubmit) {
    btnSubmit.addEventListener('click',validarDados);
  }
}

function validarDados() {
  let form = document.getElementById('formCadastro');
  let erros = [];
  if(form) {
      if(form.elements.titulo.value == '' || form.elements.titulo.value.length < 5){
        erros.push('Informe corretamente o titulo');
      }
      if(form.elements.autor.value == '' || form.elements.autor.length < 5)
      {
        erros.push('Informe corretamente o autor');
      }
      if(form.elements.preco.value == '') {
        erros.push('Informe corretamente o preço');
      }
      if(form.elements.QtdEstoque.value == '') {
        erros.push('Informe corretamente a quantidade');
      }
      if(form.elements.edicao.value == '') {
        erros.push('Informe corretamente a edição');
      }

      document.getElementById('divErro').style.display = 'none';
      document.getElementById('listaErro').innerHTML = '';
      if(erros.length > 0) {
        document.getElementById('divErro').style.display = 'block';
        for(let e of erros) {
          let li = document.createElement("li");
          li.innerHTML = e;
          document.getElementById('listaErro').appendChild(li);
        }

        return false;
      }
      else {
        form.submit();
      }

    }
}
