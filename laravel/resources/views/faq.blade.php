@extends('layouts.master')

@section('content')
  <div class="container">
   <div class="panel-group" id="accordion">
     <div class="panel panel-default" id="faqtitle1">
       <div class="panel-heading">
         <h4 class="panel-title">
           <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
           1 - O que é a Livraria Global?</a>
         </h4>
       </div>
       <div id="collapse1" class="panel-collapse collapse in">
        <div class="panel-body">A Livraria Global, como explicita o nome, é dedicada
          ao mercado editorial, com foco exclusivamente, nos livros. Nosso papel é
          oferecer o que há de melhor e mais exclusivo em se tratando de livros e ebooks.
        </div>
       </div>
     </div>
     <div class="panel panel-default">
      <div class="panel-heading">
       <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
        2 - Quando surgiu a Livraria Global?</a>
       </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
       <div class="panel-body">A Livraria Global surge em 2018, justamente
         no momento em que o mercado editorial passa por uma grande dificuldade
         por causa da crise. Nós acreditamos no Brasil e no potencial do
         crescimento cultural do nosso país.
       </div>
      </div>
     </div>
     <div class="panel panel-default">
      <div class="panel-heading">
       <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
        3 - Como funciona o serviço de entrega da Livraria Global?</a>
       </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
       <div class="panel-body">Nossa proposta é oferecer a maior facilidade
         para o nosso cliente. Portanto trabalhamos com as maiores e melhores
         plataformas de entrega de produtos do país.
       </div>
      </div>
     </div>
     <div class="panel panel-default">
      <div class="panel-heading">
       <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">
        4 - Quais regiões são atendidas pela Livraria Global?</a>
       </h4>
      </div>
      <div id="collapse4" class="panel-collapse collapse">
       <div class="panel-body">Atendemos todo o país, com vendas online.
       </div>
      </div>
     </div><div class="panel panel-default">
      <div class="panel-heading">
       <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
        5 - O que eu faço se o produto que comprei tem um defeito ou está errado?</a>
       </h4>
      </div>
      <div id="collapse5" class="panel-collapse collapse">
       <div class="panel-body">Respeitamos a legislação brasileira. De acordo com o artigo 26 do CDC,
         quando o defeito é aparente, o prazo para reclamação é de 30 dias para produtos não duráveis
         e 90 dias para os duráveis, contados a partir da data da compra. Se o vício for oculto,
         os prazos são os mesmos, mas começam a valer no momento em que o defeito é detectado pelo
        consumidor.O Código de Defesa do Consumidor (CDC) em seu artigo 49, cita os 7 dias,
          mas trata-se da chamada Lei do Arrependimento, ou seja, apenas para
          devolução, e não para troca. Além disso, essa regra funciona apenas
          para compras fora da loja física, como pela internet ou por telefone
          por exemplo. "Art. 49.
       </div>
      </div>
     </div>
     <div class="panel panel-default">
      <div class="panel-heading">
       <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse6">
        6 - Em caso de devolução, como proceder?</a>
       </h4>
      </div>
      <div id="collapse6" class="panel-collapse collapse">
       <div class="panel-body">
         O cliente deve entrar em contato com a loja, dentro
         prazo estipulado por lei, para que possamos efetuar a troca ou a devolução
         do dinheiro.
       </div>
      </div>
     </div>
     <div class="panel panel-default">
      <div class="panel-heading">
       <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse7">
        7 - Meu pagamento não foi reconhecido pelo sistema, o que fazer?</a>
       </h4>
      </div>
      <div id="collapse7" class="panel-collapse collapse">
       <div class="panel-body">
         Entre em contato com o nosso SAC(Serviço de Atendimento
           ao cliente no 0800 022 22222.
       </div>
      </div>
     </div>
     <div class="panel panel-default">
      <div class="panel-heading">
       <h4 class="panel-title">
        <a data-toggle="collapse" data-parent="#accordion" href="#collapse8">
        8 - Não encontrei resposta para o meu problema!</a>
       </h4>
      </div>
      <div id="collapse8" class="panel-collapse collapse">
       <div class="panel-body"> Entre em contato com o nosso SAC(Serviço de Atendimento
         ao cliente no 0800 022 22222.
       </div>
      </div>
     </div>
    </div>
  </div>
@stop
