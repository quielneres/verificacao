<?php
echo $this->element('flash');
echo $javascript->link('formularios/usuario');
?>

<script language="javascript">
    function abrir_pop(url, name, feature) {
        window.open(url, name, feature);
    }

    function AbreTermo() {
        abrir_pop('../../app/webroot/img/termo.pdf', 'Abre Termo', 'width=700,height=450,top=110,left=120,toolbar=no,menubar=no,status=no,scrollbars=yes,resizable=no')
    }
</script>

<div class="cabecalho">
    <a href="../../">Voltar para o Login</a>
    <center><h3><?php __('Nova Conta'); ?></h3>
        <?php if ($id != 1) { ?>
            <br>
            Esta nova conta será incluída e fará parte da rede de:  <b><?= $nome ?></b>
        <?php } ?>
    </center>
</div>
<div class="cx_listagem">
    <?php //echo $form->create('Usuario',array('type'=>'file', 'class'=>'formulario')); ?>
    <?php echo $ajax->form('add', 'post', array('model' => 'Usuario', 'update' => 'inicial', 'indicator' => 'ajax_load', 'after' => '$("#inicial").empty();', 'class' => 'formulario')); ?>

    <fieldset>
        <legend><?php __('Geral'); ?></legend>
        <?php
        echo $form->hidden('Obrigatorio', array('value' => true));
        echo $form->hidden('usuario_id', array('label' => 'Usuario <font color="red">(*)</font>', 'empty' => '', 'class' => 'tres_colunas', 'value' => $id));
        echo $form->hidden('nome2', array('label' => '', 'value' => $nome));

        echo $form->input('NomeUsuario', array('label' => 'Nome <font color="red">(*)</font>', 'class' => 'tres_colunas'));
        echo $form->input('cpf', array('label' => 'CPF <font color="red">(*)</font>', 'class' => 'tres_colunas'));
        echo $form->input('dataNascimento', array('label' => 'Data nascimento <font color="red">(*)</font>', 'class' => 'tres_colunas'));

        echo $form->input('Sexo', array('label' => 'Sexo <font color="red">(*)</font>', 'class' => 'tres_colunas_select', 'empty' => 'Selecione uma opção', 'options' => array('M' => 'Masculino', 'F' => 'Feminino')));
        echo $form->input('email', array('label' => 'E-mail', 'class' => 'tres_colunas'));
        echo $form->input('telefone', array('label' => 'Telefone', 'class' => 'tres_colunas'));

        echo $form->input('endereco', array('label' => 'endereço', 'class' => 'tres_colunas'));
        echo $form->input('cidade', array('label' => 'cidade', 'class' => 'tres_colunas'));
        echo $form->input('estado', array('label' => 'estado', 'class' => 'tres_colunas_select', 'empty' => 'Selecione...', 'options' => array(
            'ac' => 'Acre',
            'al' => 'Alagoas',
            'am' => 'Amazonas',
            'ap' => 'Amapá',
            'ba' => 'Bahia',
            'ce' => 'Ceará',
            'df' => 'Distrito Federal',
            'es' => 'Espírito Santo',
            'go' => 'Goiás',
            'ma' => 'Maranhão',
            'mt' => 'Mato Grosso',
            'ms' => 'Mato Grosso do Sul',
            'mg' => 'Minas Gerais',
            'pa' => 'Pará',
            'pb' => 'Paraíba',
            'pr' => 'Paraná',
            'pe' => 'Pernambuco',
            'pi' => 'Piauí',
            'rj' => 'Rio de Janeiro',
            'rn' => 'Rio Grande do Norte',
            'ro' => 'Rondônia',
            'rs' => 'Rio Grande do Sul',
            'rr' => 'Roraima',
            'sc' => 'Santa Catarina',
            'se' => 'Sergipe',
            'sp' => 'São Paulo',
            'to' => 'Tocantins'
        )));
        echo $form->input('cep', array('label' => 'cep', 'class' => 'tres_colunas'));

        echo $form->input('username', array('label' => 'Login <font color="red">(*)</font>', 'class' => 'tres_colunas'));
        echo $form->input('senha', array('label' => 'Senha <font color="red">(*)</font>', 'type' => 'password', 'class' => 'tres_colunas'));

        echo $form->input('plano', array('label' => 'Plano <font color="red">(*)</font>', 'class' => 'tres_colunas_select', 'empty' => 'Selecione uma opção',
        'options' => array(
        1 => '1º Plano - R$ 150,00',
         2 => '2º Plano - R$ 225,00',
         3 => '3º Plano - R$ 300,00',
          4 => '4º Plano - R$ 500,00',
           5 => '5º Plano - R$ 1.000,00',
            6 => '6º Plano - R$ 3.000,00',
             7 => '7º Plano - R$ 5.000,00',
              8 => '8º Plano - R$ 10.000,00')));
        //echo $form->hidden('Ativo', array('value'=>2));

        echo $form->input('idade', array('label' => 'Você é maior de Idade? <font color="red">(*)</font>', 'class' => 'tres_colunas_select', 'empty' => 'Não', 'options' => array(1 => 'Sim')));
        echo $form->input('termo', array('label' => 'Você aceita os Termos de Uso? <font color="red">(*)</font>', 'class' => 'tres_colunas_select', 'empty' => 'Não', 'options' => array(1 => 'Sim')));

      echo $form->input('termo1', array('label'=>'Termos de Uso', 'type'=>'textarea', 'class'=>'textarea',
            'value'=>'COMO FUNCIONA A TOOP LIFE AFILIADO?

       A Toop Life Afiliados é um sistema de benefícios e geração de renda para todo o tipo de pessoa. 

A participação é livre e espontânea em formato de ação entre amigos com o objetivo de ajudar a distribuir renda para seus afiliados participantes. O conceito é
bem simples: ao se cadastrar no site como afiliado e realizar o pagamento do seu Plano, você se torna um afiliado participante do Sistema, revenda das cestas do
clube de Benefícios Toop Life e poderá receber bonificações por cada pessoa que você indicar e de acordo com seu Plano (até o 8º nível). Você recebe até do 8º nível,
com indicação direta e indireta, ou seja, você recebe até de quem você não indicou. Não perca tempo! 
  ​​
Formas de ganhos
 Bônus de inicio rápido
 Bônus de rede
 Margem de lucro na revenda dos produtos
 Bônus binário
 Bônus de comissão mensal 
 Bônus fidelidade
 Bônus de Ativação
 Investimento
 Viagens de Incentivo
 Plano de carreira
 Treinamentos e participações em eventos

Exemplo:
Bônus de inicio rápido
 Cada novo Afiliado cadastrado pelo seu link gera 15% de bônus pra você de acordo com o valor investido.  Os Afiliados recebem até R$ 1.500,00 de ganhos por
indicação direta.
Bônus de rede
Gera 3% de bônus pra você de acordo com o valor investido de indicações indiretas até o 8 nível. Os Afiliados recebem até R$ 300,00 de indicação indireta.

Margem de lucro do nosso Clube de Benefícios

Temos 4 cestas de Benefícios:
O seu ganho varia de acordo com o valor da cesta que vender, entre R$ 27,00 a R$ 47,00 por venda (somente a primeira parcela).
Bônus binário
A cada duas pessoas que entrarem na sua rede você terá bônus de R$ 2,00 de Binário.

Bônus de comissão mensal 
Podem receber um valor mensal a partir de R$ 100,00 (cem reais) de acordo com o seu investimento.

Bônus fidelidade
Com o bônus de Fidelidade acumule pontos pelas compras com descontos na internet efetuadas no portal de compras on-line do Clube de Benefícios.
Cada R$ (real) gasto corresponde a 1 (um) ponto no Programa de Fidelidade.
Seus pontos serão ser utilizados na troca por produtos disponibilizados na página do associado.

Bônus de Ativação
Ativação anual, a cada renovação o afiliado é bonificado pelo valor ganho pelo trabalho realizado durante um ano quando toda sua rede se reativar.

Investidor
Temos no nosso escritório virtual a opção de fazer mais investimentos, assim que você se cadastrar e estiver Ativo pode se torna um Investidor com investimentos a
partir de R$ 1.000,00 com ganhos de 20% por mês durante um ano (12 meses) sobre o valor investido.

Viagens de Incentivo (será lançado em breve)
Afiliados que atingirem as metas lançadas ganharam uma viagem com direito a acompanhante.

Plano de carreira (será lançado em breve)
A cada R$500,00 é gerado na sua rede um ponto, no qual são acumulativos e trocados em prêmios (smartphone, moto, carro, casa, entre outros).

Treinamentos e participações em eventos
Treinamentos online e presencial.

 O funcionamento é muito simples​​
      Ao se cadastrar, você escolhe qual o tipo de Plano que deseja que seja o valor total em um único pagamento que você deverá realizar. Não há como pagar um
valor maior ou menor do que o estipulado nos Planos de afiliados da Toop Life, com renovação de uma vez por ano. Os ganhos de rede são de acordo com os níveis
escolhidos.

Exemplo: 

1º Nível de R$150,00 durante um ano você recebe R$30,00 x 12 = R$360,00
2º Nível de R$225,00 durante um ano você recebe R$45,00 x 12= R$540,00
3º Nível de R$300,00 durante um ano você recebe R$60,00 x 12= R$720,00
4º Nível de R$ 500,00 durante um ano você recebe R$100,00 x 12 = R$ 1.200,00
5º Nível de  R$1.000,00 durante um ano recebe R$ 200,00 x 12 = R$ 2.400,00   
6º Nível de R$ 3.000,00 durante um ano recebe R$ 600,00 x 12 = R$ 7.200,00
7º Nível de  R$ 5.000,00 durante um ano recebe R$ 1.000,00 x 12 = R$ 12.000,00
8 º Nível de   R$ 10.000,00 durante um ano recebe R$ 2.000,00 x 12 = R$ 24.000,00​

Obs: é cobrado no boleto bancário taxa do cartão R$18,00 mais a primeira mensalidade de R$27,00. O restante será debitado no seu escritório virtual como
ativo mensal.

Como funciona

          Após fazer o pagamento, você acessará seu escritório virtual em nosso site utilizando login e senha cadastrado e enviará o comprovante de pagamento que foi
realizado. Após isto, o sistema irá confirma o valor. Assim que confirmado, você já estará ativo e poderá entrar no seu escritório contendo um link (endereço virtual)
para a divulgação de cadastro. A partir daí o seu trabalho já poderá ser iniciado. Cresça sua rede através do seu link, assim que um cadastro já estiver ativo você
receberá uma bonificação de até R$ 1.500,00 por pessoa.
        Quanto mais pessoas forem indicadas mais irá ganhar! Além disso, o número de pessoas que você indicar pelo seu link é ilimitado adicione quantas pessoas
quiser e quando quiser. Quanto mais adicionar, mais você receberá!

Ativo Mensal
    Todos os Afiliados receberão o nosso cartão para solicitar saque, (Não fazemos deposito em outro Banco). Valor do ativo mensal R$ 27,00 e será debitado do seu
escritório virtual.

Em quanto tempo minha conta fica ativa após o pagamento?
           Fazendo seu cadastro, sua posição já fica reservada. Depois de fazer seu respectivo pagamento e o envio do comprovante leva até 72 horas para ativar. Mas
não se preocupe, pois se você realmente efetuou o pagamento do boleto seu ingresso é certo.'));

        ?>

         <div class='duas_colunas'>
<!--            --><?php
//            echo $form->input('termo',
//                array(
//                    'label'=>false,
//                    'type'=>'checkbox',
//                    'before' => '<label>Li e concordo com o termo de uso</lablel>',
//                    'div' => false
//                ));
//            ?>
        </div>

    </fieldset>

    <?php
    echo $form->submit('Cadastrar', array('div' => false));
    //echo $form->button('Limpar', array('type'=>'reset'));
    echo $form->end();
    ?>

    <!--
	<fieldset>
		<legend><?php __('Grupos'); ?></legend>
		<?php
    echo $form->input('Grupo.NaoSelecionado', array('label' => 'Não Selecionados', 'class' => 'tres_colunas_select', 'div' => 'multiple', 'type' => 'select', 'multiple' => true, 'options' => $grupos, 'after' => '<br /><input type="button" id="add_grupo" value="Adicionar &gt;&gt;" title="Adicionar">'));
    echo $form->input('Grupo', array('label' => 'Selecionados <font color="red">(*)</font>', 'div' => 'multiple sem_direita', 'class' => 'tres_colunas_select', 'type' => 'select', 'multiple' => true, 'options' => $gruposelecionado, 'after' => '<br /><input type="button" id="remove_grupo" value="&lt;&lt; Remover" title="Remover">'));
    ?>
	</fieldset>
    -->

    <?php
    //echo $form->button('Cadastrar', array('div'=> false, 'id'=>'submit_usuario', 'class'=>'submit_upload', 'onClick'=>'$(\'#UsuarioAddForm\').ajaxSubmit({target: \'#inicial\',url: \''.$html->url('/usuarios/add').'\'}); return false;'));
    //echo $form->button('Limpar', array('type'=>'reset'));
    //echo $form->end();
    ?>
</div>