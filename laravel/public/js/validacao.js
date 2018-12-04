window.onload = function() {
  let btnSubmit = document.getElementById('cadastro-enviar');
  if(btnSubmit) {
    btnSubmit.addEventListener('click',validarDados);
  }

  carregarEstados();
  document.getElementById("estado").onchange=carregarCidades;
}

function validarDados() {
  let form = document.getElementById('formCadastro');
  let erros = [];
  if(form) {
      if(form.elements.name.value == '' || form.elements.name.value.length < 5){
        erros.push('Informe corretamente o nome');
      }
      if(form.elements.sobrenome.value == '' || form.elements.sobrenome.value.length < 5)
      {
        erros.push('Informe corretamente o sobrenome');
      }
      if(form.elements.data_de_nascimento.value == '') {
        erros.push('Informe corretamente a data de nascimento');
      }
      if(form.elements.email.value == '') {
        erros.push('Informe corretamente o e-mail');
      }
      if(form.elements.email.value == '' || form.elements.email.value.length < 10) {
        erros.push('Informe corretamente o e-mail');
      }
      if(form.elements.sexo.value == '') {
        erros.push('Informe corretamente o sexo');
      }
      if(form.elements.password.value == '' || form.elements.password.value.length < 8) {
        erros.push('Informe corretamente a senha');
      }
      if(form.elements.confirmarSenha.value == '' || form.elements.confirmarSenha.value.length < 8) {
        erros.push('Informe corretamente a confirmacao de senha senha');
      }
      if(form.elements.password.value !== form.elements.confirmarSenha.value) {
        erros.push('Senha e confirmação de senha devem ser iguais');
      }
      if(form.elements.cpf.value != '' && !validarCpf(form.elements.cpf.value)) {
        erros.push('CPF incorreto');
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

function validarCpf(num)
{
  var cpf = num.replace('-','').replace('.','');
  if (num.length != 11 || cpf == "00000000000" || cpf == "11111111111" || cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" || cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" || cpf == "88888888888" || cpf == "99999999999")
    return false;
  add = 0;
  for (i=0; i < 9; i ++)
    add += parseInt(cpf.charAt(i)) * (10 - i);
  rev = 11 - (add % 11);
  if (rev == 10 || rev == 11)
    rev = 0;
  if (rev != parseInt(cpf.charAt(9)))
    return false;
  add = 0;
  for (i = 0; i < 10; i ++)
    add += parseInt(cpf.charAt(i)) * (11 - i);
  rev = 11 - (add % 11);
  if (rev == 10 || rev == 11)
    rev = 0;
  if (rev != parseInt(cpf.charAt(10)))
    return false;

  return true;
}
function carregarEstados(){
  $.ajax({
    url:"https://servicodados.ibge.gov.br/api/v1/localidades/estados/",
    type:"GET",
    success:function(data){
      console.log(data);
      let estados=document.getElementById("estado");
      estados.innerHTML='';
      let option = document.createElement("option");
      option.innerHTML="selecione";
      option.value="";
      option.selected=true;
      option.disabled=true;
      estados.appendChild(option);
      for (let estado of data) {
        option=document.createElement("option");
        option.innerHTML=estado.nome;
        option.value=estado.sigla;
        option.setAttribute("idEstado", estado.id)
        estados.appendChild(option);
      }
    },
    error:function(erro){
      console.log(erro)
    }
  })
}
function carregarCidades(){
  let id = this.options[this.selectedIndex].getAttribute("idEstado")
  $.ajax({
    url:"https://servicodados.ibge.gov.br/api/v1/localidades/estados/"+id+"/municipios",
    type:"GET",
    success:function(data){
      console.log(data);
      let cidades=document.getElementById("cidade");
      cidades.innerHTML='';
      let option = document.createElement("option");
      option.innerHTML="selecione";
      option.value="";
      option.selected=true;
      option.disabled=true;
      cidades.appendChild(option);
      for (let cidade of data) {
        option=document.createElement("option");
        option.innerHTML=cidade.nome;
        option.value=cidade.nome;
        cidades.appendChild(option);
      }
    },
    error:function(erro){
      console.log(erro)
    }
  })
}
